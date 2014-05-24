<?php
/**
 * =======================================
 *    Example of usage Price Calculator
 * =======================================
 */

namespace PriceCalculator;
use PriceCalculator\Strategy\PriceNet\PercentOver;

// PriceCalculator Autoload
require_once ('./src/Autoload.php');

// shop buy apples by 10$ from farmer
$price_purchase = 10;

// shop has 3% over purchase price
$strategy = new PercentOver(array('percent_over' => 3));

// vat is 23%
$vat_percent = 23;

// calculate price
$calculator = new PriceCalculator($strategy, $vat_percent);

$price = $calculator->setPricePurchase($price_purchase)
                    ->getPrice();

var_dump($price);   // output: array(3) {
                    //  ["price_net"]=>
                    //  string(5) "10.30"
                    //  ["price_gross"]=>
                    //  string(7) "12.6690"
                    //  ["vat_value"]=>
                    //  string(6) "2.3690"
                    //}