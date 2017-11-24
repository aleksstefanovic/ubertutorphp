<?php

    $searchFilter = $_GET['searchFilter'];  
    $query = "SELECT id, roleId, firstName, lastName, profilePic, intro, fullIntro, costPerHour, userName, password FROM users WHERE roleId=2 AND (firstName LIKE '%" . $searchFilter . "%' OR lastName LIKE '%" . $searchFilter . "%' OR intro LIKE '%" . $searchFilter . "%' OR userName LIKE '%" . $searchFilter . "%');";
    $tutors = $db->query($query);    
 
?>
