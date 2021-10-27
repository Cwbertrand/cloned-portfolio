<?php

require_once '../vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';


$sql = 'SELECT COUNT(*) AS nbprojets FROM projets';
$data = query($sql);
$nbProjets = $data[0]['nbprojets'];
$parPage = 2;
$nbPage = ceil($nbProjets / $parPage);
$cPage = 1;
$start = (($cPage - 1) * $parPage);

    $sql = "SELECT P.id, P.titre, P.slug, P.content, P.image, P.creation, U.id AS id_user, U.email, U.pseudo
            FROM projets AS P 
            INNER JOIN users AS U  
            ON P.auteur = U.id 
            ORDER BY creation DESC 
            LIMIT $start, $parPage";
        $projets = query($sql);
       
    echo "$cPage sur $nbPage";

