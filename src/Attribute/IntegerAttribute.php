<?php

namespace Scim\Attribute;

class IntegerAttribute extends Attribute
{
    /**
     * @var string
     */
    protected $uniqueness = self::UNIQUENESS_NONE;

    /**
     * IntegerAttribute constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $data['type'] = self::TYPE_INTEGER;
        parent::__construct($data);
    }
}
