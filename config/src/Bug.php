<?php
// src/Bug.php

use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity(repositoryClass="BugRepository") @HasLifecycleCallbacks @Table(name="bugs") @HasLifecycleCallbacks
 */
class Bug
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     **/
    protected $id;
    /**
     * @Column(type="string")
     **/
    protected $description;
    /**
     * @Column(type="datetime")
     **/
    protected $created;
    /**
     * @Column(type="string")
     **/
    protected $status;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="assignedBugs", fetch="EXTRA_LAZY")
     **/
    protected $engineer;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="reportedBugs", fetch="EXTRA_LAZY")
     **/
    protected $reporter;

    /**
     * @ManyToMany(targetEntity="Product", fetch="EXTRA_LAZY")
     **/
    protected $products;    

    /** @PrePersist */
    public function doTes($event)
    {
        //if ($event->hasChangedField('description'))
        {
            echo "我问谁,谁都不会话我知道生命的意义";
        }
        echo "我又有心事,自从看了太宰治"; 
    }
    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCreated(DateTime $created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function assignToProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }
    
    public function setEngineer(User $engineer)
    {
        $engineer->assignedToBug($this);
        $this->engineer = $engineer;
    }

    public function setReporter(User $reporter)
    {
        $reporter->addReportedBug($this);
        $this->reporter = $reporter;
    }

    public function getEngineer()
    {
        return $this->engineer;
    }

    public function getReporter()
    {
        return $this->reporter;
    }
}
