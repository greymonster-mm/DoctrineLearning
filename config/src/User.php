<?php
// src/User.php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="users")
 */
class User
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     **/
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     **/
    protected $name;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="reporter" , fetch="EXTRA_LAZY")
     * @var Bug[] An ArrayCollection of Bug objects.
     **/
    protected $reportedBugs = null;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="engineer" , fetch="EXTRA_LAZY")
     * @var Bug[] An ArrayCollection of Bug objects.
     **/
    protected $assignedBugs = null;

    /**
     * ManyToOne(targetEntity="Address", inversedBy="uid" , fetch="EXTRA_LAZY")
     * var Address[] An ArrayCollection of Address objects
     *
    protected $address = null;
	*/
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
        //$this->address = new ArrayCollection();
    }

   /*  public function getAddress()
    {
        return $this->address;
    
    } */

    public function addReportedBug(Bug $bug)
    {
        $this->reportedBugs[] = $bug;
    }

    public function assignedToBug(Bug $bug)
    {
        $this->assignedBugs[] = $bug;
    }

    public function getReportedBugs()
    {
        return $this->reportedBugs;
    }
}
