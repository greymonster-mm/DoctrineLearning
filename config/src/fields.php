<?php
/**
  * @Entity(repositoryClass="fieldsRepository") @Table(name="fields")
  */
 class Fields
 {
      /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="SEQUENCE")
     */
 	
     protected $id;

    /**
     * @Column(type="object")
     */
     protected $object;

     /**
      * @Column(type="array")
      */
     protected $array;

     /**
      * @Column(type="simple_array")
      */
     protected $simple_array;

     /**
      * @Cloumn(type="json_array")
      */
     protected $json_array;

     /** 
      * @Column(name="`number`", type="integer") 
      */
     protected $number;
     public function setObject($object)
     {
     	$this->object = $object;
     }
     
     public function getObject()
     {
     	return $this->object;
     }

     public function setArray($array)
     {
     	$this->array = $array;
     }
      
     public function getArray()
     {
     	return $this->array;
     }
     public function setSimpleSrray($simple_array)
     {
     	$this->simple_array = $simple_array;
     }
      
     public function getSimpleSrray()
     {
     	return $this->simple_array;
     }
 }
