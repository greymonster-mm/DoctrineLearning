<?php
require_once "config/bootstrap.php";
require_once "config/src/User.php";
require_once "config/src/Bug.php";
require_once "config/src/Product.php";

if (false)
{
    $user = $entityManager->getRepository('User')->findAll();
    foreach($user as $u)
    {
        echo $u->getName();
    }
    die;
}
//$config->setDefaultRepositoryClassName('Doctrine\ORM\EntityRepository');
//$repo = $config->getDefaultRepositoryClassName();

$cmf = $entityManager->getMetadataFactory();
$class = $cmf->getMetadataFor('User');

//$user = new User();
$repo = new Doctrine\ORM\EntityRepository($entityManager, $class);

$user = $repo->findAll();
foreach($user as $u)
{
    echo $u->getName();
}
