<?php

namespace Scim\Schema;

use Scim\Attribute;

/**
 * This class provides the same schema as described in the RFC7643
 */
class SchemaDefinition extends Schema
{
    public function __construct()
    {
        parent::__construct(
            'urn:ietf:params:scim:schemas:core:2.0:Schema',
            'Schema',
            'Specifies the schema that describes a SCIM schema'
        );

        $this->addAttribute($this->getIdAttribute());
        $this->addAttribute($this->getNameAttribute());
        $this->addAttribute($this->getDescriptionAttribute());
        $this->addAttribute($this->getAttributesAttribute());
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getIdAttribute()
    {
        return new Attribute\StringAttribute([
            "name"           => "id",
            "description"    => "The unique URI of the schema. When applicable, service providers MUST specify the URI.",
            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
            "required"       => true,
        ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getNameAttribute()
    {
        return new Attribute\StringAttribute([
            "name"           => "name",
            "description"    => "The schema's human-readable name. When applicable, service providers MUST specify the name, e.g., 'User'.",
            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
            "required"       => true,
        ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getDescriptionAttribute()
    {
        return new Attribute\StringAttribute([
            "name"           => "description",
            "description"    => "The schema's human-readable name. When applicable, service providers MUST specify the name, e.g., 'User'.",
            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
        ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getAttributesAttribute()
    {
        return new Attribute\ComplexAttribute([
            "name"           => "attributes",
            "description"    => "A complex attribute that includes the attributes of a schema.",
            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
            "multiValued"    => true,
            "required"       => true,
            "subAttributes"  => [
                new Attribute\StringAttribute([
                    "name"           => "name",
                    "description"    => "The attribute's name.",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    "required"       => true,
                    "caseExact"      => true,
                ]),
                new Attribute\StringAttribute([
                    "name"           => "type",
                    "description"    => "The attribute's data type. Valid values include 'string', 'complex', 'boolean', 'decimal', 'integer', 'dateTime', 'reference'.",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    "required"       => true,
                    "canonicalValues" => [
                        "string",
                        "complex",
                        "boolean",
                        "decimal",
                        "integer",
                        "dateTime",
                        "reference",
                    ],
                ]),
                new Attribute\BooleanAttribute([
                    "name"           => "multiValued",
                    "description"    => "A Boolean value indicating an attribute's plurality.",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    "required"       => true,
                ]),
                new Attribute\StringAttribute([
                    "name"           => "description",
                    "description"    => "A human-readable description of the attribute.",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    "caseExact"      => true,
                ]),
                new Attribute\BooleanAttribute([
                    "name"           => "required",
                    "description"    => "A boolean value indicating whether or not the attribute is required.",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                ]),
                new Attribute\StringAttribute([
                    "name"           => "canonicalValues",
                    "description"    => "A collection of canonical values. When applicable, service providers MUST specify the canonical types, e.g., 'work', 'home'.",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    "multiValued"    => true,
                    "caseExact"      => true,
                ]),
                new Attribute\BooleanAttribute([
                    "name"           => "caseExact",
                    "description"    => "A Boolean value indicating whether or not a string attribute is case sensitive.",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                ]),
                new Attribute\StringAttribute([
                    "name"           => "mutability",
                    "description"    => "Indicates whether or not an attribute is modifiable.",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    "caseExact"      => true,
                    "canonicalValues"=> [
                        "readOnly",
                        "readWrite",
                        "immutable",
                        "writeOnly",
                    ],
                ]),
                new Attribute\StringAttribute([
                    "name"           => "returned",
                    "description"    => "Indicates when an attribute is returned in a response (e.g., to a query).",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    "caseExact"      => true,
                    "canonicalValues"=> [
                        "always",
                        "never",
                        "default",
                        "request",
                    ],
                ]),
                new Attribute\StringAttribute([
                    "name"           => "uniqueness",
                    "description"    => "Indicates how unique a value must be.",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    "caseExact"      => true,
                    "canonicalValues"=> [
                        "none",
                        "server",
                        "global",
                    ],
                ]),
                new Attribute\StringAttribute([
                    "name"           => "referenceTypes",
                    "description"    => "Used only with an attribute of type 'reference'. Specifies a SCIM resourceType that a reference attribute MAY refer to, e.g., 'User'.",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    "multiValued"    => true,
                    "caseExact"      => true,
                ]),
                new Attribute\ComplexAttribute([
                    "name"           => "subAttributes",
                    "description"    => "Used to define the sub-attributes of a complex attribute.",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    "multiValued"    => true,
                    "subAttributes" => [
                        new Attribute\StringAttribute([
                            "name"           => "name",
                            "description"    => "The attribute's name.",
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                            "required"       => true,
                            "caseExact"      => true,
                        ]),
                        new Attribute\StringAttribute([
                            "name"           => "type",
                            "description"    => "The attribute's data type. Valid values include 'string', 'complex', 'boolean', 'decimal', 'integer', 'dateTime', 'reference'.",
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                            "required"       => true,
                            "canonicalValues"=> [
                                "string",
                                "complex",
                                "boolean",
                                "decimal",
                                "integer",
                                "dateTime",
                                "reference",
                            ],
                        ]),
                        new Attribute\BooleanAttribute([
                            "name"           => "multiValued",
                            "description"    => "A Boolean value indicating an attribute's plurality.",
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                            "required"       => true,
                        ]),
                        new Attribute\StringAttribute([
                            "name"           => "description",
                            "description"    => "A human-readable description of the attribute.",
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                            "caseExact"      => true,
                        ]),
                        new Attribute\BooleanAttribute([
                            "name"           => "required",
                            "description"    => "A boolean value indicating whether or not the attribute is required.",
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                        ]),
                        new Attribute\StringAttribute([
                            "name"           => "canonicalValues",
                            "description"    => "A collection of canonical values. When applicable, service providers MUST specify the canonical types, e.g., 'work', 'home'.",
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                            "multiValued"    => true,
                            "caseExact"      => true,
                        ]),
                        new Attribute\BooleanAttribute([
                            "name"           => "caseExact",
                            "description"    => "A Boolean value indicating whether or not a string attribute is case sensitive.",
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                        ]),
                        new Attribute\StringAttribute([
                            "name"           => "mutability",
                            "description"    => "Indicates whether or not an attribute is modifiable.",
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                            "caseExact"      => true,
                            "canonicalValues"=> [
                                "readOnly",
                                "readWrite",
                                "immutable",
                                "writeOnly",
                            ]
                        ]),
                        new Attribute\StringAttribute([
                            "name"           => "returned",
                            "description"    => "Indicates when an attribute is returned in a response (e.g., to a query).",
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                            "caseExact"      => true,
                            "canonicalValues"=> [
                                "always",
                                "never",
                                "default",
                                "request",
                            ]
                        ]),
                        new Attribute\StringAttribute([
                            "name"           => "uniqueness",
                            "description"    => "Indicates how unique a value must be.",
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                            "caseExact"      => true,
                            "canonicalValues"=> [
                                "none",
                                "server",
                                "global",
                            ]
                        ]),
                        new Attribute\StringAttribute([
                            "name"           => "referenceTypes",
                            "description"    => "Used only with an attribute of type 'reference'. Specifies a SCIM resourceType that a reference attribute MAY refer to, e.g., 'User'.",
                            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                            "caseExact"      => true,
                        ]),
                    ],
                ]),
            ]
        ]);
    }
}
