<?php

namespace Scim\ResourceType;

use Assert\Assertion;

class GroupType extends ResourceType
{
    /**
     * GroupType constructor.
     *
     * @param string $location
     * @param array  $schemaExtensions
     */
    public function __construct($location, array $schemaExtensions = [])
    {
        Assertion::string($location);
        parent::__construct(
            'Group',
            '/Groups',
            'urn:ietf:params:scim:schemas:core:2.0:Group',
            ['location' => $location],
            'Group',
            'Group',
            $schemaExtensions
        );
    }
}
