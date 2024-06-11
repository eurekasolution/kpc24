<?php
    function connect()
    {
        $dbName = "kpc";
        $dbHost = "localhost";
        $dbUser = "kpc";
        $dbPass = "1111";
        $dbPort = "3306";

        $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, $dbPort) or die("Fail : %s " .  $conn->error);
        $conn->set_charset("utf8mb4");
        return $conn;
    }

    function closeDB($conn)
    {
        $conn->close();
    }
?>