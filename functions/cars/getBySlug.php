<?php

    require_once '../config/db.php';
    function getBySlug($param){
        
        global $db;
        $sth = $db->prepare("Select cars.*, models.name_model, brands.libelle,
        color.value_attribute as color, energy.value_attribute as energy, boite.value_attribute as boite, category.value_attribute as category
        FROM cars, models, brands, attributes as color, attributes as energy, attributes as boite, attributes as category
        WHERE model_ID = ID_model 
        AND brand_ID = ID_brands
        AND cars.attribute_color_ID = color.ID_attribute
        AND models.attribute_energy_ID = energy.ID_attribute
        AND models.attribute_boite_ID = boite.ID_attribute
        AND models.attribute_category_ID = category.ID_attribute
        AND cars.slug = :slug "); 
        $sth->execute(['slug' => $param]);
        $result = $sth->fetchAll();

        header('content-type:application/json');
        echo json_encode($result);
    }