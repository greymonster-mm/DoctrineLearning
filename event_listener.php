<?php

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class MyEventListener
{
    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $entityManager = $args->getObjectManager();

    }
}


