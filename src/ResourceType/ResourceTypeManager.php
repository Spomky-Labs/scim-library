<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Scim\ResourceType;

use Assert\Assertion;
use Scim\AttributeType\AttributeTypeManagerInterface;

class ResourceTypeManager implements ResourceTypeManagerInterface
{
    /**
     * @var \Scim\ResourceType\ResourceTypeInterface[]
     */
    private $resourceTypes = [];

    /**
     * @var \Scim\AttributeType\AttributeTypeManagerInterface
     */
    private $attributeTypeManager;

    /**
     * ResourceTypeManager constructor.
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
    public function addResourceType(ResourceTypeInterface $resource_type)
    {
        $this->resourceTypes[$resource_type->getId()] = $resource_type;
    }

    /**
     * {@inheritdoc}
     */
    public function getResourceTypes()
    {
        return $this->resourceTypes;
    }

    /**
     * {@inheritdoc}
     */
    public function hasResourceType($resourceType)
    {
        Assertion::string($resourceType);

        return array_key_exists($resourceType, $this->resourceTypes);
    }

    /**
     * {@inheritdoc}
     */
    public function getResourceType($resourceType)
    {
        Assertion::true($this->hasResourceType($resourceType));

        return $this->resourceTypes[$resourceType];
    }

    /**
     * {@inheritdoc}
     */
    public function loadResourceTypeFromString($input)
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

        $resource_type = new ResourceType(
            $json['id'],
            $json['name'],
            $attributes,
            array_key_exists('description', $json) ? $json['description'] : null,
            array_key_exists('meta', $json) ? $json['meta'] : null
        );

        return $resource_type;
    }
}
