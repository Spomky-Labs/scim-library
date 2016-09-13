<?php

namespace Scim\Test;

use Scim\Attribute\AttributeInterface;
use Scim\Attribute;

class AttributeTest extends ScimObjectTest
{
    /**
     * @dataProvider dataAttributeCreation
     *
     * @param \Scim\Attribute\AttributeInterface $attribute
     * @param string                             $expected_json
     */
    public function testAttributeCreation(AttributeInterface $attribute, $expected_json)
    {
        $expected = json_decode($expected_json, true);
        $attribute = json_decode(json_encode($attribute), true);

        $this->checkJsonObjects($attribute, $expected);
    }

    /**
     * @return array
     */
    public function dataAttributeCreation()
    {
        return [
            [
                new Attribute\StringAttribute([
                    'name' => 'id',
                    'description' => 'The unique URI of the schema. When applicable, service providers MUST specify the URI.',
                    'required' => true,
                    'mutability' => AttributeInterface::MUTABILITY_READONLY,
                ]),
                '{"name":"id","type":"string","multiValued":false,"description":"The unique URI of the schema. When applicable, service providers MUST specify the URI.","required":true,"caseExact":false,"mutability":"readOnly","returned":"default","uniqueness":"none"}',
            ],
            [
                new Attribute\StringAttribute([
                    'name' => 'name',
                    'description' => 'The schema\'s human-readable name. When applicable, service providers MUST specify the name, e.g., \'User\'.',
                    'required' => true,
                    'mutability' => AttributeInterface::MUTABILITY_READONLY,
                ]),
                '{"name":"name","type":"string","multiValued":false,"description":"The schema\'s human-readable name. When applicable, service providers MUST specify the name, e.g., \'User\'.","required":true,"caseExact":false,"mutability":"readOnly","returned":"default","uniqueness":"none"}',
            ],
            [
                new Attribute\StringAttribute([
                    'name' => 'description',
                    'description' => 'The schema\'s human-readable name. When applicable, service providers MUST specify the name, e.g., \'User\'.',
                    'mutability' => AttributeInterface::MUTABILITY_READONLY,
                ]),
                '{"name":"description","type":"string","multiValued":false,"description":"The schema\'s human-readable name. When applicable, service providers MUST specify the name, e.g., \'User\'.","required":false,"caseExact":false,"mutability":"readOnly","returned":"default","uniqueness":"none"}',
            ],
            [
                new Attribute\ComplexAttribute([
                    "name"           => "patch",
                    "description"    => "A complex type that specifies PATCH configuration options.",
                    "required"       => true,
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    'subAttributes'     => [
                        new Attribute\BooleanAttribute([
                            'name' => 'supported',
                            "description"    => "A Boolean value specifying whether or not the operation is supported.",
                            "required"       => true,
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                        ]),
                    ]
                ]),
                '{"name":"patch","type":"complex","multiValued":false,"description":"A complex type that specifies PATCH configuration options.","required":true,"returned":"default","mutability":"readOnly","subAttributes":[{"name":"supported","type":"boolean","multiValued":false,"description":"A Boolean value specifying whether or not the operation is supported.","required":true,"mutability":"readOnly","returned":"default"}]}',
            ],
            [
                new Attribute\ComplexAttribute([
                    "name"           => "bulk",
                    "description"    => "A complex type that specifies bulk configuration options.",
                    "required"       => true,
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    'subAttributes'  => [
                        new Attribute\BooleanAttribute([
                            'name' => 'supported',
                            "description"    => "A Boolean value specifying whether or not the operation is supported.",
                            "required"       => true,
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                        ]),
                        new Attribute\IntegerAttribute([
                            'name'           => 'maxOperations',
                            "description"    => "An integer value specifying the maximum number of operations.",
                            "required"       => true,
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                        ]),
                        new Attribute\IntegerAttribute([
                            'name'           => 'maxPayloadSize',
                            "description"    => "An integer value specifying the maximum payload size in bytes.",
                            "required"       => true,
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                        ]),
                    ]
                ]),
                '{"name":"bulk","type":"complex","multiValued":false,"description":"A complex type that specifies bulk configuration options.","required":true,"returned":"default","mutability":"readOnly","subAttributes":[{"name":"supported","type":"boolean","multiValued":false,"description":"A Boolean value specifying whether or not the operation is supported.","required":true,"mutability":"readOnly","returned":"default"},{"name":"maxOperations","type":"integer","multiValued":false,"description":"An integer value specifying the maximum number of operations.","required":true,"mutability":"readOnly","returned":"default","uniqueness":"none"},{"name":"maxPayloadSize","type":"integer","multiValued":false,"description":"An integer value specifying the maximum payload size in bytes.","required":true,"mutability":"readOnly","returned":"default","uniqueness":"none"}]}',
            ],
        ];
    }
}
