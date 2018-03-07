<?php
namespace apiTests;
require "vendor/autoload.php";

use EverexIO\PHPUnitIterator\TestCase;

class everexTest extends TestCase
{
    protected $everex_url = 'http://rates.everex.io';

    /**
     * @dataProvider everexProvider
     */
    public function testAPI($test)
    {
        $this->_iterateTest($test);
    }

    public function everexProvider()
    {
        return [
            // ===================
            // historical tests
            [[
                'type' => 'everex',
                'method' => 'getCurrencyHistory',
                'description' => '= Comparing historical currencies with USD =',
                'compareFrom' => 'USD',
                'compareTo' => ['THB', 'MMK', 'EUR', 'CNY', 'GBP', 'JPY', 'RUB'],
                'compareSource' => 'quandl',
                'compareSourceParam' => 'CURRFX'
            ]],
            [[
                'type' => 'everex',
                'method' => 'getCurrencyHistory',
                'description' => '= Comparing historical BTC to USD =',
                'compareFrom' => 'USD',
                'compareTo' => ['BTC'],
                'compareReplace' => 'MKPRU',
                'compareSource' => 'quandl-reverse',
                'compareSourceParam' => 'BCHAIN'
            ]],
            [[
                'type' => 'everex',
                'method' => 'getCurrencyHistory',
                'description' => '= Comparing historical ETH to USD =',
                'compareFrom' => '0x0000000000000000000000000000000000000000',
                'compareTo' => ['USD'],
                'compareSource' => 'coinmarketcaphtml',
                'compareSourceParam' => 'ethereum'
            ]],
            [[
                'type' => 'everex',
                'method' => 'getCurrencyHistory',
                'description' => '= Comparing historical token to USD =',
                'compareFrom' => '0xf3db5fa2c66b7af3eb0c0b782510816cbe4813b8',
                'compareTo' => ['USD'],
                'compareSource' => 'coinmarketcaphtml',
                'compareSourceParam' => 'everex'
            ]],
            [[
                'type' => 'everex',
                'method' => 'getCurrencyHistory',
                'description' => '= Comparing historical token to USD =',
                'compareFrom' => '0x86fa049857e0209aa7d9e616f7eb3b3b78ecfdb0',
                'compareTo' => ['USD'],
                'compareSource' => 'coinmarketcaphtml',
                'compareSourceParam' => 'eos'
            ]],
            [[
                'type' => 'everex',
                'method' => 'getCurrencyHistory',
                'description' => '= Comparing historical token to USD =',
                'compareFrom' => '0xd26114cd6ee289accf82350c8d8487fedb8a0c07',
                'compareTo' => ['USD'],
                'compareSource' => 'coinmarketcaphtml',
                'compareSourceParam' => 'omisego'
            ]],
            // ===================
            // current tests
            [[
                'type' => 'everex',
                'method' => 'getCurrencyCurrent',
                'description' => '= Comparing current ETH to USD =',
                'compareFrom' => '0x0000000000000000000000000000000000000000',
                'compareTo' => ['USD'],
                'compareSource' => 'coinmarketcapapi',
                'compareSourceParam' => 'ethereum',
                'compareTags' => [['availableSupply', 'available_supply'], ['marketCapUsd', 'market_cap_usd']]
            ]],
            [[
                'type' => 'everex',
                'method' => 'getCurrencyCurrent',
                'description' => '= Comparing current token to USD =',
                'compareFrom' => '0xf3db5fa2c66b7af3eb0c0b782510816cbe4813b8',
                'compareTo' => ['USD'],
                'compareSource' => 'coinmarketcapapi',
                'compareSourceParam' => 'everex',
                'compareTags' => [['availableSupply', 'available_supply'], ['marketCapUsd', 'market_cap_usd']]
            ]],
            [[
                'type' => 'everex',
                'method' => 'getCurrencyCurrent',
                'description' => '= Comparing current token to USD =',
                'compareFrom' => '0x86fa049857e0209aa7d9e616f7eb3b3b78ecfdb0',
                'compareTo' => ['USD'],
                'compareSource' => 'coinmarketcapapi',
                'compareSourceParam' => 'eos',
                'compareTags' => [['availableSupply', 'available_supply'], ['marketCapUsd', 'market_cap_usd']]
            ]],
            [[
                'type' => 'everex',
                'method' => 'getCurrencyCurrent',
                'description' => '= Comparing current token to USD =',
                'compareFrom' => '0xd26114cd6ee289accf82350c8d8487fedb8a0c07',
                'compareTo' => ['USD'],
                'compareSource' => 'coinmarketcapapi',
                'compareSourceParam' => 'omisego',
                'compareTags' => [['availableSupply', 'available_supply'], ['marketCapUsd', 'market_cap_usd']]
            ]],
            [[
                'type' => 'everex',
                'method' => 'getCurrencyCurrent',
                'description' => '= Comparing current currencies with USD =',
                'compareFrom' => 'USD',
                'compareTo' => ['THB', 'MMK', 'EUR', 'CNY', 'GBP', 'JPY', 'RUB'],
                'compareSource' => 'openexchangerates',
            ]],
            [[
                'type' => 'everex',
                'method' => 'getBTCPrice',
                'description' => '= Comparing current BTC with USD =',
                'compareFrom' => 'USD', //
                'compareTo' => ['USD'],
                'compareSource' => 'bitstamp',
            ]],
            [[
                'type' => 'everex',
                'method' => 'getCurrencyCurrent',
                'description' => '= Comparing current THBEX with USD =',
                'compareFrom' => '0xff71cb760666ab06aa73f34995b42dd4b85ea07b',
                'compareTo' => ['USD'],
                'compareSource' => 'openexchangerates-reverse',
                'compareTags' => ['THB']
            ]]
        ];
    }

}