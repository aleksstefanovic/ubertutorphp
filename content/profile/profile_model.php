<?php

    session_start ();
    $userId = $_SESSION['userId'];
    $query = "SELECT roleId, firstName, lastName, profilePic, intro, fullIntro, costPerHour, userName FROM users WHERE id=" . $userId;
    $users = $db->query($query);    
    $user = $users->fetch();

    $roleId = $user['roleId'];
    $query = "SELECT roleName FROM roles WHERE id=" . $roleId;
    $roleName = $db->query($query)->fetch()['roleName']; 

    $query = "SELECT tutorId, userId, startTime, endTime, tutorAccept, complete FROM transactions WHERE userId=" . $userId . " or tutorId=" . $userId;
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
        $transaction['startTime'] = $result['startTime'];
        $transaction['endTime'] = $result['endTime'];
        if (empty($transaction['startTime']) && empty($transaction['endTime'])) {
            $transaction['totalCost'] = 0.00;
        }
        else {
            //insert real calc here
            $transaction['totalCost'] = 500.00;
        }
        if (empty($result['tutorAccept'])) {
            $transaction['status'] = "Pending tutor approval";
            $transaction['statusId'] = 1;
        }
        else if (empty($result['complete'])) {
            $transaction['status'] = "Tutoring in progress";
            $transaction['statusId'] = 2;
        }
        else {
            $transaction['status'] = "Finished";
            $transaction['statusId'] = 3;
        }

        array_push($transactions, $transaction);
    }
?>
