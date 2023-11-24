<?php

    require_once '../config/db.php';
    function getByName($param){
        
        global $db;
        $name = $param;
        $sth = $db->prepare("Select * FROM models WHERE name LIKE '%$name%'");
        $sth->execute();
        $result = $sth->fetchAll();

        var_dump($result);
        echo 'models name';
    }