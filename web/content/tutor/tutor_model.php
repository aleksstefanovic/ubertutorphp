<?php

    $userId = $_GET['tutorid'];
    $query = "SELECT id, roleId, firstName, lastName, profilePic, intro, fullIntro, costPerHour, userName FROM users WHERE id=" . $userId;
    $users = $db->query($query);    
    $user = $users->fetch();

    $query = "SELECT roleName FROM roles WHERE id=" . $user['roleId'];
    $roleName = $db->query($query)->fetch()['roleName']; 
?>
