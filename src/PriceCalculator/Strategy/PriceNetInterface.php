<?php
/**
 * Inerface for Price Net Strategy
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace PriceCalculator\Strategy;

interface PriceNetInterface
{
    /**
     * Number of digits after the decimal place in the result.
     */
    const BC_SCALE = 4;
    
    /**
     * @param array $options
     */
    public function __construct(array $options);
    
    /**
     * Sets price purchase
     * 
     * @param float $price_purchase
     * @return self
     */
    public function setPricePurchase($price_purchase);
    
    /**
     * Gets price net
     * 
     * @return float
     */
    public function getPriceNet();
}
