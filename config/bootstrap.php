<?php
 // bootstrap.php
 use Doctrine\ORM\Tools\Setup;
 use Doctrine\ORM\EntityManager;
 
 require_once "vendor/autoload.php";
 require_once "filter.php";
 // Create a simple "default" Doctrine ORM configuration for Annotations
 $isDevMode = true;
 
 if ($isDevMode) {
 	$cache = new \Doctrine\Common\Cache\ArrayCache;
 } else {
 	$cache = new \Doctrine\Common\Cache\ApcCache;
 }
 
 $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
 $config->setMetadataCacheImpl($cache);
 $config->addFilter("locale", "MyLocaleFilter");
 // or if you prefer yaml or XML
 //$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/../Model/Modo/Entities"), $isDevMode);
 //$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
 
// $config->setDefaultRepositoryClassName($fqcn);
// $config->getDefaultRepositoryClassName();

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

