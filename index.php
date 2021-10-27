<?php

require_once 'config/framework.php';
require_once 'config/connect.php';

$title = 'Personal portfolio by CwBertrand';

require_once 'header.php';

/*
function components(array $projet){
    $element = '<div class="col-md-4 col-sm-6 col-xs-12 py-2 px-2 scroll">
                    <div class="image">
                        <img class="image__img" src="/photos/portfolio1.jpeg" alt="Bricks">
                        <div class="image__overlay">
                            <div class="titre">'.$projet["titre"].'</div>
                            <p class="image__description">
                            '.$projet["content"].'
                            </p>
                        </div>
                    </div>
                </div>';

    return $element;

}
*/

//[A]   CALCULATE TOTAL NUMBER OF PAGES
// $perpage = 10; // show 10 entries per page
// $stmt = $mysqli->query('SELECT COUNT(*) AS nb_users FROM  header');
// $stmt = $stmt->fetch_assoc();
// $totalpages = ceil($stmt['nb_users'] / $perpage);

// [B] GET ENTRIES FOR CURRENT PAGE
// USE $_GET['PAGE'] AS THE CURRENT PAGE, ASSUME PAGE 1 IS NOT SET
//$curent_page = isset($_GET['page']) && (int) $_GET['page'] ? header('Location:index.php?page=') : 1;

//SQL FETCH - LIMITED TO CURRENT PAGE
// $X - OFFSET
// $Y - LIMIT 0, 10 - GET FIRST ENTRY TO 10TH
// LIMIT 10, 10 - GET 11TH ENTRY TO 20TH
// LIMIT 20, 10 - GET 21ST ENTRY TO =30TH
// AND SO ON.....
// $start = ($curent_page - 1) * $perpage;

// $sqlCon = "SELECT * FROM  header LIMIT $start, $perpage";
// $stmtCon = query($sqlCon);
// dump($stmtCon);

// [C] OUTPUT RESULTS IN HTML

?>


<section class="background-image ">
    <?php
    if (isset($_SESSION['user'])) {
        echo '<h3 class="scroll text-center text-success index-top">Bienvenue '.$_SESSION['user']['pseudo'].'	&#128522;</h3>';
    }

    ?>
    <div class="container">
        <div class="row  justify-content-between align-items-center edit me">


            <div class="text-white col-lg-6 col-md-6 ">
                <h5>Hello world! Mon nom est</h5>
                <h1 class="big">CW Bertrand</h1>
                <h4>Je suis <span class="text-warning typing"></span></h4>
                <button class="btn btn-one bg-warning mt-3">Hire me</button>
            </div>

            <!--======================================= Social Links =================================================-->
            <ul class="social-links d-none d-sm-block">
                <li class="social-links-items">
                    <a class="icons" aria-current="page" href="#"><i class="fab fa-youtube"></i></a>
                </li>
                <li class="social-links-items">
                    <a class="icons" aria-current="page" href="#"><i class="fab fa-facebook"></i></a>
                </li>
                <li class="social-links-items">
                    <a class="icons" aria-current="page" href="#"><i class="fab fa-instagram"></i></a>
                </li>
                <li class="social-links-items">
                    <a class="icons" aria-current="page" href="#"><i class="fab fa-github"></i></a>
                </li>
                <li class="social-links-items">
                    <a class="icons" aria-current="page" href="#"><i class="fab fa-linkedin"></i></a>
                </li>
                <li class="social-links-items">
                    <a class="icons" aria-current="page" href="#"><i class="fab fa-twitter"></i></a>
                </li>
            </ul>


            <div class="text-center col-lg-6 col-md-6 newimage d-none d-sm-block">
                <img class="img-fluid" width="50%" src="./photos/1.jpg" alt="">
            </div>
        </div>
    </div>
</section>


<!--================== ================================= ABOUT ===================================================-->

<section id="about" class="about py-5 ">
    <div class="text-center scroll">
        <h2 class="text-center">Découvrez-moi</h2>
        <h6 class="text-center line pb-2"> Qui suis-je</h6>

        <div class="container d-sm-flex justify-content-between align-items-center">

            <div class=" w-70 scroll">
                <img class="pb-5 img-fluid pic" src="./photos/1.jpg" alt="">
            </div>

            <div class="padding scroll">


                <h4>Je suis Bertrand et je suis un<div><span class="text-warning typing-2"></span></div>
                </h4>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Aliquid sint sunt commodi ad, rerum tempora nemo recusandae deleniti
                    saepe nulla fuga exercitationem voluptas repudiandae qui praesentium
                    ex unde quaerat quisquam doloribus laborum expedita mollitia. Debitis,
                    sed dolorum? Repudiandae placeat atque ipsam nihil culpa, nemo consectetur
                    illum delectus aliquam nulla, unde sit? Eaque corporis magni eveniet quaerat
                    minus animi accusantium asperiores quae
                    id reprehenderit iure, reiciendis, ea earum sunt, doloribus ipsum?
                </p>

                <div class="btn text-center">
                    <a download="" class="text-center" href="#C:\Users\cwber\Dropbox\cv assignment">Download CV</a>
                </div>

            </div>
</section>

<!--================== ============================== SERVICES =======================================================-->

<section id="service" class="services">
    <div class="container scroll">

        <h2 class="text-center text-white">Mes Services</h2>
        <h6 class="text-center pb-5 text-white">Ce que je fournis</h6>

        <div class="row justify-content-between edit scroll">

            <div class="card col-lg-4 col-md-12 mb-3 bg-secondary text-white" style="width: 18rem;">
                <img class="card-img-top" src="./photos/4.jpg" alt="Card image cap">
                <div class="card-body ">
                    <h5 class="card-title text-center">Concepteur UX/UI</h5>
                    <p class="card-text text-center">Some quick example text to build on the card title
                        and make up the bulk of the card's content.</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-warning text-white">Lire la suite</a>
                    </div>
                </div>
            </div>

            <div class="card  col-lg-4 col-md-12 mb-3 bg-secondary text-white" style="width: 18rem;">
                <img class="card-img-top" src="./photos/4.jpg" alt="Card image cap">
                <div class="card-body ">
                    <h5 class="card-title text-center">Développeur frontal</h5>
                    <p class="card-text text-center">Some quick example text to build on the card title and make up the
                        bulk of the card's content.</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-warning text-white">Lire la suite</a>
                    </div>
                </div>
            </div>

            <div class="card col-lg-4 col-md-12 mb-3 bg-secondary text-white" style="width: 18rem;">
                <img class="card-img-top" src="./photos/4.jpg" alt="Card image cap">
                <div class="card-body ">
                    <h5 class="card-title text-center">Conception d'applications </h5>
                    <p class="card-text text-center">Some quick example text to build on the card title and make up the
                        bulk of the card's content.</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-warning text-white">Lire la suite</a>
                    </div>
                </div>
            </div>

        </div>


    </div>
    </div>


    </div>
</section>


<!--================== =============================== SKILLS ====================================================-->


<section id="competence" class="skills ">
    <div class="text-center scroll">
        <h2 class="text-center">Compétences</h2>
        <h6 class="text-center pb-4">Qu'est-ce que je peux faire</h6>
    </div>
    <div class="container">
        <div class="row justify-content-between align-items-center">

            <div class="col-lg-4 col-md-5 scroll add">

                <h3 class="text-center">I am competent in these areas</h3>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Aliquid sint sunt commodi ad, rerum tempora nemo recusandae deleniti
                    saepe nulla fuga exercitationem voluptas repudiandae qui praesentium
                    ex unde quaerat quisquam doloribus laborum expedita mollitia. Debitis,
                    sed dolorum? Repudiandae placeat atque ipsam nihil culpa, nemo consectetur
                    illum delectus aliquam nulla, unde sit? Eaque corporis magni eveniet quaerat
                    minus animi accusantium asperiores quae
                    id reprehenderit iure, reiciendis, ea earum sunt, doloribus ipsum?
                </p>
            </div>

            <div class="col-lg-7 col-md-7 p scroll">

                <div class="languages line">
                    <span>
                        <p>HTML</p>
                    </span>
                    <span>90%</span>
                </div>
                <div class="line-html"></div>

                <div class="languages">
                    <span>
                        <p>CSS</p>
                    </span>
                    <span>90%</span>
                </div>
                <div class="line-css"></div>

                <div class="languages">
                    <span>
                        <p>BOOTSTRAP</p>
                    </span>
                    <span>70%</span>
                </div>
                <div class="line-bootstrap"></div>

                <div class="languages">
                    <span>
                        <p>Javascript</p>
                    </span>
                    <span>50%</span>
                </div>
                <div class="line-javascript"></div>

                <div class="languages">
                    <span>
                        <p>PHP</p>
                    </span>
                    <span>30%</span>
                </div>
                <div class="line-php"></div>

                <div class="languages">
                    <span>
                        <p>MYSQLi</p>
                    </span>
                    <span>20%</span>
                </div>
                <div class="line-mysql"></div>

            </div>

        </div>

    </div>
</section>




<!--================== ============================= PORTFOLIO =======================================================-->
<section id="portfolio" class="portfolio pb-5 ">
    <div class="text-center pb-5 scroll">
        <h1>Mes Portfolios</h1>
        <h6>Projets les plus récents</h6>
    </div>

    <div class="container scroll">

        <div class="row">
        <?php $sql = 'SELECT P.id, P.titre, P.slug, P.content, P.image, P.creation, U.pseudo 
            FROM projets AS P
            INNER JOIN users AS U 
            ON P.auteur = U.id
            ORDER BY creation DESC
            LIMIT 6';
            $projets = query($sql);
            ?>
            
            <?php foreach ($projets as $projet): ?>

                <div class="col-md-4 col-sm-6 col-xs-12 py-2 px-2 scroll">
                    <div class="image">
                        <img class="image__img" src="<?= $projet['image']; ?>" alt="<?= $projet['titre']; ?>">
                        <div class="image__overlay">
                            <div class="titre">
                            <?php
                            echo strlen($projet['titre']) > 14 ? substr($projet['titre'], 0, 14).'<small>...</small>' : $projet['titre'];
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
            
           
        </div>
        
    </div>

</section>



<!--================== ================= TESTIMONIAL ==========================================-->

<section id="testimonial" class="">
    <div class="testimonials pt-5 text-white ">
        <div class="testimonials-title py-4 text-center scroll">
            <h1>Témoignages</h1>
            <h6>Ce que disent mes clients</h6>
        </div>
        <div class="row mx-auto my-auto scroll">
            <div id="myCarousel" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner w-100" role="listbox">
                    <div class="carousel-item active">
                        <div class="col-lg-4 col-md-12">
                            <div class="box">
                                <i class="fas fa-quote-left quote"></i>
                                <p>Lorem aliasry ipsum dolor sits ametans, consectetur adipisicing elitits. Expedita
                                    reiciendis itaque placeat thuratu, quasi yiuos repellendus repudiandae deleniti
                                    ideas fuga molestiae, alias.</p>
                                <div class="content">
                                    <div class="info">
                                        <div class="name">Alex Smith</div>
                                        <div class="job">Designer | Developer</div>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="image">
                                        <img src="photos/instagram/thumb-card8.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-4 col-md-12">
                            <div class="box">
                                <i class="fas fa-quote-left quote"></i>
                                <p>Lorem aliasry ipsum dolor sits ametans, consectetur adipisicing elitits. Expedita
                                    reiciendis itaque placeat thuratu, quasi yiuos repellendus repudiandae deleniti
                                    ideas fuga molestiae, alias.</p>
                                <div class="content">
                                    <div class="info">
                                        <div class="name">Alex Smith</div>
                                        <div class="job">Designer | Developer</div>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="image">
                                        <img src="photos/instagram/thumb-card5.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-4 col-md-12">
                            <div class="box">
                                <i class="fas fa-quote-left quote"></i>
                                <p>Lorem aliasry ipsum dolor sits ametans, consectetur adipisicing elitits. Expedita
                                    reiciendis itaque placeat thuratu, quasi yiuos repellendus repudiandae deleniti
                                    ideas fuga molestiae, alias.</p>
                                <div class="content">
                                    <div class="info">
                                        <div class="name">Alex Smith</div>
                                        <div class="job">Designer | Developer</div>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="image">
                                        <img src="photos/resize1.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-4 col-md-12">
                            <div class="box">
                                <i class="fas fa-quote-left quote"></i>
                                <p>Lorem aliasry ipsum dolor sits ametans, consectetur adipisicing elitits. Expedita
                                    reiciendis itaque placeat thuratu, quasi yiuos repellendus repudiandae deleniti
                                    ideas fuga molestiae, alias.</p>
                                <div class="content">
                                    <div class="info">
                                        <div class="name">Alex Smith</div>
                                        <div class="job">Designer | Developer</div>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="image">
                                        <img src="photos/instagram/thumb-card3.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-4 col-md-12">
                            <div class="box">
                                <i class="fas fa-quote-left quote"></i>
                                <p>Lorem aliasry ipsum dolor sits ametans, consectetur adipisicing elitits. Expedita
                                    reiciendis itaque placeat thuratu, quasi yiuos repellendus repudiandae deleniti
                                    ideas fuga molestiae, alias.</p>
                                <div class="content">
                                    <div class="info">
                                        <div class="name">Alex Smith</div>
                                        <div class="job">Designer | Developer</div>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="image">
                                        <img src="photos/portfolio5.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-4 col-md-12">
                            <div class="box">
                                <i class="fas fa-quote-left quote"></i>
                                <p>Lorem aliasry ipsum dolor sits ametans, consectetur adipisicing elitits. Expedita
                                    reiciendis itaque placeat thuratu, quasi yiuos repellendus repudiandae deleniti
                                    ideas fuga molestiae, alias.</p>
                                <div class="content">
                                    <div class="info">
                                        <div class="name">Alex Smith</div>
                                        <div class="job">Designer | Developer</div>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="image">
                                        <img src="photos/instagram/thumb-card7.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-4 col-md-12">
                            <div class="box">
                                <i class="fas fa-quote-left quote"></i>
                                <p>Lorem aliasry ipsum dolor sits ametans, consectetur adipisicing elitits. Expedita
                                    reiciendis itaque placeat thuratu, quasi yiuos repellendus repudiandae deleniti
                                    ideas fuga molestiae, alias.</p>
                                <div class="content">
                                    <div class="info">
                                        <div class="name">Alex Smith</div>
                                        <div class="job">Designer | Developer</div>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="image">
                                        <img src="photos/portfolio1.jpeg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev w-auto" href="#myCarousel" role="button" data-slide="prev">
                    <span class="" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next w-auto" href="#myCarousel" role="button" data-slide="next">
                    <span class="" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>



<!--================== ========================= CONTACT =======================================================-->

<section id="contact" class="contact ">
    <div class="text-center scroll">
        <h1>Contact Me</h1>
        <h6>Get in touch</h6>
    </div>

    <div class="container d-sm-flex justify-content-between">

        <div class="my-contact scroll">
            <div class="contact-item scroll">
                <div class="icons flexible"><i class="icon fas fa-user"></i>
                    <h5> Name</h5>
                </div>
                <p>CHU Wung Bertrand</p>
            </div>

            <div class="contact-item scroll">
                <div class="icons flexible">
                    <i class="fas fa-phone-alt"></i>
                    <h5> Call me</h5>
                </div>
                <p>+ 33 7 51 51 63 78</p>
            </div>

            <div class="contact-item scroll">
                <div class="icons flexible">
                    <i class="fas fa-envelope"></i>
                    <h5> Email</h5>
                </div>
                <p>cwbertrand8@gmail.com</p>
            </div>

            <div class="contact-item scroll">
                <div class="icons flexible">
                    <i class="fas fa-map-marker-alt"></i>
                    <h5>Address</h5>
                </div>
                <p>8 Rue de la Rivière</p>
                <p>67200 Strasbourg</p>
            </div>
        </div>


        <form class="size scroll" method="POST" action="mail.php">
            <input type="hidden" name="token_mail" value="<?= miniToken('token_mail'); ?>">
            <div class="form-row my-5">
                <div class="form-group col-md-6 mb-2">
                    <label for="inputEmail4">Name</label>
                    <input type="name" class="form-control <?= isset($error['name']) ? ' is-invalid' : ''; ?>"
                        id="inputEmail4" placeholder="Name" name="name">
                    <small id="nickname-help"
                        class="form-text text-muted"><?= isset($error['name']) ? $error['name'] : ''; ?></small>
                    <div class="">

                    </div>
                </div>
                <div class="form-group col-md-6 mb-2">
                    <label for="inputPassword4">Email</label>
                    <input type="email" class="form-control" id="inputPassword4" placeholder="example48@gmail.com"
                        name="email">
                </div>
                <select class="form-control form-control-lg mt-2" name="subject">
                    <option>Select Project</option>
                    <option>Web Design</option>
                    <option>Web Development</option>
                    <option>App Development</option>
                </select>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1 pt-2">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize: none;"
                        name="message"></textarea>
                </div>
                <button class="btn-two">Envoyer</button>
        </form>
    </div>
</section>



<!--================== ============================== FOOTER =======================================================-->


<?php

include_once 'footer.php';

?>