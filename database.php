<?php

    include ('../../config.php');

    try {
        $db = new PDO ($dsn, $username, $password);
    }
    catch (PDOExeption $e) {
        echo $e;
    }

?>
