<?php
namespace Application\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Article
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;
    /** @Column(type="string") */
    private $title;

    /**
     * @OneToMany(targetEntity="ArticleAttribute", mappedBy="article", cascade={"ALL"}, indexBy="attribute")
     */
    private $attributes;

    public function addAttribute($name, $value)
    {
        $this->attributes[$name] = new ArticleAttribute($name, $value, $this);
    }
}

/**
 * @Entity
 */
class ArticleAttribute
{
    /** @Id @ManyToOne(targetEntity="Article", inversedBy="attributes") */
    private $article;

    /** @Id @Column(type="string") */
    private $attribute;

    /** @Column(type="string") */
    private $value;

    public function __construct($name, $value, $article)
    {
        $this->attribute = $name;
        $this->value = $value;
        $this->article = $article;
    }
}
