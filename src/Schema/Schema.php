<?php

namespace Scim\Schema;

use Assert\Assertion;
use Scim\Attribute\AttributeInterface;

class Schema implements SchemaInterface
{
    /**
     * @var \Scim\Attribute\AttributeInterface[]
     */
    protected $attributes = [];

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var null|string
     */
    protected $description;

    /**
     * Resource constructor.
     *
     * @param string      $id
     * @param string      $name
     * @param null|string $description
     */
    public function __construct($id, $name, $description = null)
    {
        Assertion::string($id);
        Assertion::string($name);
        Assertion::nullOrString($description);
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        Assertion::string($key);

        return property_exists($this, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        Assertion::true($this->has($key), sprintf('Attribute "%s" does not exist.', $key));

        return $this->$key;
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $value)
    {
        Assertion::true($this->has($key), sprintf('Attribute "%s" does not exist.', $key));

        $this->$key = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getAttribute()
    {
        return $this->attributes;
    }

    /**
     * {@inheritdoc}
     */
    public function addAttribute(AttributeInterface $attribute)
    {
        $this->attributes[] = $attribute;
    }

    /**
     * {@inheritdoc}
     */
    function jsonSerialize()
    {
        $vars = ['id', 'name', 'description', 'attributes'];
        $results = [];
        foreach ($vars as $k) {
            $value = $this->$k;
            if (is_bool($value) || !empty($value)) {
                $results[$k] = $this->$k;
            }
        }

        return $results;
    }
}
