<?php
    include_once ('../../database.php');

    session_start (); 
    $_SESSION['signin-submit-message'] = "";
    $_SESSION['signin-email-message'] = "";

    $email = $_POST['email']; 
    $password = $_POST['password']; 

    if (isset($email) && isset($password) && !empty($email) && !empty($password)) {


        $query = "SELECT id, roleId, userName, firstName, lastName, password FROM users WHERE userName='" . $email . "';";
        $users = $db->query($query);    
        $user = $users->fetch();

        if (empty($user)) {
            $_SESSION['signin-email-message'] = "Email/password combination does not exist";
            header('Location: '. "/content/signin/signin.php");
        }
        else {
            $foundPassword = $user['password'];
            if ($foundPassword == crypt($password, $foundPassword)) {
                $_SESSION['LoggedIn'] = true;
                $_SESSION['email'] = $user['userName'];
                $_SESSION['firstName'] = $user['firstName'];
                $_SESSION['lastName'] = $user['lastName'];
                $_SESSION['userId'] = $user['id'];
                $_SESSION['roleId'] = $user['roleId'];
                header('Location: '. "/index.php");
            }
            else {
                $_SESSION['signin-email-message'] = "Email/password combination does not exist";
                header('Location: '. "/content/signin/signin.php");
            }

        }
    }
    else {
        $_SESSION['signin-submit-message'] = "Must enter email and password";
        header('Location: '. "/content/signin/signin.php");
    }

    $db=null;
?>
