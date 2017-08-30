<?php

/**
 * @Entity
 * @Table(name="exchange_stocks")
 */
class Stock
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * For real this column would have to be unique=true. But I want to test behavior of non-unique overrides.
     *
     * @Column(type="string", unique=true)
     */
    private $symbol;

    /**
     * @ManyToOne(targetEntity="Market", inversedBy="stocks")
     * @var Market
     */
    private $market;

     //ManyToOne(targetEntity="Market", inversedBy="stocks")
    public function __construct($symbol, Market $market)
    {
        $this->symbol = $symbol;
        $this->market = $market;
        $market->addStock($this);
    }

    public function getSymbol()
    {
        return $this->symbol;
    }

    public function getMarket()
    {
        return $this->market;
    }
}
