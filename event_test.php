<?php 
require_once "config/bootstrap.php";
require_once "config/src/User.php";
require_once "config/src/Bug.php";
require_once "config/src/Product.php";
use Doctrine\Common\EventManager;
use Doctrine\ORM\Events;

class MyEventListener
{
	public function postPersist  ( $args)
	{
		
		
		$em = $args->getEntityManager();
		$entity = $args->getEntity();
		var_dump($entity->getId());die;
		$uow = $em->getUnitOfWork();
		
		var_dump($uow->getIdentityMap($entity));die;
		foreach ($uow->getScheduledEntityInsertions() as $entity) {
			
			
		}
	}
}


$e = new EventManager();
$entityManager->getEventManager()->addEventListener(array(Events::postPersist  ), new MyEventListener());

$newUsername = "menmei";
$user = new User();
$user->setName($newUsername);

$entityManager->persist($user);
$entityManager->flush();

echo "Created User with ID " . $user->getId() . "\n";

?>