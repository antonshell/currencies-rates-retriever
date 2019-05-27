<?php

namespace App\Tests\Currency\GBP;

use App\Currency\GBP\Retriever;
use App\Helper\CurlHelper;
use PHPUnit\Framework\TestCase;

/**
 * Class RetrieverTest
 * @package App\Tests\Currency\GBP
 */
class RetrieverTest extends TestCase
{
    /**
     * @var MapperTest
     */
    private $retriever;

    /**
     * CurrencyEnumTest constructor.
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $curlHelper = new CurlHelper();
        $this->retriever = new Retriever($curlHelper);
    }

    public function testRetrieve()
    {
        $result = $this->retriever->retrieve();

        $this->assertEquals('02-01-1998', $result[0]["Date"]);
        $this->assertEquals('1.6405', $result[0]["Value"]);

        $this->assertEquals('23-05-2019', $result[5404]["Date"]);
        $this->assertEquals('1.2667', $result[5404]["Value"]);
    }
}
