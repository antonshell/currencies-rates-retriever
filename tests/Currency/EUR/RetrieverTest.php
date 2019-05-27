<?php

namespace App\Tests\Currency\EUR;

use App\Currency\EUR\Retriever;
use App\Helper\CurlHelper;
use PHPUnit\Framework\TestCase;

/**
 * Class RetrieverTest
 * @package App\Tests\Currency\EUR
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

        $this->assertEquals('1999-01-04', $result["DataSet"]["Series"]["Obs"][0]["@attributes"]["TIME_PERIOD"]);
        $this->assertEquals('1.1789', $result["DataSet"]["Series"]["Obs"][0]["@attributes"]["OBS_VALUE"]);

        $this->assertEquals('2019-05-27', $result["DataSet"]["Series"]["Obs"][5220]["@attributes"]["TIME_PERIOD"]);
        $this->assertEquals('1.1198', $result["DataSet"]["Series"]["Obs"][5220]["@attributes"]["OBS_VALUE"]);
    }
}
