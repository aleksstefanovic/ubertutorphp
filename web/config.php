<?php

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);

    //$conn = new mysqli($server, $username, $password, $db);

    $dsn = "mysql:host=" . $server . ";dbname=" . $db . ";chartet=utf8";

?>
