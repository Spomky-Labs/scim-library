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

class ReferenceAttributeType extends AttributeType
{
    /**
     * @var bool
     */
    protected $caseExact = false;

    /**
     * @var string[]
     */
    protected $referenceTypes = [];

    /**
     * @var string
     */
    protected $uniqueness = self::UNIQUENESS_NONE;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data)
    {
        Assertion::keyExists($data, 'referenceTypes');
        Assertion::isArray($data['referenceTypes']);
        Assertion::allString($data['referenceTypes']);
        Assertion::notEmpty($data['referenceTypes']);

        $data['type'] = self::TYPE_REFERENCE;
        parent::__construct($data);
    }

    /**
     * {@inheritdoc}
     */
    public function isValueValid($value)
    {
        return is_string($value);
    }
}
