<?php

require_once 'config/framework.php';
require_once 'config/connect.php';

$projet = query("
SELECT P.*, U.pseudo  
FROM projets AS P 
INNER JOIN users AS U 
    ON P.auteur = U.id 
WHERE slug='".$_GET['slug']."'
");

$title = 'Tous les projets';
$csc = '<link rel="stylesheet" href="css/portfolio.css">';
require_once 'header.php';
?>

<section class="section-top">
    <div class="fullpage-content d-flex justify-content-center align-items-center">
        <div class="fullpage-text">
            <h2>Atelier Skald</h2>
            <h1>Lutherie, facture d'instruments médiévaux</h1>
           
        </div>
    </div>
</section>

<section class="section pt-5">
    <div class="container">
        <div class="row line-release">
            <div class="col-md-4">
                <div class="column-details">
                    <div class="title-bordered-wrapper">
                        <h3 class="title-bordered">Présentation</h3>
                    </div>
                    <div class="single-presentation">
                        <p>Participation à différents projets pour Arte &#8211; LID :</p>
                        <ul>
                            <li>Player Vidéo &#8211; React / Backbone / rest API</li>
                            <li>Arte Presse &#8211; Backbone / rest API / redis</li>
                            <li>Arte Corporate &#8211; WordPress / Foundation</li>
                            <li>Mon Arte &#8211; SSO / Backbone</li>
                        </ul>
                        <p>&nbsp;</p>
                    </div>

                    <div class="title-bordered-wrapper">
                        <h3 class="title-bordered">Réalisation</h3>
                    </div>
                    <div class="single-resume">
                        <p>Multiples projets : Player vidéo / Mon Arte / Arte Presse</p>
                    </div>

                    <div class="single-details">
                        <div><strong>Année</strong> 2016-...</div>
                        <div><strong>Client</strong> LID - ARTE</div>
                    </div>

                    <div class="single-details text-center">
                        <a class="btn external" target="_blank" href="https://www.arte.tv/">Voir la réalisation</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 column-thumbs pull-right">
                <div class="single-gallery">
                    <div class="gallery-item single-gallery">
                        <a href="https://www.kwery.fr/wp-content/uploads/arte-player.jpg"
                            title="Arte - Arte Video Player" class="popin">
                            <img class="img-fluid" src="https://www.kwery.fr/wp-content/uploads/arte-player.jpg"
                                alt="Arte - Arte Video Player" title="Arte - Arte Video Player">
                        </a>
                    </div>
                    <div class="gallery-item single-gallery">
                        <a href="https://www.kwery.fr/wp-content/uploads/arte-presse.jpg" title="Arte - Arte Presse"
                            class="popin">
                            <img class="img-fluid" src="https://www.kwery.fr/wp-content/uploads/arte-presse.jpg"
                                alt="Arte - Arte Presse" title="Arte - Arte Presse">
                        </a>
                    </div>
                    <div class="gallery-item single-gallery">
                        <a href="https://www.kwery.fr/wp-content/uploads/arte-corporate.jpg"
                            title="Arte - Arte Corporate" class="popin">
                            <img class="img-fluid" src="https://www.kwery.fr/wp-content/uploads/arte-corporate.jpg"
                                alt="Arte - Arte Corporate" title="Arte - Arte Corporate">
                        </a>
                    </div>
                    <div class="gallery-item single-gallery">
                        <a href="https://www.kwery.fr/wp-content/uploads/arte-monArte.jpg" title="Arte - Mon Arte"
                            class="popin">
                            <img class="img-fluid" src="https://www.kwery.fr/wp-content/uploads/arte-monArte.jpg"
                                alt="Arte - Mon Arte" title="Arte - Mon Arte">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<?php

include_once 'footer.php';

?>