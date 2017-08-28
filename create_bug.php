<?php
// create_bug.php <reporter-id> <engineer-id> <product-ids>
require_once "config/bootstrap.php";
require_once "config/src/User.php";
require_once "config/src/Bug.php";
require_once "config/src/Product.php";

$reporterId = $argv[1];
$engineerId = $argv[2];
$productIds = explode(",", $argv[3]);

$reporter = $entityManager->find("User", $reporterId);
$engineer = $entityManager->find("User", $engineerId);
if (!$reporter || !$engineer) {
    echo "No reporter and/or engineer found for the given id(s).\n";
    exit(1);
}

$bug = new Bug();
$bug->setDescription("Something does not work!");
$bug->setCreated(new DateTime("now"));
$bug->setStatus("OPEN");

foreach ($productIds as $productId) {
    $product = $entityManager->find("Product", $productId);
    $bug->assignToProduct($product);
}

$bug->setReporter($reporter);
$bug->setEngineer($engineer);
$bug->getReporter()->setName('babala');

$entityManager->persist($bug);
$entityManager->flush();

echo "Your new Bug Id: ".$bug->getId()."\n";
