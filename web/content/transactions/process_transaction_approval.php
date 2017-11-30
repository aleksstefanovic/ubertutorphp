<?php
    include_once ('../../database.php');
    session_start();

    $transactionid = $_POST['transactionid']; 
    $tutorid = $_POST['tutorid']; 
    $approved = $_POST['approval']; 

    if ($tutorid == $_SESSION['userId']) {
        $query = "UPDATE transactions SET tutorAccept=" . $approved . " WHERE id=" . $transactionid;
        $stmt = $db->prepare($query);    
        $stmt->execute();
        header('Location: '. "/content/profile/profile.php");
    }
    else {
        header('Location: '. "/content/profile/profile.php");
    }

    $db=null;
?>
