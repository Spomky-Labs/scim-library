<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Scim\AttributeType;

use Assert\Assertion;

class ComplexAttributeType extends AttributeType
{
    /**
     * @var \Scim\AttributeType\AttributeTypeInterface[]
     */
    protected $subAttributes = [];

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data)
    {
        Assertion::keyExists($data, 'subAttributes');
        Assertion::isArray($data['subAttributes']);
        Assertion::allIsInstanceOf($data['subAttributes'], AttributeTypeInterface::class);
        Assertion::notEmpty($data['subAttributes']);

        // To be clarified. See http://stackoverflow.com/questions/39475320/complex-AttributeType-that-holds-another-complex-AttributeType
        /*foreach ($data['subAttributes'] as $AttributeType) {
            Assertion::notEq($AttributeType->getType(), self::TYPE_COMPLEX);
        }*/
        $data['type'] = self::TYPE_COMPLEX;
        parent::__construct($data);
    }

    /**
     * {@inheritdoc}
     */
    public function isValueValid($value)
    {
        Assertion::isArray($value);

        foreach ($value as $k => $v) {
            if ($this->hasSubAttribute($k)) {
                $subAttribute = $this->getSubAttribute($k);
                if (false === $subAttribute->isValueValid($v)) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    private function hasSubAttribute($key)
    {
        foreach ($this->subAttributes as $subAttribute) {
            if ($key === $subAttribute->getName()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $key
     *
     * @return \Scim\AttributeType\AttributeTypeInterface
     */
    private function getSubAttribute($key)
    {
        Assertion::true($this->hasSubAttribute($key));
        foreach ($this->subAttributes as $subAttribute) {
            if ($key === $subAttribute->getName()) {
                return $subAttribute;
            }
        }
    }
}
