
<?php
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="exchange_markets")
 */
class Market
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @OneToMany(targetEntity="Stock", mappedBy="market", indexBy="symbol", fetch="EXTRA_LAZY")
     * @var Stock[]
     */
    private $stocks;

    public function __construct($name)
    {
        $this->name = $name;
        $this->stocks = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addStock(Stock $stock)
    {
        $this->stocks[$stock->getSymbol()] = $stock;
    }

    public function getStock($symbol)
    {
        if (!isset($this->stocks[$symbol])) {
            throw new \InvalidArgumentException("Symbol is not traded on this market.");
        }

        return $this->stocks[$symbol];
    }

    public function getStocks()
    {
        return $this->stocks->toArray();
    }
}
