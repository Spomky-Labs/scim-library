<?php

namespace Scim\ResourceType;

use Assert\Assertion;

class UserType extends ResourceType
{
    /**
     * UserType constructor.
     *
     * @param string $location
     * @param array  $schemaExtensions
     */
    public function __construct($location, array $schemaExtensions = [])
    {
        Assertion::string($location);
        parent::__construct(
            'User',
            '/Users',
            'urn:ietf:params:scim:schemas:core:2.0:User',
            ['location' => $location],
            'User',
            'User Account',
            $schemaExtensions
        );
    }
}
