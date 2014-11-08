<?php
/**
 * Test for Calculator
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

use PriceCalculator\PriceCalculator;
use PriceCalculator\Strategy\PriceNetInterface;
use PriceCalculator\Strategy\PriceNet\PriceOver;
use PriceCalculator\Strategy\PriceNet\PercentOver;
use PriceCalculator\Strategy\PriceNet\Manual;

class PriceCalculatorTest extends BaseTest
{
    /**
     * @dataProvider providerStrategyPercentNet
     * @param PriceNetInterface $strategy
     * @param float $vat_percent
     * @param float $price_purchase
     * @param array $expected_result
     */
    public function testStrategyPriceNet(PriceNetInterface $strategy, 
        $vat_percent, $price_purchase, array $expected_result
    ) {
        $price_calculator = new PriceCalculator($strategy, $vat_percent);
        $result = $price_calculator->setPricePurchase($price_purchase)
                    ->getPrice();
        
        $this->assertEqualArrays($expected_result, $result);   
    }
    
    public function providerStrategyPercentNet()
    {
        // strategies
        $price_over = new PriceOver(array('price_over' => 5.9991));
        $percent_over = new PercentOver(array('percent_over' => 10));
        $manual = new Manual(array('price_net' => 109.9911));
        
        // data
        return array(
            array($price_over, 23, 98.9921, array(
                'price_net' => 104.9912,
                'price_gross' => 129.1391,
                'vat_value' => 24.1479
            )),
            
            array($percent_over, 23, 98.9921, array(
                'price_net' => 108.8913,
                'price_gross' => 133.9362,
                'vat_value' => 25.0449
            )),
            
            array($manual, 23, 98.9921, array(
                'price_net' => 109.9911,
                'price_gross' => 135.289,
                'vat_value' => 25.2979
            ))
        );
    }
}