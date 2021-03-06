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

interface AttributeTypeManagerInterface
{
    /**
     * @param string $type
     * @param string $class
     */
    public function addAttributeTypeType($type, $class);

    /**
     * @return string[]
     */
    public function getSupportedAttributeTypeTypes();

    /**
     * @param string $data
     *
     * @throws \InvalidArgumentException
     *
     * @return \Scim\AttributeType\AttributeTypeInterface
     */
    public function createAttributeTypeFromJsonString($data);

    /**
     * @param array $data
     *
     * @throws \InvalidArgumentException
     *
     * @return \Scim\AttributeType\AttributeTypeInterface
     */
    public function createAttributeTypeFromData(array $data);
}
