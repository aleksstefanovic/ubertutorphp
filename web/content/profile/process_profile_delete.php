<?php

    include_once ('../../database.php');
    session_start ();

    $_SESSION['delete-submit-message'] = "";

    $stmt = "DELETE FROM users WHERE id=" . $_SESSION['userId'];
    $value = $db->exec($stmt);

    if ($value == 1) {
        session_unset ();
        session_destroy ();
        header('Location: '. "/index.php");
    }
    else {
        $_SESSION['delete-submit-message'] = "Could not delete your account, dependencies exist"; 
        header('Location: '. "/content/profile/profile.php");
    }

    

?>
