<?php
    
    include_once ('../../database.php');
    include_once ('./profile_model.php');

    include_once ('../../header.php');

    include_once ('../nav/navbar.php');
    include_once ('../nav/nav.php');

    if (!empty($_SESSION['LoggedIn'])) {
        include_once ('./profile_view.php');
    }
    else {
        header('Location: '. "/index.php");
    }

    include_once ('../../footer.php');

?>
