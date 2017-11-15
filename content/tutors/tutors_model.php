<?php

    //$searchFilter = $_GET['searchFilter'];  
    $query = "SELECT id, roleId, firstName, lastName, profilePic, intro, fullIntro, costPerHour, userName, password FROM users WHERE roleId=2";
    $tutors = $db->query($query);    
 
?>
