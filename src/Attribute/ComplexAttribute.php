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

class ComplexAttribute extends Attribute
{
    /**
     * @var \Scim\Attribute\AttributeInterface[]
     */
    protected $subAttributes = [];

    /**
     * ComplexAttribute constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        Assertion::keyExists($data, 'subAttributes');
        Assertion::isArray($data['subAttributes']);
        Assertion::allIsInstanceOf($data['subAttributes'], AttributeInterface::class);
        Assertion::notEmpty($data['subAttributes']);

        // To be clarified. See http://stackoverflow.com/questions/39475320/complex-attribute-that-holds-another-complex-attribute
        /*foreach ($data['subAttributes'] as $attribute) {
            Assertion::notEq($attribute->getType(), self::TYPE_COMPLEX);
        }*/
        $data['type'] = self::TYPE_COMPLEX;
        parent::__construct($data);
    }
}
