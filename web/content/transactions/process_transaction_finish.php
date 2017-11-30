<?php
    include_once ('../../database.php');

    session_start();
    $_SESSION['transactions-finish-message'] = "";

    $transactionid = $_POST['transactionid']; 
    $tutorid = $_POST['tutorid']; 
    $startdatetime = $_POST['startdatetime'];
    $enddatetime = $_POST['enddatetime'];

    if (!isset($startdatetime) || !isset($enddatetime) || empty($startdatetime) || empty($enddatetime)) {
        $_SESSION['transactions-finish-message'] = "Must enter start and end date+time";
        header('Location: '. "/content/profile/profile.php");
    }
    else {
        $enddatetime = str_replace ("T", " ", $enddatetime) . ":00";
        $startdatetime = str_replace ("T", " ", $startdatetime) . ":00";

        if ($tutorid == $_SESSION['userId']) {
            $query = "UPDATE transactions SET complete=1, startTime='" . $startdatetime . "', endTime='" . $enddatetime . "' WHERE id=" . $transactionid;
            $stmt = $db->prepare($query);    
            $stmt->execute();
            header('Location: '. "/content/profile/profile.php");
        }
        else {
            header('Location: '. "/content/profile/profile.php");
        }
    }

    $db=null;
?>
