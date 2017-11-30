<?php
    include_once ('../../database.php');

    $tutorId = $_POST['tutorid'];
    $studentId = $_POST['studentid'];

    session_start ();

    if ($studentId == $_SESSION['userId'])  {
        $stmt = $db->prepare("INSERT INTO transactions (tutorId, userId) values (:tutorId, :userId)");
        $stmt->bindParam(':tutorId', $tutorId);
        $stmt->bindParam(':userId', $studentId);
        $stmt->execute();

        header('Location: '. "/index.php");
    }
    else {
        echo "<p>User signed in does not match ubering user</p>";
    }
    
    $db=null;
?>
