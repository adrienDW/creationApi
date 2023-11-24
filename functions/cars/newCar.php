<?php

    function retirerAccents($varMaChaine){
        $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');

        $varMaChaine = str_replace($search, $replace, $varMaChaine);
        return $varMaChaine; //On retourne le résultat
    }


    function newCar($param){
        global $db;
        $title = $param['title'];
        $slug = retirerAccents(strtolower(str_replace([' ', '.', '/'],'-', $title)));
        $model = $param['model'];
        $color = $param['color'];
        $description = $param['description'];
        $aff_price = $param['aff_price'];
        $siv = $param['siv'];
        $etat = $param['etat'];
        $km = $param['km'];
        $in_date = $param['in_date'];
        $firstImmat = Date($param['firstImmat']);
        $sth = $db->prepare("INSERT INTO cars (name, slug, description, first_immat_date,
                        model_ID, aff_price, attribute_color_ID, siv, etat, km, in_date) VALUES 
        ('$title', '$slug', '$description', '$firstImmat', '$model', '$aff_price', '$color', 
        '$siv', '$etat', '$km', '$in_date')");
        $sth->execute();

    };