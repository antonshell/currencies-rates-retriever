<?php

namespace App\Tests\Currency\CAD;

use App\Currency\CAD\Retriever;
use App\Helper\CurlHelper;
use PHPUnit\Framework\TestCase;

/**
 * Class RetrieverTest
 * @package App\Tests\Currency\CAD
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

        $this->assertEquals('2017-01-03', $result["observations"][0]["d"]);
        $this->assertEquals('1.3435', $result["observations"][0]["FXUSDCAD"]['v']);

        $this->assertEquals('2019-09-13', $result["observations"][675]["d"]);
        $this->assertEquals('1.3257', $result["observations"][675]["FXUSDCAD"]['v']);
    }
}
