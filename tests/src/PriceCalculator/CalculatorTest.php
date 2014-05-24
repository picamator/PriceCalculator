<?php
/**
 * Test for Calculator
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace PriceCalculator;
use PriceCalculator\BaseTest;
use PriceCalculator\Strategy\FixedPriceOver;

class ColculatorTest extends BaseTest
{
    /**
     * @dataProvider providerStrategyPercentNet
     * @param StrategyInterface $strategy
     * @param float $vat_percent
     * @param float $price_purchase
     * @param array $expected_result
     */
    public function testStrategyPriceNet(StrategyInterface $strategy, 
        $vat_percent, $price_purchase, array $expected_result
    ) {
        $price_calculator = new PriceCalculator($strategy, $vat_percent);
        $result = $price_calculator->setPricePurchase($price_purchase)
                    ->getPrice();
        
        $this->assertEqualArrays($expected_result, $result);
      
    }
    
    public function providerStrategyPercentNet()
    {
        $options = array('price' => 5.9991);
        $fixed_price_over = new FixedPriceOver($options);
        
        return array(
            array($fixed_price_over, 23, 98.9921, array(
                'price_net' => 104.9912,
                'price_gros' => 129.1392,
                'vat_value' => 24.1480
            ))
        );
    }
}