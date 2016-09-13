<?php

namespace Scim\Attribute;

class DecimalAttribute extends Attribute
{
    /**
     * @var string
     */
    protected $uniqueness = self::UNIQUENESS_NONE;

    /**
     * DecimalAttribute constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $data['type'] = self::TYPE_DECIMAL;
        parent::__construct($data);
    }
}
