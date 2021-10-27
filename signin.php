<?php

require_once 'config/framework.php';
require_once 'config/connect.php';

$title = 'page de Connexion';
require_once 'header.php';

if (isset($_SESSION['users'])) {
    redirectToRoute();
}

 // DEMARRER LES COOKIESS A LA FIN =================================================

if (isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
    $sql = 'SELECT * FROM users WHERE email="'.$_POST['email'].'"';
    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (password_verify($_POST['password'], $row['password'])) {
                    $_SESSION['user'] = $row;

                    if (isset($_POST['remember']) && $_POST['remember'] === 'on') {
                        $arr_cookie_options = [
                            'expires' => (time() + 3600),
                            'path' => '/',
                            'domain' => '', // leading dot for compatibility or use subdomain
                            'secure' => true,     // or false
                            'httponly' => true,    // or false
                            'samesite' => 'None', // None || Lax  || Strict
                        ];

                        setcookie('remember', $row['security'], $arr_cookie_options);
                    }

                    redirectToRoute();
                } else {
                    echo 'compte non reconu';
                }
            }
        }
        $result->close();
    } else {
        echo 'compte non reconu';
    }
}

?>




 <!--================== ================= SIGN IN FORM ==========================================-->


 <form class=" d-flex justify-content-center align-items-center flex-column pt-5 hero" action="" method="post">
 <input type="hidden" name="token" value="<?= miniToken(); ?>">
      
      
        <div class="form-group w-25">
          <label for="formGroupExampleInput" class="text-white">Email</label>
          <input type="email" class="form-control <?= isset($validate['email']) ? ' is-invalid' : ''; ?>" id="formGroupExampleInput" name="email" placeholder="email addresse" aria-describedby="nickname-help">
          <small id="nickname-help" class="form-text text-muted"><?= isset($validate['email']) ? 'is-invalid' : ''; ?></small>
        </div>

        <div class="form-group w-25">
          <label for="formGroupExampleInput2" class="text-white">Mot de passe</label>
          <input type="password" class="form-control <?= isset($validate['password']) ? ' is-invalid' : ''; ?>" id="formGroupExampleInput2" name="password" placeholder="Mot de passe" aria-describedby="nickname-help">
          <small id="nickname-help" class="form-text text-muted"><?= isset($validate['password']) ? 'is-invalid' : ''; ?></small>
        </div>
        
        <div>
            <input type="checkbox" name="remember"> <span class="text-white pl-3">Set Cookies</span>
        </div>

        <div class="text-center ">
            <button class="btn btn-warning text-white mb-5" type="submit" name="submit">Connectez-vous</button>
          </div>
      </form>






</body>