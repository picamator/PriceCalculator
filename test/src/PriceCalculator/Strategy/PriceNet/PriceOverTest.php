<?php
/**
 * Test for Price Over strategy
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

use PriceCalculator\Strategy\PriceNet\PriceOver;

class PriceOverTest extends BaseTest
{
    /**
     * @dataProvider providerGetPriceNet
     * @param array $options
     * @param float $pricePurchase
     * @param float $expected
     */
    public function testGetPriceNet(array $options, $pricePurchase, $expected) 
    {
        $strategy   = new PriceOver($options);
        $strategy->setPricePurchase($pricePurchase);
        
        $actual     = $strategy->getPriceNet();
        
        $this->assertEquals($expected, $actual);
    }
    
    
    public function providerGetPriceNet() 
    {
        return array(
            array(array('price_over'  => 12.9999), 14.1111, 27.1110)
        );
    }
}
