PriceCalculator
===============

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/77720d99-bdaf-4581-9b0f-9f1a98993304/mini.png)](https://insight.sensiolabs.com/projects/77720d99-bdaf-4581-9b0f-9f1a98993304)

It helps to calculate products sales price accordingly components such as net, gross, vat with 
hight precision.

PriceCalculator implements several algorithms to build price net:

* Fixed price over purchase price
* Fixed percent over purchase price
* Manually set net without any margin

Additionally it is possible extend library by adding own net price strategy.

Requirements
------------
* PHP 5.3+
* [BCMath](http://www.php.net/manual/en/book.bc.php) 
  
Usage
-----
```php
<?php
namespace PriceCalculator;
use PriceCalculator\Strategy\PriceNet\PercentOver;

// PriceCalculator Autoload
require_once ('./src/autoload.php');

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

```

License
-------
BSD-3-Clause
