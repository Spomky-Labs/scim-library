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

interface SchemaManagerInterface
{
    /**
     * @param \Scim\Schema\SchemaInterface $schema
     */
    public function addSchema(SchemaInterface $schema);

    /**
     * @return \Scim\Schema\SchemaInterface[]
     */
    public function getSchemas();

    /**
     * @param string $input
     *
     * @throws \InvalidArgumentException
     *
     * @return \Scim\Schema\SchemaInterface
     */
    public function loadSchemaFromString($input);
}
