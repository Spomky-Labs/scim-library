<?php

namespace Scim\Attribute;

class DateTimeAttribute extends Attribute
{
    /**
     * DateTimeAttribute constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $data['type'] = self::TYPE_DATETIME;
        parent::__construct($data);
    }
}
