<?php
/**
 * Manual Price Net Strategy
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace PriceCalculator\Strategy\PriceNet;
use PriceCalculator\Strategy\AbstractPriceNet;

class Manual extends AbstractPriceNet 
{
    /**
     * Options
     * 
     * @var array
     */
    protected $options = array('price_net' => null);
    
    /**
     * Gets price net
     * 
     * @return float
     */
    public function getPriceNet() 
    {
        return $this->options['price_net'];
    }
}
