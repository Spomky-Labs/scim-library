<?php

namespace Scim\Resource;

use Assert\Assertion;
use Ramsey\Uuid\Uuid;

abstract class Resource implements ResourceInterface
{
    protected $id;
    protected $name;
    protected $description;
    protected $meta = [];
    protected $schemas = [];

    /**
     * Resource constructor.
     *
     * @param string      $name
     * @param array       $meta
     * @param array       $schemas
     * @param null|string $description
     */
    public function __construct($name, array $meta, array $schemas, $description = null)
    {
        Assertion::string($name);
        Assertion::keyExists($meta, 'location');
        Assertion::keyExists($meta, 'resourceType');
        Assertion::nullOrString($description);
        $this->id = Uuid::uuid4()->toString();
        $this->meta = $meta;
        $this->schemas = array_unique($schemas);
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
}
