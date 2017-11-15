<?php
    include_once ('../../database.php');
    session_start ();

    $stmt = "DELETE FROM users WHERE id=" . $_SESSION['userId'];
    $db->exec($stmt);
    
    session_unset ();
    session_destroy ();

    header('Location: '. "/index.php");

?>
