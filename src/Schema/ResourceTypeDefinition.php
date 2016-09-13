<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Scim\Schema;

use Scim\Attribute;

/**
 * This class provides the same schema as described in the RFC7643.
 */
class ResourceTypeDefinition extends Schema
{
    public function __construct()
    {
        parent::__construct(
            'urn:ietf:params:scim:schemas:core:2.0:ResourceType',
            'ResourceType',
            'Specifies the schema that describes a SCIM resource type'
        );

        $this->addAttribute($this->getIdAttribute());
        $this->addAttribute($this->getNameAttribute());
        $this->addAttribute($this->getDescriptionAttribute());
        $this->addAttribute($this->getEndpointAttribute());
        $this->addAttribute($this->getSchemaAttribute());
        $this->addAttribute($this->getSchemaExtensionsAttribute());
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getIdAttribute()
    {
        return new Attribute\StringAttribute([
            'name'           => 'id',
            'description'    => "The resource type's server unique id. May be the same as the 'name' attribute.",
            'mutability'     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
        ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getNameAttribute()
    {
        return new Attribute\StringAttribute([
            'name'           => 'name',
            'description'    => "The resource type name. When applicable, service providers MUST specify the name, e.g., 'User'.",
            'mutability'     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
            'required'       => true,
        ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getDescriptionAttribute()
    {
        return new Attribute\StringAttribute([
            'name'           => 'description',
            'description'    => "The resource type's human-readable description. When applicable, service providers MUST specify the description.",
            'mutability'     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
        ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getEndpointAttribute()
    {
        return new Attribute\ReferenceAttribute([
            'name'           => 'endpoint',
            'description'    => "The resource type's HTTP-addressable endpoint relative to the Base URL, e.g., '/Users'.",
            'mutability'     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
            'referenceTypes' => ['uri'],
            'required'       => true,
        ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getSchemaAttribute()
    {
        return new Attribute\ReferenceAttribute([
            'name'           => 'schema',
            'description'    => "The resource type's primary/base schema URI.",
            'mutability'     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
            'referenceTypes' => ['uri'],
            'required'       => true,
            'caseExact'      => true,
        ]);
    }

    /**
     * @return \Scim\Attribute\AttributeInterface
     */
    private function getSchemaExtensionsAttribute()
    {
        return new Attribute\ComplexAttribute([
            'name'           => 'schemaExtensions',
            'description'    => "A list of URIs of the resource type's schema extensions.",
            'mutability'     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
            'required'       => true,
            'subAttributes'  => [
                new Attribute\ReferenceAttribute([
                    'name'           => 'schema',
                    'description'    => 'The URI of a schema extension.',
                    'mutability'     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    'referenceTypes' => ['uri'],
                    'required'       => true,
                    'caseExact'      => true,
                ]),
                new Attribute\BooleanAttribute([
                    'name'           => 'required',
                    'description'    => 'A Boolean value that specifies whether or not the schema extension is required for the resource type. If true, a resource of this type MUST include this schema extension and also include any attributes declared as required in this schema extension. If false, a resource of this type MAY omit this schema extension.',
                    'mutability'     => Attribute\ReferenceAttribute::MUTABILITY_READONLY,
                    'required'       => true,
                ]),
            ],
        ]);
    }
}
