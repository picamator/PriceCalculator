<?php
/**
 * Fixed Price Over Strategy
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace PriceCalculator\Strategy\PriceNet;
use PriceCalculator\Strategy\AbstractPriceNet;

class PriceOver extends AbstractPriceNet 
{
    /**
     * Options
     * 
     * @var array
     */
    protected $options = array('price_over' => null);
    
    /**
     * Gets price net
     * 
     * @return float
     */
    public function getPriceNet() 
    {
        return bcadd($this->price_purchase, $this->options['price_over'],
            self::BC_SCALE);
    }
}
