<?php
use Scim\AttributeType\AttributeTypeInterface;

describe('Attribute', function(){

    $attributeVectors = [
        '{"name":"id","type":"string","multiValued":false,"description":"The unique URI of the schema. When applicable, service providers MUST specify the URI.","required":true,"caseExact":false,"mutability":"readOnly","returned":"default","uniqueness":"none"}',
        '{"name":"name","type":"string","multiValued":false,"description":"The schema\'s human-readable name. When applicable, service providers MUST specify the name, e.g., \'User\'.","required":true,"caseExact":false,"mutability":"readOnly","returned":"default","uniqueness":"none"}',
        '{"name":"description","type":"string","multiValued":false,"description":"The schema\'s human-readable name. When applicable, service providers MUST specify the name, e.g., \'User\'.","required":false,"caseExact":false,"mutability":"readOnly","returned":"default","uniqueness":"none"}',
        '{"name":"patch","type":"complex","multiValued":false,"description":"A complex type that specifies PATCH configuration options.","required":true,"returned":"default","mutability":"readOnly","subAttributes":[{"name":"supported","type":"boolean","multiValued":false,"description":"A Boolean value specifying whether or not the operation is supported.","required":true,"mutability":"readOnly","returned":"default"}]}',
        '{"name":"bulk","type":"complex","multiValued":false,"description":"A complex type that specifies bulk configuration options.","required":true,"returned":"default","mutability":"readOnly","subAttributes":[{"name":"supported","type":"boolean","multiValued":false,"description":"A Boolean value specifying whether or not the operation is supported.","required":true,"mutability":"readOnly","returned":"default"},{"name":"maxOperations","type":"integer","multiValued":false,"description":"An integer value specifying the maximum number of operations.","required":true,"mutability":"readOnly","returned":"default","uniqueness":"none"},{"name":"maxPayloadSize","type":"integer","multiValued":false,"description":"An integer value specifying the maximum payload size in bytes.","required":true,"mutability":"readOnly","returned":"default","uniqueness":"none"}]}',
    ];
    $manager = new \Scim\AttributeType\AttributeTypeManager();
    it('should load an attribute using a JSON string', function() use ($manager, $attributeVectors) {

        foreach ($attributeVectors as $attributeVector) {
            expect($manager->createAttributeTypeFromJsonString($attributeVector))->toBeAnInstanceOf(AttributeTypeInterface::class);
        }
    });
});
