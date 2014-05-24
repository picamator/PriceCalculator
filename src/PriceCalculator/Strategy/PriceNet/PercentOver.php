<?php
/**
 * Fixed Percent Over Strategy
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace PriceCalculator\Strategy\PriceNet;
use PriceCalculator\Strategy\AbstractPriceNet;

class PercentOver extends AbstractPriceNet 
{
    /**
     * Options
     * 
     * @var array
     */
    protected $options = array('percent_over' => null);
    
    /**
     * Gets price net
     * 
     * @return float
     */
    public function getPriceNet() 
    {
        $percent_over = $this->options['percent_over']/ 100 + 1;
        
        return bcmul($this->price_purchase, $percent_over, self::BC_SCALE);
    }
}
