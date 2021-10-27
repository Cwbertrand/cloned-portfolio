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
    $roles = ['ROLE_USER'];
    $role = [false, true, false];
    shuffle($role);

    if ($role[0] === true) {
        array_push($roles, 'ROLE_ADMIN');
    }

    $pseudo = str_replace([' '], [''], strtolower($faker->name));
    $email = $pseudo.'@'.$faker->freeEmailDomain;
    $datetime = $faker->dateTimeBetween('-12 month', 'now');
    $datetime = date_format($datetime, 'Y-m-d H:i:s');
    $password_hash = password_hash($pseudo, PASSWORD_DEFAULT);
    $roles = json_encode($roles);

    $sql = "INSERT INTO users(email,password,pseudo,roles) VALUES ('".$email."','".$password_hash."','".$pseudo."','".$roles."')";
    if ($mysqli->query($sql) === true) {
        echo $roles.'<br>';
        echo $pseudo.'<br>';
        echo $email.'<br>';
        echo $datetime.'<br>';
        echo $password_hash.'<br>';
        echo '<br>';
    } else {
        echo 'une erreur est survenue. Veuillez recommencer';
    }
}
