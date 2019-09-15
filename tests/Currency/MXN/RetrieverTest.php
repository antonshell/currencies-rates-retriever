<?php

namespace App\Tests\Currency\MXN;

use App\Currency\MXN\Retriever;
use App\Helper\CurlHelper;
use PHPUnit\Framework\TestCase;

/**
 * Class RetrieverTest
 * @package App\Tests\Currency\MXN
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

        $this->assertEquals('1991-11-12', $result["valores"][0][0]);
        $this->assertEquals('3.0735', $result["valores"][0][1]);

        $this->assertEquals('2019-09-13', $result["valores"][6996][0]);
        $this->assertEquals('19.3665', $result["valores"][6996][1]);
    }
}
