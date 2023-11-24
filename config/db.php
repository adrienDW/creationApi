<?php
    $serverName = "localhost";
    $userName = "root";
    $dbName = "macon_cession";
    $pass = "";
    
    
    try{
        $db = new PDO('mysql:host='.$serverName.';dbname='.$dbName, $userName, $pass);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo "Connection failed : ". $e->getMessage();
    }
    