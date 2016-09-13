<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Scim\ResourceType;

use Scim\Resource\ResourceInterface;

interface ResourceTypeInterface extends ResourceInterface
{
    /**
     * @param array $jsonObject
     *
     * @return \Scim\ResourceType\ResourceTypeInterface
     */
    public static function loadFromArray(array $jsonObject);
}
