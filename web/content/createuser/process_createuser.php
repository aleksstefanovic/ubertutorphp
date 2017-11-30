<?php
    include_once ('../../database.php');
    session_start (); 
    $_SESSION['createuser-submit-message'] = "";
    $_SESSION['createuser-email-message'] = "";
    $_SESSION['createuser-password2-message'] = "";
    $_SESSION['createuser-profilepic-message'] = "";

    /*$myFile = "../../media/tutorProfilePic.png";
    
    echo getcwd();
    if (file_exists ($myFile)) {
        echo "file exists";
    }
    else {
        echo "file doesn't exist";
    }*/

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $role = $_POST['role'];
    $cost = $_POST['cost'];
    $intro = $_POST['intro']; 
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $password2 = $_POST['password2']; 
    //$profilePic = "/media/tutorProfilePic.png";

    if ($cost == '') {
        $cost = 0;
    }

    //echo $firstName . "-" . $lastName . "-" . $role . "-" . $cost . "-" . $intro . "-" . $email . "-" . $password . "-" . $password2;

    if (!empty($firstName) && !empty($lastName) && !empty($role) && !empty($intro) && !empty($email) && !empty($password) && !empty($password2)) {

        $query = "SELECT id FROM users WHERE userName='" . $email . "';";
        $users = $db->query($query);    
        if (!empty($users->fetch())) {
            $_SESSION['createuser-email-message'] = "Email already in use";
            header('Location: '. "/content/createuser/createuser.php");
        }
        else if ($password != $password2) {
            $_SESSION['createuser-password2-message'] = "Two passwords must match";
            header('Location: '. "/content/createuser/createuser.php");
        }
        else {
            $target_dir = "../../media/profilepics/";
            $target_file = $target_dir . $email;
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            $check = getimagesize($_FILES["profilePic"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;

                $_SESSION['createuser-profilepic-message'] = "Your profile picture must be an image file";
                header('Location: '. "/content/createuser/createuser.php");
            }


            require('../../../vendor/autoload.php');
            $s3 = Aws\S3\S3Client::factory();
            $bucket = getenv('S3_BUCKET_NAME')?: die('No "S3_BUCKET" config var in found in env!');

            try {
                $upload = $s3->upload($bucket, $email, fopen($_FILES['profilePic']['tmp_name'], 'rb'), 'public-read');
                $target_file = $upload->get('ObjectURL');

                $stmt = $db->prepare("INSERT INTO users (roleId, firstName, lastName, profilePic, intro, costPerHour, userName, password) values (:role, :firstName, :lastName, :profilePic, :intro, :costPerHour, :userName, :password)");
                $stmt->bindParam(':role', $role);
                $stmt->bindParam(':firstName', $firstName);
                $stmt->bindParam(':lastName', $lastName);
                $stmt->bindParam(':profilePic', $target_file);
                $stmt->bindParam(':intro', $intro);
                $stmt->bindParam(':costPerHour', $cost);
                $stmt->bindParam(':userName', $email);

                $salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
                $hashedPassword = crypt($password, '$2y$12$' . $salt);
                $stmt->bindParam(':password', $hashedPassword);

                $stmt->execute();

                $query = "SELECT id, roleId, userName, firstName, lastName FROM users WHERE userName='" . $email . "';";
                $users = $db->query($query);    
                $user = $users->fetch();
              
                $_SESSION['LoggedIn'] = true;
                $_SESSION['email'] = $user['userName'];
                $_SESSION['firstName'] = $user['firstName'];
                $_SESSION['lastName'] = $user['lastName'];
                $_SESSION['userId'] = $user['id'];
                $_SESSION['roleId'] = $user['roleId'];

                header('Location: '. "/index.php");
            } 
            catch(Exception $e) {
                $_SESSION['createuser-profilepic-message'] = "There was an error uploading your file.";
                header('Location: '. "/content/createuser/createuser.php");
            }

            //$result = move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file);
            //if ($result) {
            //} else {
            //}

        }
    }
    else {
        $_SESSION['createuser-submit-message'] = "Must enter all fields on the form";
        header('Location: '. "/content/createuser/createuser.php");
    }

    $db=null;
?>
