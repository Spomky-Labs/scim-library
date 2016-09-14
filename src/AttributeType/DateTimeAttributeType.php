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

class DateTimeAttributeType extends AttributeType
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $data)
    {
        $data['type'] = self::TYPE_DATETIME;
        parent::__construct($data);
    }
}
