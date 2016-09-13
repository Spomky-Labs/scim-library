<?php

namespace Scim\Attribute;

use Assert\Assertion;

abstract class Attribute implements AttributeInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var bool
     */
    protected $multiValued = false;

    /**
     * @var bool
     */
    protected $required = false;

    /**
     * @var string[]
     */
    protected $canonicalValues = [];

    /**
     * @var string
     */
    protected $mutability = self::MUTABILITY_READWRITE;

    /**
     * @var string
     */
    protected $returned = self::RETURNED_DEFAULT;

    /**
     * Attribute constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        Assertion::keyExists($data, 'name');
        Assertion::string($data['name']);
        Assertion::keyExists($data, 'type');
        Assertion::string($data['type']);

        foreach ($data as $k=>$v) {
            Assertion::true(property_exists($this, $k), sprintf('The property "%s" does not exist. %s.', $k, json_encode($data)));
            $this->$k = $v;
        }
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
        Assertion::true($this->has($key));

        return $this->$key;
    }

    /**
     * {@inheritdoc}
     */
    function jsonSerialize()
    {
        $keys = $this->getReturnedKeys();
        $result = [];

        foreach ($keys as $key) {
            Assertion::true(property_exists($this, $key), sprintf('The property "%s" does not exist.', $key));
            if (is_bool($this->$key) || !empty($this->$key)) {
                $result[$key] = $this->$key;
            }
        }

        return $result;
    }

    /**
     * @return mixed
     */
    protected function getReturnedKeys()
    {
        return array_keys(get_object_vars($this));
    }
}
