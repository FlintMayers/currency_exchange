<?php

namespace Tests\AppBundle\Service;

use AppBundle\Service\CurrencyExchange;
use PHPUnit\Framework\TestCase;

/**
 * Class CurrencyExchangeTest
 * @package Tests\AppBundle\Service
 */
class CurrencyExchangeTest extends TestCase
{

    /**
     * @dataProvider amountProvider
     */
    public function testLeastAmountOfNotes($amount, $expected)
    {
        $currencyExchange = new CurrencyExchange();
        $this->assertEquals($expected, $currencyExchange->leastAmountOfNotes($amount));
    }

    public function amountProvider(){
        return [
            [2, 2],
            [135, 4],
            [150, 2],
            [234, 8],
            [500000, 1000],
            [500135, 1004],
            ['asdf', 0],
            [-5, 0],
            [9999.9999, 0]
        ];
    }
}
