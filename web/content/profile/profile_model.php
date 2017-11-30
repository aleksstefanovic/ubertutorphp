<?php

    session_start ();
    $userId = $_SESSION['userId'];
    $query = "SELECT roleId, firstName, lastName, profilePic, intro, fullIntro, costPerHour, userName FROM users WHERE id=" . $userId;
    $users = $db->query($query);    
    $user = $users->fetch();

    $roleId = $user['roleId'];
    $query = "SELECT roleName FROM roles WHERE id=" . $roleId;
    $roleName = $db->query($query)->fetch()['roleName']; 

    $query = "SELECT id, tutorId, userId, startTime, endTime, tutorAccept, complete FROM transactions WHERE userId=" . $userId . " or tutorId=" . $userId;
    $results = $db->query($query);

    $transactions = array();
    foreach ($results as $result) {
        $transaction = array();
        
        if ($roleId == 1) {
            $query = "SELECT firstName, lastName, costPerHour FROM users WHERE id=" . $result['tutorId'];
        }
        else {
            $query = "SELECT firstName, lastName, costPerHour FROM users WHERE id=" . $result['userId'];
        }
        $transUsers = $db->query($query);
        $transUser = $transUsers->fetch();

        $transaction['name'] = $transUser['firstName'] . " " . $transUser['lastName'];

        $transaction['id'] = $result['id'];
        $transaction['tutorid'] = $result['tutorId'];

        $transaction['startTime'] = $result['startTime'];
        $transaction['endTime'] = $result['endTime'];
        if (empty($transaction['startTime']) && empty($transaction['endTime'])) {
            $transaction['totalCost'] = 0.00;
        }
        else {
            $enddatetime = explode (" ", $transaction['endTime']);
            $enddate = explode("-", $enddatetime[0]);
            $endtime = explode(":", $enddatetime[1]);
            $enddateobj = new DateTime();
            $enddateobj->setDate($enddate[0], $enddate[1], $endate[2]);
            $enddateobj->setTime($endtime[0], $endtime[1], $entime[2]);
            $enddateobjtimestamp = $enddateobj->getTimestamp();

            $startdatetime = explode (" ", $transaction['startTime']);
            $startdate = explode("-", $startdatetime[0]);
            $starttime = explode(":", $startdatetime[1]);
            $startdateobj = new DateTime();
            $startdateobj->setDate($startdate[0], $startdate[1], $startate[2]);
            $startdateobj->setTime($starttime[0], $starttime[1], $entime[2]);
            $startdateobjtimestamp = $startdateobj->getTimestamp();

            $hours = (($enddateobjtimestamp - $startdateobjtimestamp)/3600);

            $query = "SELECT costPerHour FROM users WHERE id=" . $transaction['tutorid'];
            $tutors = $db->query($query);    
            $tutor = $tutors->fetch();

            $totalCost = $hours * $tutor['costPerHour'];

            $transaction['totalCost'] = round($totalCost, 2);
        }

        if ($result['tutorAccept'] == NULL) {
            $transaction['status'] = "Pending tutor approval";
            $transaction['statusId'] = 1;
        }
        else if ($result['tutorAccept'] == FALSE) {
            $transaction['status'] = "Rejected";
            $transaction['statusId'] = 2;
        }
        else if ($result['tutorAccept'] == TRUE) {
            $transaction['status'] = "Approved";
            $transaction['statusId'] = 3;
            
            if ($result['complete'] == TRUE) {
                $transaction['status'] = "Finished";
                $transaction['statusId'] = 4;
            }
        }
        else {
            $transaction['status'] = "Finished";
            $transaction['statusId'] = 4;
        }

        array_push($transactions, $transaction);
    }
?>
