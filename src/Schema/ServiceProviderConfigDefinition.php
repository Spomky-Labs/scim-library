<?php

namespace Scim\Schema;

use Scim\Attribute;

/**
 * This class provides the same schema as described in the RFC7643
 */
class ServiceProviderConfigDefinition extends Schema
{
    public function __construct()
    {
        parent::__construct(
            'urn:ietf:params:scim:schemas:core:2.0:ServiceProviderConfig',
            'Service Provider Configuration',
            'Schema for representing the service provider\'s configuration'
        );

        $this->addAttribute($this->getDocumentationUriAttribute());
        $this->addAttribute($this->getPatchAttribute());
        $this->addAttribute($this->getBulkAttribute());
        $this->addAttribute($this->getFilterAttribute());
        $this->addAttribute($this->getChangePasswordAttribute());
        $this->addAttribute($this->getSortAttribute());
        $this->addAttribute($this->getAuthenticationSchemesAttribute());
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getDocumentationUriAttribute()
    {
        return new Attribute\ReferenceAttribute([
            'referenceTypes' => ['external'],
            "name"           => "documentationUri",
            "description"    => "An HTTP-addressable URL pointing to the service provider's human-consumable help documentation.",
            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
        ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getPatchAttribute()
    {
        return new Attribute\ComplexAttribute([
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
        ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getBulkAttribute()
    {
        return new Attribute\ComplexAttribute([
        "name"           => "bulk",
        "description"    => "A complex type that specifies bulk configuration options.",
        "required"       => true,
        "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
        'subAttributes'     => [
            new Attribute\BooleanAttribute([
                'name' => 'supported',
                "description"    => "A Boolean value specifying whether or not the operation is supported.",
                "required"       => true,
                "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
            ]),
            new Attribute\IntegerAttribute([
                'name' => 'maxOperations',
                "description"    => "An integer value specifying the maximum number of operations.",
                "required"       => true,
                "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
            ]),
            new Attribute\IntegerAttribute([
                'name' => 'maxPayloadSize',
                "description"    => "An integer value specifying the maximum payload size in bytes.",
                "required"       => true,
                "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
            ]),
        ]
    ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getFilterAttribute()
    {
        return new Attribute\ComplexAttribute([
            "name"           => "filter",
            "description"    => "A complex type that specifies FILTER options.",
            "required"       => true,
            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
            'subAttributes'     => [
                new Attribute\BooleanAttribute([
                    'name' => 'supported',
                    "description"    => "A Boolean value specifying whether or not the operation is supported.",
                    "required"       => true,
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                ]),
                new Attribute\IntegerAttribute([
                    'name' => 'maxResults',
                    "description"    => "An integer value specifying the maximum number of resources returned in a response.",
                    "required"       => true,
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                ]),
            ]
        ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getChangePasswordAttribute()
    {
        return new Attribute\ComplexAttribute([
            "name"           => "changePassword",
            "description"    => "A complex type that specifies configuration options related to changing a password.",
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
        ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getSortAttribute()
    {
        return new Attribute\ComplexAttribute([
            "name"           => "sort",
            "description"    => "A complex type that specifies sort result options.",
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
        ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getAuthenticationSchemesAttribute()
    {
        return new Attribute\ComplexAttribute([
            "name"           => "authenticationSchemes",
            "description"    => "A complex type that specifies supported authentication scheme properties.",
            "multiValued"    => true,
            "required"       => true,
            "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
            'subAttributes'     => [
                new Attribute\StringAttribute([
                    'name' => 'name',
                    "description"    => "The common authentication scheme name, e.g., HTTP Basic.",
                    "required"       => true,
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                ]),
                new Attribute\StringAttribute([
                    'name' => 'description',
                    "description"    => "A description of the authentication scheme.",
                    "required"       => true,
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                ]),
                new Attribute\ReferenceAttribute([
                    'name' => 'specUri',
                    "referenceTypes" => ['external'],
                    "description"    => "An HTTP-addressable URL pointing to the authentication scheme's specification.",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                ]),
                new Attribute\ReferenceAttribute([
                    'name' => 'documentationUri',
                    "referenceTypes" => ['external'],
                    "description"    => "An HTTP-addressable URL pointing to the authentication scheme's usage documentation.",
                    "mutability"     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                ]),
            ]
        ]);
    }
}
