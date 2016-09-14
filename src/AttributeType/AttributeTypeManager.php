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

final class AttributeTypeManager implements AttributeTypeManagerInterface
{
    /**
     * @var \Scim\AttributeType\AttributeTypeInterface[]
     */
    private $AttributeTypes = [];

    /**
     * AttributeTypeManager constructor.
     */
    public function __construct()
    {
        foreach ($this->getAttributeTypeMap() as $k=>$v) {
            $this->AttributeTypes[$k] = $v;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function addAttributeTypeType($type, $class)
    {
        Assertion::string($type);
        Assertion::string($class);
        Assertion::classExists($class);

        $this->AttributeTypes[$type] = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function getSupportedAttributeTypeTypes()
    {
        return array_keys($this->AttributeTypes);
    }

    /**
     * {@inheritdoc}
     */
    public function createAttributeTypeFromData(array $data)
    {
        Assertion::keyExists($data, 'type');
        Assertion::string($data['type']);
        Assertion::keyExists($this->AttributeTypes, $data['type']);

        $class = $this->AttributeTypes[$data['type']];

        if (array_key_exists('subAttributes', $data)) {
            $subAttributes = [];
            foreach ($data['subAttributes'] as $subAttribute) {
                $subAttributes[] = $this->createAttributeTypeFromData($subAttribute);
            }
            $data['subAttributes'] = $subAttributes;
        }

        return new $class($data);
    }

    /**
     * @return array
     */
    private function getAttributeTypeMap()
    {
        return [
            AttributeTypeInterface::TYPE_BINARY    => '\Scim\AttributeType\BinaryAttributeType',
            AttributeTypeInterface::TYPE_BOOLEAN   => '\Scim\AttributeType\BooleanAttributeType',
            AttributeTypeInterface::TYPE_COMPLEX   => '\Scim\AttributeType\ComplexAttributeType',
            AttributeTypeInterface::TYPE_DATETIME  => '\Scim\AttributeType\DateTimeAttributeType',
            AttributeTypeInterface::TYPE_DECIMAL   => '\Scim\AttributeType\DecimalAttributeType',
            AttributeTypeInterface::TYPE_INTEGER   => '\Scim\AttributeType\IntegerAttributeType',
            AttributeTypeInterface::TYPE_REFERENCE => '\Scim\AttributeType\ReferenceAttributeType',
            AttributeTypeInterface::TYPE_STRING    => '\Scim\AttributeType\StringAttributeType',
        ];
    }
}
