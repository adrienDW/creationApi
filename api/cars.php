<?php
    $header = getallheaders();
    // var_dump($header['apikey']);
    if(isset($_GET['apikey'])){
        $apikey = trim($_GET['apikey']);
    }elseif(array_key_exists('apikey', $header)){
        $apikey = $header['apikey'];
    }
    if(!isset($apikey)){
                header('HTTP/1.1 403 FORBIDDEN');
                exit;
    }else{
        $req = 'SELECT role FROM users where apikey = :apikey';
        $sth = $db->prepare($req);
        $sth->execute(['apikey' => $apikey]);
        $result =$sth->fetchAll();
        if(isset($result[0])){
            $func = ['getAll', false];
            if(isset($_GET['slug']) && !empty($_GET['slug'])){
                $func = ['getBySlug', strtolower(htmlentities(htmlspecialchars($_GET['slug'])))];
            }
    
            if(isset($_POST['action']) && strtoupper($_POST['action']) == 'UPDATE'){
                $func = ['updateCar', $_POST];
            }
                        
            if($result[0]->role == 1){
                if(isset($_POST['action']) && strtoupper($_POST['action']) == 'CREATE'){
                    $func = ['newCar', $_POST];      
                }  
            }
            if(isset($func[1]['page'])) { unset($func[1]['page']);}
            if(isset($func[1]['action'])) { unset($func[1]['action']);}
        
        
            require_once '../functions/cars/'.$func[0].'.php';
            $func[0]($func[1]);
        }else{
            header('HTTP/1.1 403 FORBIDDEN');
            exit;
        }
    }

    

    