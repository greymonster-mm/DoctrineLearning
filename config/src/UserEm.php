<?php

/** @Entity */
class UserEm
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    private $id;
    /** @Embedded(class = "Address") */
    private $address;

    public function __construct()
    {
        $this->address = new Address();
    }
}

/** @Embeddable */
class AddressEm
{
    /** @Column(type = "string") */
    private $street;

    /** @Column(type = "string") */
    private $postalCode;

    /** @Column(type = "string") */
    private $city;

    /** @Column(type = "string") */
    private $country;
}
