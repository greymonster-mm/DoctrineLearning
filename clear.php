<?php
// show_bug.php <id>
require_once "config/bootstrap.php";
require_once "config/src/User.php";
require_once "config/src/Bug.php";
require_once "config/src/Product.php";



$bug = $entityManager->find("Bug", (int)3);
$bug->setDescription('abc');
//$entityManager->persist($bug);
$entityManager->detach($bug);
//$entityManager->persist($bug);
$entityManager->merge($bug);
$entityManager->flush();

//$entityManager->clear();
//$bug->getReportedBugs()->toArray();

$identity = $entityManager->getUnitOfWork()->getIdentityMap();
foreach ($identity as $class => $objectlist) {
    echo $class;
}

//$bug = $entityManager->find("Bug", (int)2);
//echo $bug->getDescription();
