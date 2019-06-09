<?php

namespace App\Tests\Currency\GBP;

use App\Currency\GBP\Mapper;
use PHPUnit\Framework\TestCase;

/**
 * Class MapperTest
 * @package App\Tests\Currency\GBP
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

        $this->assertEquals('1998-01-02', $result[0]['date']);
        $this->assertEquals('1.6405', $result[0]['rate']);

        $this->assertEquals('1998-01-06', $result[2]['date']);
        $this->assertEquals('1.6327', $result[2]['rate']);
    }

    private function getData(){
        return [
            [
                'Date' => '02-01-1998',
                'Value' => '1.6405'
            ],
            [
                'Date' => '05-01-1998',
                'Value' => '1.638'
            ],
            [
                'Date' => '06-01-1998',
                'Value' => '1.6327'
            ]
        ];
    }
}
