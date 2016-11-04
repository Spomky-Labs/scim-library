<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Scim\ResourceObject;

use Assert\Assertion;
use Scim\Attribute\Attribute;
use Scim\ResourceType\ResourceTypeManagerInterface;
use Scim\Schema\SchemaManagerInterface;

class ResourceObjectManager
{
    /**
     * @var \Scim\Schema\SchemaManagerInterface
     */
    private $schemaManager;

    /**
     * @var \Scim\ResourceType\ResourceTypeManagerInterface
     */
    private $resourceTypeManager;

    /**
     * ResourceObjectManager constructor.
     *
     * @param \Scim\Schema\SchemaManagerInterface             $schemaManager
     * @param \Scim\ResourceType\ResourceTypeManagerInterface $resourceTypeManager
     */
    public function __construct(SchemaManagerInterface $schemaManager, ResourceTypeManagerInterface $resourceTypeManager)
    {
        $this->schemaManager = $schemaManager;
        $this->resourceTypeManager = $resourceTypeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function loadResource($resource)
    {
        $data = json_decode($resource, true);
        Assertion::isArray($data);
        Assertion::keyExists($data, 'schemas');
        Assertion::isArray($data['schemas']);
        Assertion::allString($data['schemas']);

        $diff = array_diff($data['schemas'], array_keys($this->resourceTypeManager->getResourceTypes()));
        Assertion::eq($diff, [], sprintf('The resource uses at least one schema that is not supported: %ss', json_encode(array_values($diff))));

        $schemas = [];
        foreach ($data['schemas'] as $schema) {
            $schemas[] = $this->resourceTypeManager->getResourceType($schema);
        }
        $schemas = array_merge(
            $schemas,
            $this->schemaManager->getSchemas()
        );
    }

    /**
     * @param \Scim\ResourceType\ResourceTypeInterface[] $schemas
     * @param array                                      $data
     *
     * @return \Scim\Attribute\AttributeInterface[]
     */
    private function createAttribute(array $schemas, array $data)
    {
        $result = [];
        foreach ($data as $k => $v) {
            foreach ($schemas as $schema) {
                if ($schema->hasAttributeType($k)) {
                    $result[$k] = new Attribute($v, $schema->getAttributeType($k));
                    break;
                }
            }
            //throw new \InvalidArgumentException(sprintf('Unsupported attribute "%s".', $k));
        }

        return $result;
    }
}
