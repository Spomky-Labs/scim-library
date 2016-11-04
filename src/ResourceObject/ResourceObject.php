<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Scim\ResourceObject;

use Assert\Assertion;

class ResourceObject implements ResourceObjectInterface
{
    /**
     * @var \Scim\Attribute\AttributeInterface[]
     */
    private $data = [];

    /**
     * ResourceObject constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        Assertion::true($this->has($key));

        return $this->data[$key];
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return $this->data;
    }
}
