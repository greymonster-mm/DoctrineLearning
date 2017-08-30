 <?php
  require_once "config/bootstrap.php";
  require_once "config/src/fields.php";
  $em = $entityManager;
  $f = $em->find('Fields', 1);
  var_dump($f);
  die;
  //
  class test {}
  $f = new Fields();
  $f->setArray(["a","b"=>"c"]);
  $f->setObject(new test());
  $f->setSimpleSrray(["a","b"=>"c"]);
  
 
  $em->persist($f);
  $em->flush();
  
  
  
  
  
  die;

  
  $f = $em->find('Fields', 0);
  var_dump($f->getArray() );
  var_dump($f->getObject() );
  var_dump($f->getSimpleSrray() );
  
  die;
  
  
