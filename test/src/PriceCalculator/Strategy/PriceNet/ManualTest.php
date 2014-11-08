<?php
/**
 * Test for Manual strategy
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

use PriceCalculator\Strategy\PriceNet\Manual;

class ManualTest extends BaseTest
{
    /**
     * @dataProvider providerGetPriceNet
     * @param array $options
     * @param float $expected
     */
    public function testGetPriceNet(array $options, $expected) 
    {
        $strategy   = new Manual($options);
        $actual     = $strategy->getPriceNet();
        
        $this->assertEquals($expected, $actual);
    }
    
    
    public function providerGetPriceNet() 
    {
        return array(
            array(array('price_net'  => 12.5287), 12.5287)
        );
    }
}
