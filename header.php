<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CW Bertrand">
    <link rel="shortcut icon" href="./photos/favicon.png">
    <meta name="description" content="my first ever portfolio">
    <meta name="keywords" content="portfolio,html,css, bootstrap">
    <!-- <script defer src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <link rel="stylesheet" href="css/stylesheet.css">

    <?= isset($css) ? $css : ''; ?>
    <?= isset($csc) ? $csc : ''; ?>

    <title><?= $title; ?></title>
</head>

<body>

    <style>
    @media (min-width: 768px) {

        .carousel-inner .carousel-item-right.active,
        .carousel-inner .carousel-item-next {
            transform: translateX(50%);
        }

        .carousel-inner .carousel-item-left.active,
        .carousel-inner .carousel-item-prev {
            transform: translateX(-50%);
        }
    }

    /* large - display 3 */
    @media (min-width: 992px) {

        .carousel-inner .carousel-item-right.active,
        .carousel-inner .carousel-item-next {
            transform: translateX(33%);
        }

        .carousel-inner .carousel-item-left.active,
        .carousel-inner .carousel-item-prev {
            transform: translateX(-33%);
        }
    }

    @media (max-width: 768px) {
        .carousel-inner .carousel-item>div {
            display: none;
        }

        .carousel-inner .carousel-item>div:first-child {
            display: block;
        }
    }
    </style>

    <!--================== =================NAV BAR ==========================================-->


    <?php
        if (!empty($_SESSION['msg-flash'])) {
            echo '<div class="alert alert-'.$_SESSION['msg-flash']['type'].'" role="alert">'.$_SESSION['msg-flash']['message'].'</div>';
            $_SESSION['msg-flash'] = [];
        }
    ?>


    <!--================== =========================== HOME ======================================================-->

    <header id="header">
        <nav class=" navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#"><img class="rounded-circle" src="/photos/logo.jpg" alt="" srcset=""
                        width="100%" height="90px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=" text-white"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto nav-pills">
                        <a class="nav-link active" href="/">Accueil <span class="sr-only">(current)</span></a>

                        <?php
                                if (isset($_SESSION['user'])) {
                                    echo '<a class="nav-link" href="#about">Découvrez-moi</a>';
                                    echo '<a class="nav-link" href="#service">Service</a>';
                                    echo '<a class="nav-link" href="#competence">Compétence</a>';
                                    echo '<div class="dropdown show">
                                            <a class="btn bg-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Portfolio
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#portfolio">Projet recent</a>
                                                <a class="dropdown-item" href="projets.php">Tous les projets</a>
                                                
                                            </div>
                                         </div>';
                                    echo '<a class="nav-link" href="#contact">Contact</a>';
                                    echo '<a class="nav-link text-bold" href="profilepage.php">PROFIL</a>';
                                    echo '<a class="nav-link" href="/logout.php">Déconnecter</a>';
                                    $roles = json_decode($_SESSION['user']['roles']);
                                    if (in_array('ROLE_ADMIN', $roles)) {
                                        echo '<a class="nav-link" href="/admin/">Admin</a>';
                                    }
                                } else {
                                    if ($_SERVER['SCRIPT_NAME'] !== '/signin.php') {
                                        echo '<a class="nav-link" href="/signin.php">Connexion</a>';
                                    }
                                    if ($_SERVER['SCRIPT_NAME'] !== '/register.php') {
                                        echo '<a class="nav-link" href="/register.php">Créer un compte</a>';
                                    }
                                }

                                ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>