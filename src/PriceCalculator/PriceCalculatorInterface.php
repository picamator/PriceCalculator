<?php
/**
 * Inerface for Price Calculator
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace PriceCalculator;
use PriceCalculator\Strategy\PriceNetInterface;

interface PriceCalculatorInterface
{
    /**
     * Number of digits after the decimal place in the result.
     */
    const BC_SCALE = 4;
     
    /**
     * @param PriceNetInterface $strategy
     * @param float $vat_percent
     * @throws Exception
     */
    public function __construct(PriceNetInterface $strategy, 
        $vat_percent = null);
    
    /**
     * Sets price purchase
     * 
     * @param float $price_purchase
     * @return self
     */
    public function setPricePurchase($price_purchase);
    
    /**
     * Sets vat percent
     * 
     * @param float $vat_percent
     * @return self
     */
    public function setVatPercent($vat_percent);
    
    
    /**
     * Gets price components
     * 
     * @return array 
     * <code>
     *  array('price_net' => 10, 'price_gross' => 15, 'vat_value' => 5);
     * </code>
     */
    public function getPrice();
}
