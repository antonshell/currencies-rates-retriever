<?php

namespace App\Tests\Currency\RUB;

use App\Currency\RUB\Retriever;
use App\Helper\CurlHelper;
use PHPUnit\Framework\TestCase;

/**
 * Class RetrieverTest
 * @package App\Tests\Currency\RUB
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

        $this->assertEquals('31.12.1998', $result[0]["children"][0]["html"]);
        $this->assertEquals('20,6500', $result[0]["children"][2]["html"]);

        $this->assertEquals('28.05.2019', $result[5066]["children"][0]["html"]);
        $this->assertEquals('64,4636', $result[5066]["children"][2]["html"]);
    }
}
