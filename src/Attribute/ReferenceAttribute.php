<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Scim\Attribute;

use Assert\Assertion;

class ReferenceAttribute extends Attribute
{
    /**
     * @var bool
     */
    protected $caseExact = false;

    /**
     * @var string[]
     */
    protected $referenceTypes = [];

    /**
     * @var string
     */
    protected $uniqueness = self::UNIQUENESS_NONE;

    /**
     * ReferenceAttribute constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        Assertion::keyExists($data, 'referenceTypes');
        Assertion::isArray($data['referenceTypes']);
        Assertion::allString($data['referenceTypes']);
        Assertion::notEmpty($data['referenceTypes']);

        $data['type'] = self::TYPE_REFERENCE;
        parent::__construct($data);
    }
}
