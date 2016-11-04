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

use Scim\AttributeType;
use Scim\AttributeType\AttributeTypeInterface;

/**
 * @group AttributeType
 */
class AttributeTypeTest extends ScimObjectTest
{
    /**
     * @dataProvider dataAttributeTypeCreation
     *
     * @param \Scim\AttributeType\AttributeTypeInterface $attribute
     * @param string                                     $expected_json
     */
    public function testAttributeTypeCreation(AttributeTypeInterface $attribute, $expected_json)
    {
        $expected = json_decode($expected_json, true);
        $attribute = json_decode(json_encode($attribute), true);

        $this->checkJsonObjects($attribute, $expected);

        $manager = new AttributeType\AttributeTypeManager();
        $created_attribute = $manager->createAttributeTypeFromData($attribute);
        $created_attribute = json_decode(json_encode($created_attribute), true);
        $this->checkJsonObjects($created_attribute, $expected);
    }

    /**
     * @return array
     */
    public function dataAttributeTypeCreation()
    {
        return [
            [
                new AttributeType\StringAttributeType([
                    'name'        => 'id',
                    'description' => 'The unique URI of the schema. When applicable, service providers MUST specify the URI.',
                    'required'    => true,
                    'mutability'  => AttributeTypeInterface::MUTABILITY_READONLY,
                ]),
                '{"name":"id","type":"string","multiValued":false,"description":"The unique URI of the schema. When applicable, service providers MUST specify the URI.","required":true,"caseExact":false,"mutability":"readOnly","returned":"default","uniqueness":"none"}',
            ],
            [
                new AttributeType\StringAttributeType([
                    'name'        => 'name',
                    'description' => 'The schema\'s human-readable name. When applicable, service providers MUST specify the name, e.g., \'User\'.',
                    'required'    => true,
                    'mutability'  => AttributeTypeInterface::MUTABILITY_READONLY,
                ]),
                '{"name":"name","type":"string","multiValued":false,"description":"The schema\'s human-readable name. When applicable, service providers MUST specify the name, e.g., \'User\'.","required":true,"caseExact":false,"mutability":"readOnly","returned":"default","uniqueness":"none"}',
            ],
            [
                new AttributeType\StringAttributeType([
                    'name'        => 'description',
                    'description' => 'The schema\'s human-readable name. When applicable, service providers MUST specify the name, e.g., \'User\'.',
                    'mutability'  => AttributeTypeInterface::MUTABILITY_READONLY,
                ]),
                '{"name":"description","type":"string","multiValued":false,"description":"The schema\'s human-readable name. When applicable, service providers MUST specify the name, e.g., \'User\'.","required":false,"caseExact":false,"mutability":"readOnly","returned":"default","uniqueness":"none"}',
            ],
            [
                new AttributeType\ComplexAttributeType([
                    'name'              => 'patch',
                    'description'       => 'A complex type that specifies PATCH configuration options.',
                    'required'          => true,
                    'mutability'        => AttributeType\ReferenceAttributeType::MUTABILITY_READONLY,
                    'subAttributes'     => [
                        new AttributeType\BooleanAttributeType([
                            'name'           => 'supported',
                            'description'    => 'A Boolean value specifying whether or not the operation is supported.',
                            'required'       => true,
                            'mutability'     => AttributeType\ReferenceAttributeType::MUTABILITY_READONLY,
                        ]),
                    ],
                ]),
                '{"name":"patch","type":"complex","multiValued":false,"description":"A complex type that specifies PATCH configuration options.","required":true,"returned":"default","mutability":"readOnly","subAttributes":[{"name":"supported","type":"boolean","multiValued":false,"description":"A Boolean value specifying whether or not the operation is supported.","required":true,"mutability":"readOnly","returned":"default"}]}',
            ],
            [
                new AttributeType\ComplexAttributeType([
                    'name'           => 'bulk',
                    'description'    => 'A complex type that specifies bulk configuration options.',
                    'required'       => true,
                    'mutability'     => AttributeType\ReferenceAttributeType::MUTABILITY_READONLY,
                    'subAttributes'  => [
                        new AttributeType\BooleanAttributeType([
                            'name'           => 'supported',
                            'description'    => 'A Boolean value specifying whether or not the operation is supported.',
                            'required'       => true,
                            'mutability'     => AttributeType\ReferenceAttributeType::MUTABILITY_READONLY,
                        ]),
                        new AttributeType\IntegerAttributeType([
                            'name'           => 'maxOperations',
                            'description'    => 'An integer value specifying the maximum number of operations.',
                            'required'       => true,
                            'mutability'     => AttributeType\ReferenceAttributeType::MUTABILITY_READONLY,
                        ]),
                        new AttributeType\IntegerAttributeType([
                            'name'           => 'maxPayloadSize',
                            'description'    => 'An integer value specifying the maximum payload size in bytes.',
                            'required'       => true,
                            'mutability'     => AttributeType\ReferenceAttributeType::MUTABILITY_READONLY,
                        ]),
                    ],
                ]),
                '{"name":"bulk","type":"complex","multiValued":false,"description":"A complex type that specifies bulk configuration options.","required":true,"returned":"default","mutability":"readOnly","subAttributes":[{"name":"supported","type":"boolean","multiValued":false,"description":"A Boolean value specifying whether or not the operation is supported.","required":true,"mutability":"readOnly","returned":"default"},{"name":"maxOperations","type":"integer","multiValued":false,"description":"An integer value specifying the maximum number of operations.","required":true,"mutability":"readOnly","returned":"default","uniqueness":"none"},{"name":"maxPayloadSize","type":"integer","multiValued":false,"description":"An integer value specifying the maximum payload size in bytes.","required":true,"mutability":"readOnly","returned":"default","uniqueness":"none"}]}',
            ],
        ];
    }
}
