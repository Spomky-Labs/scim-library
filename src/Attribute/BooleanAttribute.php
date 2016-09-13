<?php

namespace Scim\Attribute;

class BooleanAttribute extends Attribute
{
    /**
     * BooleanAttribute constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $data['type'] = self::TYPE_BOOLEAN;
        parent::__construct($data);
    }
}
