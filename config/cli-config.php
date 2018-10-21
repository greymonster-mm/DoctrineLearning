 <?php
 use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
 
 // replace with file to your own project bootstrap
 require_once 'bootstrap.php';
 
 // replace with mechanism to retrieve EntityManager in your app
 //$entityManager = GetEntityManager();
 

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));
