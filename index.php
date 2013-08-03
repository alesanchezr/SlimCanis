<?php
// cli-config.php
require_once "bootstrap.php";

require_once "src/model/User.php";

$user = new User();

$user->setEmail("holis");

$entityManager->persist($user);
$entityManager->flush();