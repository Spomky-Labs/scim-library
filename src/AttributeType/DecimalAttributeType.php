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

class DecimalAttributeType extends AttributeType
{
    /**
     * @var string
     */
    protected $uniqueness = self::UNIQUENESS_NONE;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data)
    {
        $data['type'] = self::TYPE_DECIMAL;
        parent::__construct($data);
    }

    /**
     * {@inheritdoc}
     */
    public function isValueValid($value)
    {
        return is_numeric($value) && !is_string($value);
    }
}
