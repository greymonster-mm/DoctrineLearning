<?php
// show_bug.php <id>
require_once "config/bootstrap.php";
require_once "config/src/User.php";
require_once "config/src/Bug.php";
require_once "config/src/Product.php";
use Doctrine\Common\Util\Debug;


$theBugId = $argv[1];

$bug = $entityManager->find("Bug", (int)$theBugId);
var_dump(Debug::export($bug));
