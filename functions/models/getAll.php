<?php


    function getAll($param){
        
        global $db;
        $req = "Select * FROM models";
        $sth = $db->prepare($req);
        $sth->execute();
        $sth->fetchAll();
        header('content-type:application/json');
        echo json_encode($sth);
    }