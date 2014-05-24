<?php
/**
 * Base PriceCalculator UnitTest
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace PriceCalculator;

class BaseTest extends \PHPUnit_Framework_TestCase 
{
    /**
     * Assert check equals arrays
     * 
     * @param array $expected
     * @param array $acutal
     */
    protected function assertEqualArrays(array $expected, array $acutal) 
    {
        foreach ($expected as $key => $value) {
            $this->assertTrue(array_key_exists($key, $acutal));
            $this->assertEquals($value, $actual[$key]);
        }
    }
}