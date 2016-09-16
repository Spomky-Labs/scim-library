<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Scim\AttributeType;

use Scim\ScimObject\ScimObjectInterface;

interface AttributeTypeInterface extends ScimObjectInterface
{
    const MUTABILITY_READONLY = 'readOnly';
    const MUTABILITY_READWRITE = 'readWrite';
    const MUTABILITY_IMMUTABLE = 'immutable';
    const MUTABILITY_WRITEONLY = 'writeOnly';

    const RETURNED_ALWAYS = 'always';
    const RETURNED_NEVER = 'never';
    const RETURNED_DEFAULT = 'default';
    const RETURNED_REQUEST = 'request';

    const UNIQUENESS_NONE = 'none';
    const UNIQUENESS_SERVER = 'server';
    const UNIQUENESS_GLOBAL = 'global';

    const TYPE_STRING = 'string';
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_DECIMAL = 'decimal';
    const TYPE_INTEGER = 'integer';
    const TYPE_DATETIME = 'dateTime';
    const TYPE_BINARY = 'binary';
    const TYPE_REFERENCE = 'reference';
    const TYPE_COMPLEX = 'complex';

    /**
     * AttributeTypeInterface constructor.
     *
     * @param array $data
     */
    public function __construct(array $data);


    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getType();

    /**
     * @return null|string
     */
    public function getDescription();

    /**
     * @return boolean
     */
    public function isMultiValued();

    /**
     * @return boolean
     */
    public function isRequired();

    /**
     * @return string
     */
    public function getMutability();

    /**
     * @return string
     */
    public function getReturned();

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public function isValueValid($value);
}
