<?php

require_once("vendor/symfony/console/Symfony/Component/Console/Helper/HelperSet.php");
require_once("vendor/doctrine/dbal/lib/Doctrine/DBAL/Tools/Console/Helper/ConnectionHelper.php");
require_once("vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Helper/EntityManagerHelper.php");

// cli-config.php
require_once 'bootstrap.php';

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager)
));