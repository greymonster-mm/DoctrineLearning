<?php
require_once "config/bootstrap.php";
require_once "config/src/User.php";
require_once "config/src/Bug.php";
require_once "config/src/Product.php";
require_once "config/src/Address.php";
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

/*
$rsm = new ResultSetMapping();
$rsm = new ResultSetMappingBuilder($entityManager);
$rsm->addRootEntityFromClassMetadata('User', 'u', ['id' => 'user_id']);
$rsm->addJoinedEntityFromClassMetadata('Address', 'a', 'u', 'address');

$query = $entityManager->createNativeQuery('SELECT u.*,a.* FROM users u left join address a on u.id = a.uid', $rsm);
$users = $query->getArrayResult();
var_dump($users);die;
foreach($users as $user)
{
    $address = $user->getAddress();
    echo $address->getAddress();
}    

die;
*/

$q = $entityManager->createQuery("select b,p from Bug b Join b.products p");
$ret = $q->getResult();
foreach($ret as $r)
{
    $products = ($r->getProducts());
    foreach($products as $product)
    {
        echo $product->getName();
    }

}
//var_dump($ret);
