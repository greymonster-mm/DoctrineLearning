<?php
require_once "bootstrap.php";
require_once "config/src/User.php";
require_once "config/src/Bug.php";
require_once "config/src/Product.php";
require_once "config/src/Address.php";
$filter = $entityManager->getFilters()->enable("locale");
/* $filter->setParameter('test', 'baba');
$u = $entityManager->find('user',1); 
var_dump($u->getName());die; */


/* $filter->setParameter('test', 'babara');
$user = new User();
//$user->setName('abc');

$entityManager->persist($user);
$entityManager->flush(); die;*/

/* $filter->setParameter('test', 'abc');

$dql = "SELECT u FROM User u where u.id = ?1";
$market = $entityManager->createQuery($dql)
							  ->setParameter(1, '2')
                              ->getArrayResult();
var_dump($market);die; */