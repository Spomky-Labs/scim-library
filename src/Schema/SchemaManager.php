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

use Assert\Assertion;
use Scim\AttributeType\AttributeTypeManagerInterface;

class SchemaManager implements SchemaManagerInterface
{
    /**
     * @var \Scim\Schema\SchemaInterface[]
     */
    private $schemas = [];

    /**
     * @var \Scim\AttributeType\AttributeTypeManagerInterface
     */
    private $attributeTypeManager;

    /**
     * SchemaManager constructor.
     *
     * @param \Scim\AttributeType\AttributeTypeManagerInterface $attributeTypeManager
     */
    public function __construct(AttributeTypeManagerInterface $attributeTypeManager)
    {
        $this->attributeTypeManager = $attributeTypeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function addSchema(SchemaInterface $schema)
    {
        $this->schemas[$schema->getId()] = $schema;
    }

    /**
     * {@inheritdoc}
     */
    public function getSchemas()
    {
        return $this->schemas;
    }

    /**
     * {@inheritdoc}
     */
    public function loadSchemaFromString($input)
    {
        Assertion::string($input);
        $json = json_decode($input, true);
        Assertion::isArray($json);
        Assertion::keyExists($json, 'id');
        Assertion::keyExists($json, 'name');
        Assertion::keyExists($json, 'attributes');
        Assertion::isArray($json['attributes']);
        Assertion::notEmpty($json['attributes']);

        $attributes = [];
        foreach ($json['attributes'] as $attribute) {
            $attributes[] = $this->attributeTypeManager->createAttributeTypeFromData($attribute);
        }
        $schema = new Schema(
            $json['id'],
            $json['name'],
            $attributes,
            array_key_exists('description', $json) ? $json['description'] : null
        );

        return $schema;
    }
}
