<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Scim\Schema;

use Scim\ScimObject\ScimObjectInterface;

interface SchemaInterface extends ScimObjectInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return null|string
     */
    public function getDescription();

    /**
     * @return \Scim\AttributeType\AttributeTypeInterface[]
     */
    public function getAttributeTypes();

    /**
     * @param string $attributeType
     *
     * @return bool
     */
    public function hasAttributeType($attributeType);

    /**
     * @param string $attributeType
     *
     * @return \Scim\AttributeType\AttributeTypeInterface
     */
    public function getAttributeType($attributeType);
}
