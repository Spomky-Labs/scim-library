<?php

namespace Scim\Attribute;

class StringAttribute extends Attribute
{
    /**
     * @var bool
     */
    protected $caseExact = false;

    /**
     * @var string[]
     */
    protected $canonicalValues = [];

    /**
     * @var string
     */
    protected $uniqueness = self::UNIQUENESS_NONE;

    /**
     * StringAttribute constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $data['type'] = self::TYPE_STRING;
        parent::__construct($data);
    }
}
