<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Scim\Schema;

use Assert\Assertion;
use Scim\Attributetype\AttributeTypeInterface;
use Scim\ScimObject\ScimObject;

class Schema extends ScimObject implements SchemaInterface
{
    /**
     * @var \Scim\Attributetype\AttributeTypeInterface[]
     */
    protected $attributes = [];

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var null|string
     */
    protected $description;

    /**
     * Resource constructor.
     *
     * @param string                                       $id
     * @param string                                       $name
     * @param null|string                                  $description
     * @param \Scim\AttributeType\AttributeTypeInterface[] $attributes
     */
    public function __construct($id, $name, array $attributes, $description = null)
    {
        Assertion::string($id);
        Assertion::string($name);
        Assertion::nullOrString($description);
        Assertion::notEmpty($attributes);
        Assertion::allIsInstanceOf($attributes, AttributeTypeInterface::class);

        parent::__construct([
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'attributes' => $attributes,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
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
    public function getDescription()
    {
        return $this->description;
    }
}
