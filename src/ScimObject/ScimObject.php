<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Scim\ScimObject;

use Assert\Assertion;

abstract class ScimObject implements ScimObjectInterface
{
    /**
     * ScimObject constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $k => $v) {
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
    public function jsonSerialize()
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
