<?php
/** @Entity */
class UserB
{
    /**
     * @Id @Column(type="integer")
     */
    protected $id;
     

    /**
     * Many Users have One Address.
     * @ManyToOne(targetEntity="AddressB")
     * @JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;
}

/** @Entity */
class AddressB
{
    /**
     * @Id @Column(type="integer")
     */
    protected $id;
}
