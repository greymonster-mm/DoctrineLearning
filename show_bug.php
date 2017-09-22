<?php
// show_bug.php <id>
require_once "config/bootstrap.php";
require_once "config/src/User.php";
require_once "config/src/Bug.php";
require_once "config/src/Product.php";


$theBugId = $argv[1];

$bug = $entityManager->find("Bug", (int)$theBugId);
echo "Bug: ".$bug->getDescription()."\n";
echo "Engineer: ".$bug->getEngineer()->getName()."\n";
foreach ($bug->getProducts() as $v)
{
    echo $v->getName();
}
