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

interface ResourceTypeManagerInterface
{
    /**
     * @param \Scim\ResourceType\ResourceTypeInterface $resource_type
     */
    public function addResourceType(ResourceTypeInterface $resource_type);

    /**
     * @return \Scim\ResourceType\ResourceTypeInterface[]
     */
    public function getResourceTypes();

    /**
     * @param string $input
     *
     * @throws \InvalidArgumentException
     *
     * @return \Scim\ResourceType\ResourceTypeInterface
     */
    public function loadResourceTypeFromString($input);
}
