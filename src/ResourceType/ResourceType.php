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

use Scim\Schema\Schema;

class ResourceType extends Schema implements ResourceTypeInterface
{
    /**
     * @var array
     */
    protected $meta = [];

    /**
     * Resource constructor.
     *
     * @param string                                       $id
     * @param string                                       $name
     * @param null|string                                  $description
     * @param \Scim\AttributeType\AttributeTypeInterface[] $attributes
     * @param array                                        $meta
     */
    public function __construct($id, $name, array $attributes, $description = null, array $meta = [])
    {
        parent::__construct($id, $name, $attributes, $description);
        $this->meta = $meta;
    }
}
