<?php

require_once '../config/framework.php';
require_once '../config/connect.php';

$sql = 'SELECT id,email,pseudo FROM users';
$users = query($sql);

foreach ($users as $user) {
    $security = sha1($user['id'].$user['email'].$user['pseudo']);
    $update = "UPDATE users SET security='".$security."' WHERE id='".$user['id']."'";
    if ($mysqli->query($update) === true) {
        dump($security);
    } else {
        dump('erreur survenue pour l\'id: '.$user['id']);
    }
}
