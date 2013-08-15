<?php

require_once "globals.php";

// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Configuration;
use Doctrine\Common\ClassLoader;

$doctrine_dir = "vendor/doctrine/common/lib/Doctrine/";
$model_dir = __DIR__."/src/com/4geeks/entities";

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array($model_dir), $isDevMode);

$classLoader = new ClassLoader('src/model', $model_dir);
$classLoader->register();

// database configuration parameters
$connectionOptions = array(
    'driver'   => 'pdo_mysql',
    'host'     => $GLOBALS["dbServer"],
    'dbname'   => $GLOBALS["dbName"],
    'user'     => $GLOBALS["dbUser"] ,
    'password' => $GLOBALS["dbPassword"]
);

// obtaining the entity manager
$entityManager = EntityManager::create($connectionOptions, $config);