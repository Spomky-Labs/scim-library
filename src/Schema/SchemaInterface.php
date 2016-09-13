<?php

namespace Scim\Schema;

interface SchemaInterface extends \JsonSerializable
{
    /**
     * @return \Scim\Attribute\AttributeInterface[]
     */
    public function getAttribute();
}
