<?php

require_once "config/bootstrap.php";
require_once "config/src/Market.php";
require_once "config/src/Stock.php";

$em = $entityManager;
$marketId = 1;
$symbol = "AAPL";

$market = $em->find("Market", $marketId);

// Access the stocks by symbol now:
$stock = $market->getStock($symbol);
echo $stock->getSymbol();


$dql = "SELECT m, s FROM Market m JOIN m.stocks s WHERE m.id = ?1";
$market = $em->createQuery($dql)
                 ->setParameter(1, $marketId)
                              ->getSingleResult();

// Access the stocks by symbol now:
$stock = $market->getStock($symbol);
//
echo $stock->getSymbol(); // will print "AAPL"
