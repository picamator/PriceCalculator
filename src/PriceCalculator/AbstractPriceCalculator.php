<?php
/**
 * Abstract for Price Calculator
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace PriceCalculator;
use PriceCalculator\Strategy\PriceNetInterface;

abstract class AbstractPriceCalculator implements PriceCalculatorInterface 
{
    /**
     * Price Net Strategy
     * 
     * @var PriceNetInterface 
     */
    protected $strategy;
    
    /**
     * Vat persent
     *
     * @var Float
     */
    protected $vat_percent = 0;
    
    /**
     * @param PriceNetInterface $strategy
     * @param float $vat_percent
     * @throws Exception
     */
    public function __construct(PriceNetInterface $strategy, 
        $vat_percent = null
    ) {
        if (!extension_loaded('BCMath')) {
            throw new Exception('Error: Extension BCMath was not loaded http://www.php.net/manual/en/book.bc.php');
        }
        
        $this->strategy = $strategy;
        
        if (!is_null($vat_percent)) {
            $this->vat_percent = $vat_percent;
        }
    }
    
    /**
     * Sets price purchase
     * 
     * @param float $price_purchase
     * @return self
     */
    public function setPricePurchase($price_purchase) 
    {
        $this->strategy->setPricePurchase($price_purchase);
        
        return $this;
    }
    
    /**
     * Sets vat percent
     * 
     * @param float $vat_percent
     * @return self
     */
    public function setVatPercent($vat_percent)
    {
        $this->vat_percent = $vat_percent;
        
        return $this;
    }
    
    
    /**
     * Gets price components
     * 
     * @return array 
     * <code>
     *  array('price_net' => 10, 'price_gross' => 15, 'vat_value' => 5);
     * </code>
     */
    public function getPrice() 
    {
        // price net
        $price_net = $this->strategy->getPriceNet();
        
        // price gros
        $vat_percent = $this->vat_percent/100 + 1;  
        $price_gross = bcmul($price_net, $vat_percent, self::BC_SCALE);
        
        // vat value
        $vat_value = bcsub($price_gross, $price_net, self::BC_SCALE);
        
        return array(
            'price_net' => $price_net,
            'price_gross' => $price_gross,
            'vat_value' => $vat_value
        );
    }
}
