<?php
// create_user.php
require_once "config/bootstrap.php";
require_once "config/src/User.php";
require_once "config/src/Bug.php";
require_once "config/src/Product.php";
$newUsername = $argv[1];

$u = $entityManager->find('user', $newUsername);
foreach($u->getReportedBugs() as $v)
{
    echo $v->getDescription();
}

die;
$user = new User();
$user->setName($newUsername);

$entityManager->persist($user);
$entityManager->flush();

echo "Created User with ID " . $user->getId() . "\n";
