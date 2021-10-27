<?php

require_once '../config/framework.php';
require_once '../config/connect.php';
require_once '../vendor/autoload.php';

// // generate data by accessing properties
// echo $faker->name.'<br>';

//   // 'Lucy Cechtelar';
// echo $faker->address.'<br>';
//   // "426 Jordy Lodge
//   // Cartwrightshire, SC 88120-6700"
// echo $faker->text.'<br>';

// for ($i = 0; $i < 10; $i++) {

//  }

$faker = Faker\Factory::create();

for ($i = 0; $i < 200; ++$i) {
    $image = 'imageUrl($width, $height, "cats")';

    // generer un titre entre 6 et 10 caractere //
    $titre = $faker->sentence(rand(3, 4));

    // generer un username/ID //
    $id = $faker->userName;

    // generer du contenu //
    $content = addslashes(htmlentities(htmlspecialchars($faker->realText(25, 3))));

    /* generer un statut //
    $status = [true, false];
    shuffle($status);
    $statut = $status[0]; */

    // date creation du projet //
    $creation = $faker->dateTimeBetween('-6 month', 'now');
    $creation = date_format($creation, 'Y-m-d H:i:s');

    //slug//
    $slug = $titre;

    $titre = addslashes(htmlentities(htmlspecialchars($titre)));

    // generer un username/ID //
    if ($result = $mysqli->query('SELECT id FROM users ORDER BY RAND() LIMIT 1')) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $auteur = $row['id'];
            }
        }
        $result->close();
    } ?>


  <?php

      $sql = "INSERT INTO projets(titre,content,image,creation,slug,auteur) VALUES ('".addslashes(htmlentities(htmlspecialchars($titre)))."','".$content."','".$image."','".$creation."','".$slug."','".$auteur."')";
    if ($mysqli->query($sql)) {
        echo $id.'<br>';
        echo addslashes(htmlentities(htmlspecialchars($titre))).'<br>';
        echo $slug.'<br>';
        echo $content.'<br>';
        echo $creation.'<br>';
        echo $auteur.'<br>';
        echo $image.'<br>';
    } else {
        printf("Message d'erreur : %s\n", $mysqli->error);
    }
}
