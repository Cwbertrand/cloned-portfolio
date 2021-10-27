<?php

require_once 'config/framework.php';
require_once 'config/connect.php';

if (!isset($_SESSION['user'])) {
    redirectToRoute();
}

$errors = [];

// modifier l'avatar
if (isset($_POST['token_picture']) && $_POST['token_picture'] === $_SESSION['token_picture']) {
    if (isset($_FILES['picture_profil'])) {
        $target = APP_ROOT.'/img/'.sha1($_SESSION['user']['email']);
        if (!is_dir($target)) {
            mkdir($target);
        }

        $ext = pathinfo($_FILES['picture_profil']['name'], PATHINFO_EXTENSION);
        //$uploadfile = $uploaddir . basename($_FILES['picture_profil']['name']);
        $new_picture = $target.'/photo_profil.'.$ext;
        if (move_uploaded_file($_FILES['picture_profil']['tmp_name'], $new_picture)) {
            //echo "File is valid, and was successfully uploaded.\n";
            $sql = "UPDATE users SET photo='photo_profil.".$ext."' WHERE id = '".$_SESSION['user']['id']."'";
            if ($mysqli->query($sql) === true) {
                $_SESSION['user']['photo'] = 'photo_profil.'.$ext;
            } else {
                echo "Possible file upload attack!\n";
            }
        } else {
            echo "Possible file upload attack!\n";
        }
    }
}

// supprime le compte
if (isset($_POST['token_delete']) && $_POST['token_delete'] === $_SESSION['token_delete']) {
    $sql = "DELETE FROM users WHERE id='".$_SESSION['user']['id']."'";
    if ($mysqli->query($sql) === true) {
        redirectToRoute('/register.php');
    }
}

// modifier le pseudo
if (isset($_POST['token_modify_pseudo']) && $_POST['token_modify_pseudo'] === $_SESSION['token_modify_pseudo']) {
    if (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 30) {
        $errors['pseudo'] = 'Votre pseudo dois contenir minimum 3 caratères et maximum 30 caractères';
    }

    if (empty($errors)) {
        $sql = "UPDATE users SET pseudo='".$_POST['pseudo']."' WHERE id='".$_SESSION['user']['id']."'";
        if ($mysqli->query($sql) === true) {
            //redirectToRoute('/logout.php');
            $_SESSION['user']['pseudo'] = $_POST['pseudo'];
        }
    }
}

// modifier le mail
if (isset($_POST['token_modify_email']) && $_POST['token_modify_email'] === $_SESSION['token_modify_email']) {
    if (empty($errors)) {
        $sql = "UPDATE users SET email='".$_POST['email']."' WHERE id = '".$_SESSION['user']['id']."'";
        if ($mysqli->query($sql) === true) {
            //redirectToRoute('/logout.php');
            $_SESSION['user']['email'] = $_POST['email'];
        }
    }
}

// modifier le telephone
if (isset($_POST['token_modify_phone']) && $_POST['token_modify_phone'] === $_SESSION['token_modify_phone']) {
    if (strlen($_POST['phone']) < 3 || strlen($_POST['phone']) > 30) {
        $errors['phone'] = "Votre numero c'\n est pas valide!!";
    }

    if (empty($errors)) {
        $sql = "UPDATE users SET phone='".$_POST['phone']."' WHERE id = '".$_SESSION['user']['id']."'";
        if ($mysqli->query($sql) === true) {
            //redirectToRoute('/logout.php');
            $_SESSION['user']['phone'] = $_POST['phone'];
        }
    }
}

$title = 'Profile page';
$css = '<link rel="stylesheet" href="css/profilepage.css">';
$css .= '<link rel="stylesheet" href="css/stylesheet.css">';

require_once 'header.php';
?>


    <div class="container emp-profile">
        <h2 class="text-center pb-5">Profil</h2>
            <div class="row">
                <div class="col-md-4">
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="token_picture" value="<?= miniToken('token_picture'); ?>">
                        <div class="profile-img">
                            <img class="rounded-lg" src="<?= picture_profil(); ?>" width="200" height="150" alt="<?= $_SESSSION['user']['photo']; ?>"/>
                            <div class="file btn btn-lg btn-primary">
                                upload photo
                                <input type="file" name="picture_profil" />
                            </div>
                        </div>
                        <button type="submit" class="fas_position  fab_position fas">Save</button>
                    </form>
                </div>
                

                <div class="col-md-6">
                    <div class="profile-head">
                        <h4><?= $_SESSION['user']['pseudo']; ?></h4>
                        <h6>Développeur et concepteur Web</h6>
                        <p class="proile-rating">CLASSEMENTS : <span>8/10</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">À propos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            

            <div class="row">
                    <div class="col-md-4">
                            <div class="profile-work">
                                <p>LIEN DE TRAVAIL</p>
                                <a href="">Lien de site Web</a><br/>
                                <a href="">Profil Bootsnipp</a><br/>
                                <a href="">Profil de Bootply</a>
                                <p>COMPÉTENCES</p>
                                <a href="">Concepteur Web</a><br/>
                                <a href="">Développeur web</a><br/>
                                <a href="">WordPress</a><br/>
                                <a href="">WooCommerce</a><br/>
                                <a href="">PHP, .Net</a><br/>
                            </div>
                        </div>
                        
                        <div class="col-md-8">

                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Identifiant</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="h6 text-primary">Cwbertrand29@k</p>
                                        </div>
                                    </div>
                                            
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Nom</label>
                                        </div>
                                        <div class="col-md-6 d-flex">
                                            <form method="post" class="form-inline">
                                                <input type="hidden" name="token_modify_pseudo" value="<?= miniToken('token_modify_pseudo'); ?>">
                                                <p class="h6 text-primary"><?= $_SESSION['user']['pseudo']; ?></p>
                                                <?php if (isset($errors['pseudo'])) {
    echo '<div class="error">'.$errors['pseudo'].'</div>';
}
                                                ?>
                                                <input class="form-control<?= isset($errors['pseudo']) ? ' is-invalid' : ''; ?>" type="text" name="pseudo">
                                                <span><button type="submit" class="fas_position fas fa-chevron-right"></button></span>
                                            </form>
                                        </div>
                                    </div>
                                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>

                                        <div class="col-md-6 d-flex">
                                            <form method="post" class="form-inline">
                                                <input type="hidden" name="token_modify_email" value="<?= miniToken('token_modify_email'); ?>">
                                                <p class="h6 text-primary"><?= $_SESSION['user']['email']; ?></p>
                                                <?php if (isset($errors['email'])) {
                                                    echo '<div class="error">'.$errors['email'].'</div>';
                                                }
                                                ?>
                                                <input class="form-control<?= isset($errors['email']) ? ' is-invalid' : ''; ?>" type="text" name="email">
                                                <span><button type="submit" class="fas_position fas fa-chevron-right"></button></span>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Mobile</label>
                                        </div>
                                        <div class="col-md-6 d-flex">
                                            <form method="post" class="form-inline">
                                                <input type="hidden" name="token_modify_phone" value="<?= miniToken('token_modify_phone'); ?>">
                                                <p class="h6 text-primary"><?= $_SESSION['user']['phone']; ?></p>
                                                <?php if (isset($errors['phone'])) {
                                                    echo '<div class="error">'.$errors['phone'].'</div>';
                                                }
                                                ?>
                                                <input class="form-control<?= isset($errors['phone']) ? ' is-invalid' : ''; ?>" type="number" name="phone">
                                                <span><button type="submit" class="fas_position fas fa-chevron-right"></button></span>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Profession</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="h6 text-primary">Développeur et concepteur Web</p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                <div>
                    <form method="post" onClick="return confirm('Are you sure delete your account ?');">
                        <input type="hidden" name="token_delete" value="<?= miniToken('token_delete'); ?>">  
                        <button type="submit" class="btn bg-danger">SUPPRIMER LE COMPTE</button> 
                    </form> 
                </div>
            </div>
    </div> 



 <?php

include_once 'footer.php';

?>
