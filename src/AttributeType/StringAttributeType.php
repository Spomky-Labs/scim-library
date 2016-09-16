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

class StringAttributeType extends AttributeType
{
    /**
     * @var bool
     */
    protected $caseExact = false;

    /**
     * @var string[]
     */
    protected $canonicalValues = [];

    /**
     * @var string
     */
    protected $uniqueness = self::UNIQUENESS_NONE;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data)
    {
        $data['type'] = self::TYPE_STRING;
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
