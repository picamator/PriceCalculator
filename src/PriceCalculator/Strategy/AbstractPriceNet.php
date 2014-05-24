<?php
/**
 * Abstract for Price Net Strategy
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace PriceCalculator\Strategy;

abstract class AbstractPriceNet implements PriceNetInterface 
{
    /**
     * Price purchase
     * 
     * @var float
     */
    protected $price_purchase;
    
    /**
     * Options
     * 
     * @var array
     */
    protected $options = array();
    
    /**
     * @param array $options
     */
    public function __construct(array $options) 
    {
        $this->setOptions($options);
    }
    
    /**
     * Sets price purchase
     * 
     *Fixed Percent Over @param float $price_purchase
     * @return self
     */
    public function setPricePurchase($price_purchase) 
    {
        $this->price_purchase = $price_purchase;
        
        return $this;
    }
    
    /**
     * Sets options
     * 
     * @param array $options
     * @throws Exception
     */
    protected function setOptions(array $options) 
    {
        $options = array_merge($this->options, $options);
        
        $options_key = array_keys($this->options);
        foreach ($options_key as $item) {
            if(empty($item)) {
                throw Exception('Error: Required option '.$item.' was not set.');
            }
        }
        
        $this->options = $options;
    }
}