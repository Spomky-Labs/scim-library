<?php

namespace Scim\Attribute;

class BinaryAttribute extends Attribute
{
    /**
     * @var bool
     */
    protected $caseExact = false;

    /**
     * @var string
     */
    protected $uniqueness = self::UNIQUENESS_NONE;

    /**
     * BinaryAttribute constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $data['type'] = self::TYPE_BINARY;
        parent::__construct($data);
    }
}
