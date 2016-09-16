<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Scim\Test;

/**
 * @group Group
 */
class GroupResourceTest extends ScimObjectTest
{
    /**
     * @dataProvider dataGroupCreation
     *
     * @param string $group_data
     */
    public function testGroupCreation($group_data)
    {
    }

    /**
     * @return array
     */
    public function dataGroupCreation()
    {
        return [
            ['{"schemas":["urn:ietf:params:scim:schemas:core:2.0:Group"],"id":"e9e30dba-f08f-4109-8486-d5c6a331660a","displayName":"Tour Guides","members":[{"value":"2819c223-7f76-453a-919d-413861904646","$ref":"https://example.com/v2/Groups/2819c223-7f76-453a-919d-413861904646","display":"Babs Jensen"},{"value":"902c246b-6245-4190-8e05-00816be7344a","$ref":"https://example.com/v2/Groups/902c246b-6245-4190-8e05-00816be7344a","display":"Mandy Pepperidge"}],"meta":{"resourceType":"Group","created":"2010-01-23T04:56:22Z","lastModified":"2011-05-13T04:42:34Z","version":"W\/\"3694e05e9dff592\"","location":"https://example.com/v2/Groups/e9e30dba-f08f-4109-8486-d5c6a331660a"}}'],
        ];
    }
}
