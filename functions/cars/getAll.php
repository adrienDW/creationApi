<?php

    require_once '../config/db.php';
    function getAll($param){
        
        global $db;
        $sth = $db->prepare("Select * FROM cars");
        $sth->execute();
        $result = $sth->fetchAll();

        var_dump($result);
    }