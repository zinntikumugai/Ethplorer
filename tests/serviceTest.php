<?php
require "vendor/autoload.php";
require_once '../service/lib/ethplorer.php';

use EverexIO\PHPUnitIterator\TestCase;

$aConfig = include('../service/config.php');
global $ethplorer;
$ethplorer = Ethplorer::db($aConfig);

class serviceTest extends TestCase
{
    protected $url = 'http://172.23.0.3/service/service.php';

    private function getLastPendingTransactionFromEtherscan() {
        $DOM = new DOMDocument;
        libxml_use_internal_errors(true);
        $DOM->loadHTML(file_get_contents('https://etherscan.io/txsPending?&sort=gasprice&order=desc'));
        libxml_clear_errors();
        $finder = new DomXPath($DOM);
        return $finder->query("//*[contains(@class, \"table\")]/tbody/tr[8]/td[1]")[0]->textContent;
    }

    /**
     * Checking showing details of pending transactions
     */
    public function testGettingTransactionDetails() {
        global $ethplorer;
        $txHash = $this->getLastPendingTransactionFromEtherscan();
        $txDetails = $ethplorer->getTransactionDetails($txHash);
        $this->assertArrayHasKey('pending', $txDetails);
        $this->assertTrue($txDetails['pending']);
    }
}