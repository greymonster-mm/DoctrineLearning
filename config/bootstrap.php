<?php
 // bootstrap.php
 use Doctrine\ORM\Tools\Setup;
 use Doctrine\ORM\EntityManager;
 
 require_once "vendor/autoload.php";
 require_once "filter.php";
 // Create a simple "default" Doctrine ORM configuration for Annotations
 $isDevMode = true;
 $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);

 if ($isDevMode) {
 	$cache = new \Doctrine\Common\Cache\ArrayCache;

    //Doctrine\Common\Proxy\AbstractProxyFactory::AUTOGENERATE_NEVER
    //Doctrine\Common\Proxy\AbstractProxyFactory::AUTOGENERATE_ALWAYS
    //Doctrine\Common\Proxy\AbstractProxyFactory::AUTOGENERATE_FILE_NOT_EXISTS
    //Doctrine\Common\Proxy\AbstractProxyFactory::AUTOGENERATE_EVAL

    $config->setAutoGenerateProxyClasses('Doctrine\Common\Proxy\AbstractProxyFactory::AUTOGENERATE_ALWAYS');

    
    //二级缓存
    //$factory = new \Doctrine\ORM\Cache\DefaultCacheFactory($config, $cache);
    // Enable second-level-cache
    //$config->setSecondLevelCacheEnabled();
    // Cache factory
    //$config->getSecondLevelCacheConfiguration()
    //->setCacheFactory($factory);
    
    
    
    $logger = new Doctrine\DBAL\Logging\EchoSQLLogger();
     $config->setSQLLogger($logger);
 } else {
 	$cache = new \Doctrine\Common\Cache\ApcCache;
 }
 
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

