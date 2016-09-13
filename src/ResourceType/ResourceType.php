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
use Scim\Resource\Resource;

class ResourceType extends Resource implements ResourceTypeInterface
{
    protected $endpoint;
    protected $schema;
    protected $schemaExtensions = [];

    /**
     * ResourceType constructor.
     *
     * @param string      $name
     * @param string      $endpoint
     * @param string      $schema
     * @param array       $metas
     * @param string|null $id
     * @param string|null $description
     * @param array       $schemaExtensions
     */
    public function __construct($name, $endpoint, $schema, array $metas, $id = null, $description = null, array $schemaExtensions = [])
    {
        $metas['resourceType'] = 'ResourceType';
        parent::__construct($name, $metas, ['urn:ietf:params:scim:schemas:core:2.0:ResourceType'], $description);
        $this->checkSchemaExtension($schemaExtensions);
        $this->endpoint = $endpoint;
        $this->schema = $schema;
        $this->id = $id;
        $this->schemaExtensions = array_values($schemaExtensions);
    }

    /**
     * As the ResourceType is a read only resource, the set method does nothing.
     *
     * {@inheritdoc}
     */
    public function set($key, $value)
    {
    }

    /**
     * {@inheritdoc}
     */
    public static function loadFromArray(array $jsonObject)
    {
        foreach (['name', 'endpoint', 'schema', 'metas'] as $key) {
            Assertion::keyExists($jsonObject, $key);
        }
        foreach (['description', 'id'] as $key) {
            if (array_key_exists($key, $jsonObject)) {
                $$key = $jsonObject[$key];
            } else {
                $$key = null;
            }
        }
        if (array_key_exists('schemaExtensions', $jsonObject)) {
            $schemaExtensions = $jsonObject['schemaExtensions'];
        } else {
            $schemaExtensions = [];
        }

        $resourceType = new self(
            $jsonObject['name'],
            $jsonObject['endpoint'],
            $jsonObject['schema'],
            $jsonObject['metas'],
            $id,
            $description,
            $schemaExtensions
        );

        return $resourceType;
    }

    private function checkSchemaExtension(array $schemaExtensions)
    {
        foreach ($schemaExtensions as $schemaExtension) {
            Assertion::keyExists($schemaExtension, 'schema');
            Assertion::string($schemaExtension['schema']);
            Assertion::keyExists($schemaExtension, 'required');
            Assertion::boolean($schemaExtension['required']);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        $vars = ['schemas', 'id', 'name', 'endpoint', 'description', 'schema', 'schemaExtensions', 'meta'];
        $results = [];
        foreach ($vars as $k) {
            $value = $this->$k;
            if (is_bool($value) || !empty($value)) {
                $results[$k] = $this->$k;
            }
        }

        return $results;
    }
}
