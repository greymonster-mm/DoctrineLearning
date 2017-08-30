<?php
/**
 * @Entity
 *
 * @AttributeOverrides({
 *      @AttributeOverride(name="foo",
 *          column=@Column(
 *              name     = "foo_overridden",
 *              type     = "integer",
 *              length   = 140,
 *              nullable = false,
 *              unique   = false
 *          )
 *      )
 * })
 *
 * @AssociationOverrides({
 *      @AssociationOverride(name="bar",
 *          joinColumns=@JoinColumn(
 *              name="example_entity_overridden_bar_id", referencedColumnName="id"
 *          )
 *      )
 * })
 */
class ExampleEntityWithOverride
{
    use ExampleTrait;
}

/**
 * @Entity
 */
class Bar
{
    /** @Id @Column(type="string") */
    private $id;
}


/**
 * Trait class
 */
trait ExampleTrait
{
    /** @Id @Column(type="string") */
    private $id;

    /**
     * @Column(name="trait_foo", type="integer", length=100, nullable=true, unique=true)
     */
    protected $foo;

    /**
     * @OneToOne(targetEntity="Bar", cascade={"persist", "merge"})
     * @JoinColumn(name="example_trait_bar_id", referencedColumnName="id")
     */
    protected $bar;
}
