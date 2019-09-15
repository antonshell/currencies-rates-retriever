<?php

namespace App\Tests\Currency\MXN;

use App\Currency\MXN\Mapper;
use PHPUnit\Framework\TestCase;

/**
 * Class MapperTest
 * @package App\Tests\Currency\MXN
 */
class MapperTest extends TestCase
{
    /**
     * @var Mapper
     */
    private $mapper;

    /**
     * CurrencyEnumTest constructor.
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mapper = new Mapper();
    }

    public function testMap()
    {
        $data = $this->getData();
        $result = $this->mapper->map($data);

        $this->assertEquals(3, count($result));

        $this->assertEquals('1991-11-12', $result[0]['date']);
        $this->assertEquals('3.0735', $result[0]['rate']);

        $this->assertEquals('1991-11-14', $result[2]['date']);
        $this->assertEquals('3.0718', $result[2]['rate']);
    }

    private function getData(){
        return [
            "valores" => [
                [
                    "1991-11-12",
                    3.0735
                ],
                [
                    "1991-11-13",
                    3.0712
                ],
                [
                    "1991-11-14",
                    3.0718
                ],
            ]

        ];
    }
}
