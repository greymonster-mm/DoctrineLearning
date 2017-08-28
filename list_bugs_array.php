<?php
// list_bugs_array.php
require_once "config/bootstrap.php";
require_once "config/bootstrap.php";
require_once "config/src/User.php";
require_once "config/src/Bug.php";
require_once "config/src/Product.php";

$dql = "SELECT b, e, r, p FROM Bug b JOIN b.engineer e ".
    "JOIN b.reporter r JOIN b.products p ORDER BY b.created DESC";
//$dql = "SELECT b FROM Bug b";
$query = $entityManager->createQuery($dql);
$bugs = $query->getArrayResult();

foreach ($bugs as $bug) {
    echo $bug['description'] . " - " . $bug['created']->format('d.m.Y')."\n";
    echo "    Reported by: ".$bug['reporter']['name']."\n";
    echo "    Assigned to: ".$bug['engineer']['name']."\n";
    foreach ($bug['products'] as $product) {
        echo "    Platform: ".$product['name']."\n";
    }
    echo "\n";
}
