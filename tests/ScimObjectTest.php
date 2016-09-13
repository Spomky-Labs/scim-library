<?php

namespace Scim\Test;

abstract class ScimObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array  $attribute
     * @param array  $expected
     * @param string $current_key
     */
    protected function checkJsonObjects(array $attribute, array $expected, $current_key = '/')
    {
        $this->assertEquals(count($attribute), count($expected), sprintf('At %s, expected keys "%s". Got "%s".', $current_key, json_encode(array_keys($expected)), json_encode(array_keys($attribute))));
        foreach ($expected as $k=>$v) {
            $this->assertArrayHasKey($k, $attribute, sprintf('At %s, the key "%s" does not exist.', $current_key, $k));
            if (is_array($v)) {

                $this->checkJsonObjects($attribute[$k], $v, $current_key.$k.'/');
            } else {
                $this->assertEquals($attribute[$k], $v, sprintf('At %s, expected value for key "%s" is "%s". Got "%s" (full attribute: "%s").', $current_key, $k, $v, $attribute[$k], json_encode($attribute)));
            }
        }
    }
}
