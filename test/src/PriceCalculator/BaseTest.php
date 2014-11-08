<?php
/**
 * Base PriceCalculator UnitTest
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

abstract class BaseTest extends PHPUnit_Framework_TestCase 
{
    /**
     * Assert check equals arrays
     * 
     * @param array $expected
     * @param array $actual
     */
    protected function assertEqualArrays(array $expected, array $actual) 
    {
        foreach ($expected as $key => $value) {
            $this->assertTrue(array_key_exists($key, $actual));
            $this->assertEquals($value, $actual[$key]);
        }
    }
}