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

use Scim\Resource\ResourceInterface;

class SchemaManager implements SchemaManagerInterface
{
    /**
     * @var \Scim\Schema\SchemaInterface[]
     */
    private $schemas = [];

    /**
     * {@inheritdoc}
     */
    public function addSchema(SchemaInterface $schema)
    {
        $this->schemas[] = $schema;
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
    public function isResourceValid(ResourceInterface $resource)
    {

    }
}
