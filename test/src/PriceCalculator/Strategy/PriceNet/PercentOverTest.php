<?php
/**
 * Test for Percent Over strategy
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

use PriceCalculator\Strategy\PriceNet\PercentOver;

class PercentOverTest extends BaseTest
{
    /**
     * @dataProvider providerGetPriceNet
     * @param array $options
     * @param float $pricePurchase
     * @param float $expected
     */
    public function testGetPriceNet(array $options, $pricePurchase, $expected) 
    {
        $strategy   = new PercentOver($options);
        $strategy->setPricePurchase($pricePurchase);
        
        $actual     = $strategy->getPriceNet();
        
        $this->assertEquals($expected, $actual);
    }
    
    
    public function providerGetPriceNet() 
    {
        return array(
            array(array('percent_over'  => 10.5), 15.9989, 17.6787)
        );
    }
}
