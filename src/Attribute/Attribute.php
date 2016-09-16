<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Scim\Attribute;

use Assert\Assertion;
use Scim\AttributeType\AttributeTypeInterface;

final class Attribute implements AttributeInterface
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @var \Scim\AttributeType\AttributeTypeInterface
     */
    private $attributeType;

    /**
     * Attribute constructor.
     *
     * @param mixed                                      $value
     * @param \Scim\AttributeType\AttributeTypeInterface $attributeType
     */
    public function __construct($value, AttributeTypeInterface $attributeType)
    {
        Assertion::true($attributeType->isValueValid($value));
        $this->value = $value;
        $this->attributeType = $attributeType;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributeType()
    {
        return $this->attributeType;
    }
}
