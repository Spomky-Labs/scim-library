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
}
