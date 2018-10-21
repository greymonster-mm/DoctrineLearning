<?php
require 'config/bootstrap.php';
require 'config/src/Bug.php';
require 'config/src/User.php';
require 'config/src/Product.php';


use Doctrine\Common\EventManager;
use Doctrine\ORM\Events;

$em = $entityManager;
$test = new TestEvent();
$metadataFactory = $em->getMetadataFactory();
$evm = $em->getEventManager();
$evm->addEventListener(Events::loadClassMetadata, $test);

$bug = $em->find('bug', 3);


class TestEvent
{
    public function loadClassMetadata(\Doctrine\ORM\Event\LoadClassMetadataEventArgs $eventArgs)
    {
        echo "inininin\n";
        $classMetadata = $eventArgs->getClassMetadata();
        $fieldMapping = array(
            'fieldName' => 'about',
            'type' => 'string',
            'length' => 2555
        );
        $classMetadata->mapField($fieldMapping);
    }
}
