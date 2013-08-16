<?php

require_once "globals.php";
/*
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Configuration;
use Doctrine\Common\ClassLoader;

$doctrine_dir = "vendor/doctrine/common/lib/Doctrine/";
$model_dir = __DIR__."/src/com/4geeks/entities/Entity/";

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array($model_dir), $isDevMode);

$classLoader = new ClassLoader("Entity", $model_dir);
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
$entityManager = EntityManager::create($connectionOptions, $config);*/

use Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration,
    Doctrine\Common\Cache\ArrayCache as Cache,
    Doctrine\Common\Annotations\AnnotationRegistry,
    Doctrine\Common\ClassLoader;
 
//autoloading
require_once __DIR__ . '/vendor/autoload.php';
//$loader = new ClassLoader('Entity', __DIR__ . '/library');
$loader = new ClassLoader('Entity', __DIR__ . '/src/com/4geeks/entities');
$loader->register();
//$loader = new ClassLoader('EntityProxy', __DIR__ . '/library');
$loader = new ClassLoader('EntityProxy', __DIR__ . '/src/com/4geeks/entities');
$loader->register();
 
//configuration
$config = new Configuration();
$cache = new Cache();
$config->setQueryCacheImpl($cache);
$config->setProxyDir(__DIR__ . '/src/com/4geeks/entities/EntityProxy');
$config->setProxyNamespace('EntityProxy');
$config->setAutoGenerateProxyClasses(true);
 
//mapping (example uses annotations, could be any of XML/YAML or plain PHP)
//AnnotationRegistry::registerFile(__DIR__ . '/library/doctrine-orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
/*AnnotationRegistry::registerFile(__DIR__ . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
$driver = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
    new Doctrine\Common\Annotations\AnnotationReader(),
    array(__DIR__ . '/src/com/4geeks/entities/Entity')
    //array(__DIR__ . '/library/Entity')

);
$config->setMetadataDriverImpl($driver);*/
$config->setMetadataCacheImpl($cache);
 
//getting the EntityManager
/*$em = EntityManager::create(
    array(
        'driver' => 'pdo_sqlite',
        'path' => 'database.sqlite'
    ),
    $config
);*/
$connectionOptions = array(
    'driver'   => 'pdo_mysql',
    'host'     => $GLOBALS["dbServer"],
    'dbname'   => $GLOBALS["dbName"],
    'user'     => $GLOBALS["dbUser"] ,
    'password' => $GLOBALS["dbPassword"]
);
// obtaining the entity manager
$entityManager = EntityManager::create($connectionOptions, $config);
