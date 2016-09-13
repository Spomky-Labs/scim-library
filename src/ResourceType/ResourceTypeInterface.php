<?php

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
