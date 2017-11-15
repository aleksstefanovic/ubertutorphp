<?php
    include_once ('../../database.php');

    $email = $_POST['email']; 
    $password = $_POST['password']; 

    if (isset($email) && isset($password) && !empty($email) && !empty($password)) {

        $query = "SELECT id, roleId, userName, firstName, lastName FROM users WHERE userName='" . $email . "' AND password='" . $password . "';";
        $users = $db->query($query);    
        $user = $users->fetch();

        if (empty($user)) {
            header('Location: '. "/content/signin/signin.php");
        }
        else {
            session_start (); 
            $_SESSION['LoggedIn'] = true;
            $_SESSION['email'] = $user['userName'];
            $_SESSION['firstName'] = $user['firstName'];
            $_SESSION['lastName'] = $user['lastName'];
            $_SESSION['userId'] = $user['id'];
            $_SESSION['roleId'] = $user['roleId'];

            header('Location: '. "/index.php");
        }
    }
    else {
        header('Location: '. "/content/signin/signin.php");
    }

    $db=null;
?>
