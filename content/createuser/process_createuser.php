<?php
    include_once ('../../database.php');

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $role = $_POST['role'];
    $cost = $_POST['cost'];
    $intro = $_POST['intro']; 
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $password2 = $_POST['password2']; 
    $profilePic = "/media/tutorProfilePic.png";

    //echo $firstName . "-" . $lastName . "-" . $role . "-" . $cost . "-" . $intro . "-" . $email . "-" . $password . "-" . $password2;

    if (isset($firstName) && isset($lastName) && isset($role) && isset($intro) && isset($email) && isset($password) && isset($password2)) {
        $stmt = $db->prepare("INSERT INTO users (roleId, firstName, lastName, profilePic, intro, costPerHour, userName, password) 
            values (:role, :firstName, :lastName, :profilePic, :intro, :costPerHour, :userName, :password)");
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':profilePic', $profilePic);
        $stmt->bindParam(':intro', $intro);
        $stmt->bindParam(':costPerHour', $cost);
        $stmt->bindParam(':userName', $email);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        header('Location: '. "/index.php");
    }

    $db=null;
?>
