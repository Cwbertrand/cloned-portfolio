<?php

require_once 'config/framework.php';
require_once 'config/connect.php';

$title = 'Tous les projets';

require_once 'header.php';

//PAGINATION FUNCTION==================================================

function getPageRange($current, $max, $total_pages = 10)
{
    $desired_pages = $max < $total_pages ? $max : $total_pages;
    $middle = ceil($desired_pages / 2);
    if ($current <= $middle) {
        return [1, $desired_pages];
    }
    if ($current > $middle && $current <= ($max - $middle)) {
        return [
          $current - $middle,
          $current + $middle,
      ];
    }
    if ($current <= $max) {
        return [
          $current - ($desired_pages - 1),
          $max,
      ];
    }
}

//FUNCTION DE PAGINATION A LA FIN==================================================

//PAGINATION AVEC LA BASE DE DONNEE =======================================

$search = isset($_GET['search']) ? "WHERE titre LIKE '%".$_GET['search']."%' OR content LIKE '%".$_GET['search']."%'" : '';

$sql = 'SELECT COUNT(*) AS nbprojets FROM projets '.$search;
$data = query($sql);
$nbProjets = $data[0]['nbprojets'];
$parPage = 6;
$nbPage = ceil($nbProjets / $parPage);
$cPage = isset($_GET['page']) && (int) $_GET['page'] > 0 ? $_GET['page'] : 1;
$start = (($cPage - 1) * $parPage);


    $sql = "SELECT P.id, P.titre, P.slug, P.content, P.image, P.creation, U.id AS id_user, U.email, U.pseudo 
            FROM projets AS P  
            INNER JOIN users AS U  
                ON P.auteur = U.id 
            ".$search." 
            ORDER BY creation DESC 
            LIMIT $start, $parPage";
        $projets = query($sql);

// PAGINATION AVEC LA BASE DE DONNEE A LA FIN======================================

?>






<form class="form-inline w-100 d-flex justify-content-end container py-5 mt-5" method="GET">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
  </form>


<div class="container scroll">

    <div class="row">
        <?php $i = 0; foreach ($projets as $projet): ?>

            <div class="col-md-4 col-sm-6 col-xs-12 py-2 px-2 scroll">
                    <div class="image">
                        <img class="image__img" src="<?= $projet['image']; ?>" alt="<?= $projet['titre']; ?>">
                        <div class="image__overlay">
                            <div class="titre">
                            <?php
                            echo strlen($projet['titre']) > 14 ? '<span title="'.$projet['titre'].'">'.substr($projet['titre'], 0, 14).'<small>...</small></span>' : $projet['titre'];
                            ?>
                            </p></div>
                            <p class="image__description">
                            <?php
                            echo strlen($projet['content']) > 100 ? substr($projet['content'], 0, 100).'<small>...</small> <a style="color:white;" href="/projet.php?slug='.$projet['slug'].'">Lire la suite</a>' : $projet['content'];
                            ?>
                            </p>
                        </div>
                    </div>
            </div>

        <?php endforeach; ?>


<!-- PAGINATION ================================================================== -->

        <nav aria-label="...">
          <ul class="pagination">
            <li class="page-item">
              <?php

              $search = isset($_GET['search']) ? '&search='.$_GET['search'] : '';
              if (($cPage - 1) > 0) {
                  echo '<a class="page-link" href="/projets.php?page='.($cPage - 1).$search.'">Previous</a>';
              }
              ?>
            </li>
            
            <?php

            list($min, $max) = getPageRange($cPage, $nbPage);

            foreach (range($min, $max) as $number) {
                echo '<li class="page-item"><a class="page-link" href="projets.php?page='.$number.$search.'">'.$number.'</a></li>';
            }

            ?>

            <li class="page-item">
              <?php
              if (($cPage + 1) < 34) {
                  echo '<a class="page-link" href="/projets.php?page='.($cPage + 1).$search.'">Next</a>';
              }
              ?>
            </li>

            <?php
            /*
            if ($cPage > 1) {
                echo '<li class="page-item"><a class="page-link" href="/projets.php?page='.($cPage - 1).'">Previous</a></li>';
            }
            for ($i = 1; $i <= $nbPage; ++$i) {
                echo '<li class="page-item"><a class="page-link" href="/projets.php?page='.$i.'">'.$i.'</a></li>';
            }

            if ($i > $cPage) {
                echo '<li class="page-item"><a class="page-link" href="/projets.php?page='.($cPage + 1).'">Next</a></li>';
            }
            */

            ?>
           
        </ul>
        
    </div>
    
</div>

<?php require_once 'footer.php';
