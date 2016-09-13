<?php

namespace Scim\Test;

use Scim\ResourceType;
use Scim\ResourceType\ResourceTypeInterface;

class ResourceTypeTest extends ScimObjectTest
{
    /**
     * @dataProvider dataResourceTypeCreation
     *
     * @param \Scim\ResourceType\ResourceTypeInterface $resource
     * @param string                                   $expected_json
     */
    public function testResourceTypeCreation(ResourceTypeInterface $resource, $expected_json)
    {
        $expected = json_decode($expected_json, true);
        $attribute = json_decode(json_encode($resource), true);
        $this->checkJsonObjects($attribute, $expected);
    }

    /**
     * @return array
     */
    public function dataResourceTypeCreation()
    {
        return [
            [
                new ResourceType\UserType(
                    'https://example.com/v2/ResourceTypes/User',
                    [
                        ['schema' => 'urn:ietf:params:scim:schemas:extension:enterprise:2.0:User', 'required' => true],
                    ]
                ),
                '{"schemas":["urn:ietf:params:scim:schemas:core:2.0:ResourceType"],"id":"User","name":"User","endpoint":"\/Users","description":"User Account","schema":"urn:ietf:params:scim:schemas:core:2.0:User","schemaExtensions":[{"schema":"urn:ietf:params:scim:schemas:extension:enterprise:2.0:User","required":true}],"meta":{"location":"https:\/\/example.com\/v2\/ResourceTypes\/User","resourceType":"ResourceType"}}',
            ],
            [
                new ResourceType\GroupType('https://example.com/v2/ResourceTypes/Group'),
                '{"schemas":["urn:ietf:params:scim:schemas:core:2.0:ResourceType"],"id":"Group","name":"Group","endpoint":"\/Groups","description":"Group","schema":"urn:ietf:params:scim:schemas:core:2.0:Group","meta":{"location":"https:\/\/example.com\/v2\/ResourceTypes\/Group","resourceType":"ResourceType"}}',
            ],
        ];
    }
}
