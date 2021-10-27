<?php
require_once 'config/framework.php';

session_start();
session_destroy();
redirectToRoute('/signin.php');

?>
