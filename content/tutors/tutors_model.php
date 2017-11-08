<?php

    $searchFilter = $_GET['searchFilter'];  
    $query = 'SELECT * FROM tutors;'; 
    $tutors = $db->query($query);    
 
?>
