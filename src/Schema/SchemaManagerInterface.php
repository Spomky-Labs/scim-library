<?php

namespace Scim\Schema;

use Scim\Resource\ResourceInterface;

interface SchemaManagerInterface
{
    /**
     * This method will verifies the resource is valid.
     * Internally the method will check all parameters against all schemas declared by the resource.
     *
     * @param \Scim\Resource\ResourceInterface $resource
     *
     * @return bool
     */
    public function isResourceValid(ResourceInterface $resource);
}
