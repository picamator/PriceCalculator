<?php
/**
 * PriceCalulator Autoload
 * 
 * @link        https://github.com/picamator/PriceCalculator
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace PriceCalculator;

function Autoload($class)
{    
    include_once (str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php');
}

spl_autoload_register(__NAMESPACE__.'\Autoload');