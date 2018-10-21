<?php
// src/User.php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="address")
 */
class Address
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     **/
    protected $id;

    /**
     * @OneToMany(targetEntity="User", mappedBy="id" , fetch="EXTRA_LAZY")
     **/
    protected $uid;

    /**
     * @Column(type="string")
     * @var string
     **/
    protected $address;

    
    public function getId()
    {
        return $this->id;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->name = $address;
    }

}
