<?php 
    $tab_valid_page = ['cars',
        'brands',       // ?page=cars
        'categories',     // ?page=category
        'models'];      // ?page=models

    if(isset($_GET['page']) && in_array($_GET['page'], $tab_valid_page)){
        require_once '../config/db.php';
        require_once '../api/'.$_GET['page'].'.php';
    }else{
        // 404
        header('HTTP/1.1 404 NOT FOUND');
        exit;
    }

