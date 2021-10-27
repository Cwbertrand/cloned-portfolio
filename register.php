<?php

require_once 'config/framework.php';
require_once 'config/connect.php';

$title = "page d'inscription";
require_once 'header.php';

$validate = [];
$errors = [];
if (isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
    if (isset($_POST['pseudo'])) {
        if (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 30) {
            $validate['pseudo'] = 'Votre pseudo dois contenir 3 caractères minimum et 30 maximum !!';
        }
    }

    if (isset($_POST['email'])) {
        if (empty($_POST['email'])) {
            $validate['email'] = "Votre  email  c'est pas correct !!";
        }
    }

    if (isset($_POST['password'])) {
        if (strlen($_POST['password']) < 4) {
            $validate['password'] = "Votre email c'est pas valid !!";
        }
    }

    if (isset($_POST['pwdrepeat'])) {
        if ($_POST['pwdrepeat'] === $_POST['password']) {
            $password_hash = password_hash($_POST['pwdrepeat'], PASSWORD_DEFAULT);
        } else {
            $validate['pwdrepeat'] = 'Les mots de passe ne sont pas identique !!';
        }
    }

    if (empty($validate)) {
        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // inset bdd
        $sql = "INSERT INTO users(email, password, pseudo, roles) VALUES ('".$_POST['email']."',  '".$password_hash."', '".$_POST['pseudo']."', '".json_encode(['ROLE_USER'])."')";
        if ($mysqli->query($sql) === true) {
            redirectToRoute('/signin.php');
        } else {
            if ($mysqli->error === "Duplicate entry '".$_POST['email']."' for key 'users.email'") {
                $errors['sql'] = 'Impossible de créer le compte';
            } elseif ($mysqli->error === "Duplicate entry '".$_POST['pseudo']."' for key 'users.pseudo'") {
                $errors['sql'] = 'Désolé le pseudo existe déjà !!';
            } else {
                $errors['sql'] = $mysqli->error;
            }
        }
    }
}
?>



<!--================== ================= SIGN IN FORM ==========================================-->



<form class="d-flex hero justify-content-center align-items-center flex-column pt-5" method="post">
    <input type="hidden" name="token" value="<?= miniToken(); ?>">
    <input type="hidden" name="">
    
    <?= isset($errors['sql']) ? $errors['sql'] : ''; ?>

    <div class="form-group w-25">
        <label for="formGroupExampleInput" class="text-white">Nom</label>
        <input type="text" class="form-control<?= isset($validate['pseudo']) ? ' is-invalid' : ''; ?>"
            id="formGroupExampleInput" name="pseudo" aria-describedby="nickname-help">
        <small id="nickname-help"
            class="form-text text-muted"><?= isset($validate['pseudo']) ? $validate['pseudo'] : ''; ?></small>
    </div>

    <div class="form-group w-25">
        <label for="formGroupExampleInput" class="text-white">Email</label>
        <input type="email" class="form-control <?= isset($validate['email']) ? ' is-invalid' : ''; ?>"
            id="formGroupExampleInput" name="email" aria-describedby="nickname-help">
        <small id="nickname-help"
            class="form-text text-muted"><?= isset($validate['email']) ? $validate['email'] : ''; ?></small>
    </div>

    <div class="form-group w-25">
        <label for="formGroupExampleInput2" class="text-white">Mot de passe</label>
        <input type="password" class="form-control <?= isset($validate['password']) ? ' is-invalid' : ''; ?>"
            id="formGroupExampleInput2" name="password" aria-describedby="nickname-help">
        <small id="nickname-help"
            class="form-text text-muted"><?= isset($validate['password']) ? $validate['password'] : ''; ?></small>
    </div>

    <div class="form-group w-25">
        <label for="formGroupExampleInput2" class="text-white">Confirmation de chiffre</label>
        <input type="password" class="form-control <?= isset($validate['pwdrepeat']) ? ' is-invalid' : ''; ?>"
            id="formGroupExampleInput2" name="pwdrepeat" aria-describedby="nickname-help">
        <small id="nickname-help"
            class="form-text text-muted"><?= isset($validate['pwdrepeat']) ? $validate['pwdrepeat'] : ''; ?></small>
    </div>


    <div class="text-center ">
        <button class="btn btn-warning text-white mb-5" type="submit" name="submit">inscrivez-vous</button>
    </div>
</form>


</body>