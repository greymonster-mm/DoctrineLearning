<?php
require_once "config/bootstrap.php";
require_once "config/src/Market.php";
require_once "config/src/Stock.php";
 

$em = $entityManager;



$market = $em->find('stock', 3);
$em->remove($market);
$em->flush();





die;
$market = new Market("Some Exchange");
$stock1 = new Stock("GAPL", $market);
$stock2 = new Stock("AOOG", $market);

$em->persist($market);
$em->persist($stock1);
$em->persist($stock2);
$em->flush();
