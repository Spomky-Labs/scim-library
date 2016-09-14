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

use Assert\Assertion;
use Scim\ScimObject\ScimObject;

abstract class AttributeType extends ScimObject implements AttributeTypeInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var bool
     */
    protected $multiValued = false;

    /**
     * @var bool
     */
    protected $required = false;

    /**
     * @var string
     */
    protected $mutability = self::MUTABILITY_READWRITE;

    /**
     * @var string
     */
    protected $returned = self::RETURNED_DEFAULT;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data)
    {
        Assertion::keyExists($data, 'name');
        Assertion::string($data['name']);
        Assertion::keyExists($data, 'type');
        Assertion::string($data['type']);

        $this->checkDescription($data);
        $this->checkMultiValued($data);
        $this->checkRequired($data);
        $this->checkMutability($data);
        $this->checkReturned($data);
        $this->checkUniqueness($data);
        $this->checkCaseExact($data);
        $this->checkReferenceTypes($data);
        $this->checkCanonicalValues($data);

        parent::__construct($data);
    }

    /**
     * @param array $data
     */
    private function checkDescription(array $data)
    {
        if (!array_key_exists('description', $data)) {
            return;
        }
        Assertion::nullOrString($data['description']);
    }

    /**
     * @param array $data
     */
    private function checkMultiValued(array $data)
    {
        if (!array_key_exists('multiValued', $data)) {
            return;
        }
        Assertion::boolean($data['multiValued']);
    }

    /**
     * @param array $data
     */
    private function checkRequired(array $data)
    {
        if (!array_key_exists('required', $data)) {
            return;
        }
        Assertion::boolean($data['required']);
    }

    /**
     * @param array $data
     */
    private function checkMutability(array $data)
    {
        if (!array_key_exists('mutability', $data)) {
            return;
        }
        Assertion::inArray($data['mutability'], [
            self::MUTABILITY_READONLY,
            self::MUTABILITY_READWRITE,
            self::MUTABILITY_IMMUTABLE,
            self::MUTABILITY_WRITEONLY,
        ]);
    }

    /**
     * @param array $data
     */
    private function checkReturned(array $data)
    {
        if (!array_key_exists('returned', $data)) {
            return;
        }
        Assertion::inArray($data['returned'], [
            self::RETURNED_ALWAYS,
            self::RETURNED_NEVER,
            self::RETURNED_DEFAULT,
            self::RETURNED_REQUEST,
        ]);
    }

    /**
     * @param array $data
     */
    private function checkUniqueness(array $data)
    {
        if (!array_key_exists('uniqueness', $data)) {
            return;
        }
        Assertion::inArray($data['uniqueness'], [
            self::UNIQUENESS_NONE,
            self::UNIQUENESS_SERVER,
            self::UNIQUENESS_GLOBAL,
        ]);
    }

    /**
     * @param array $data
     */
    private function checkCaseExact(array $data)
    {
        if (!array_key_exists('caseExact', $data)) {
            return;
        }
        Assertion::boolean($data['caseExact']);
    }

    /**
     * @param array $data
     */
    private function checkReferenceTypes(array $data)
    {
        if (!array_key_exists('referenceTypes', $data)) {
            return;
        }
        Assertion::isArray($data['referenceTypes']);
        Assertion::allString($data['referenceTypes']);
    }

    /**
     * @param array $data
     */
    private function checkCanonicalValues(array $data)
    {
        if (!array_key_exists('canonicalValues', $data)) {
            return;
        }
        Assertion::isArray($data['canonicalValues']);
        Assertion::allString($data['canonicalValues']);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function isMultiValued()
    {
        return $this->multiValued;
    }

    /**
     * {@inheritdoc}
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * {@inheritdoc}
     */
    public function getMutability()
    {
        return $this->mutability;
    }

    /**
     * {@inheritdoc}
     */
    public function getReturned()
    {
        return $this->returned;
    }
}
