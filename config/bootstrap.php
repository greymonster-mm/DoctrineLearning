<?php
 // bootstrap.php
 use Doctrine\ORM\Tools\Setup;
 use Doctrine\ORM\EntityManager;
 
 require_once "vendor/autoload.php";
 
 // Create a simple "default" Doctrine ORM configuration for Annotations
 $isDevMode = true;
 $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
 // or if you prefer yaml or XML
 //$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/../Model/Modo/Entities"), $isDevMode);
 //$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
 
 // database configuration parameters
 $conn = array(
     'driver' => 'pdo_mysql',
     'host'   => '10.200.10.212',
     'user'   => 'root',
     'password' => 'root',
     'dbname'   => 'test',
 );
 
 // obtaining the entity manager
 $entityManager = EntityManager::create($conn, $config);
 //$conn = $entityManager->getConnection();
 //$conn->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

