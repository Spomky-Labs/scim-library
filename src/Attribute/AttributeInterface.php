<?php

namespace Scim\Attribute;

interface AttributeInterface extends \JsonSerializable
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
     * @param string $key
     *
     * @return bool
     */
    public function has($key);

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get($key);
}
