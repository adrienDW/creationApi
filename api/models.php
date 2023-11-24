<?php

    $func = ['getAll', false];
    if(isset($_GET['name']) && !empty($_GET['name'])){
        $func = ['getByName', strtolower(htmlentities(htmlspecialchars($_GET['name'])))];
    }
    if(isset($_POST['action']) && $_POST['action'] == 'CREATE'){
        $func = ['newCar', $_POST];
    }
    require_once '../functions/models/'.$func[0].'.php';
    $func[0]($func[1]);