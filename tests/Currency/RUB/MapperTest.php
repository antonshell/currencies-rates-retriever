<?php

namespace App\Tests\Currency\RUB;

use App\Currency\RUB\Mapper;
use PHPUnit\Framework\TestCase;

/**
 * Class MapperTest
 * @package App\Tests\Currency\RUB
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

        $this->assertEquals('1998-12-31', $result[0]['date']);
        $this->assertEquals('20.6500', $result[0]['rate']);

        $this->assertEquals('1999-01-06', $result[2]['date']);
        $this->assertEquals('20.6500', $result[2]['rate']);
    }

    private function getData(){
        return [
            [
                'tag' => 'tr',
                'html' => '\r\n  ',
                'children' => [
                    [
                        'tag' => 'td',
                        'html' => '31.12.1998'
                    ],
                    [
                        'tag' => 'td',
                        'html' => '1'
                    ],
                    [
                        'tag' => 'td',
                        'html' => '20,6500'
                    ]
                ]
            ],
            [
                'tag' => 'tr',
                'html' => '\r\n  ',
                'children' => [
                    [
                        'tag' => 'td',
                        'html' => '01.01.1999'
                    ],
                    [
                        'tag' => 'td',
                        'html' => '1'
                    ],
                    [
                        'tag' => 'td',
                        'html' => '20,6500'
                    ]
                ]
            ],
            [
                'tag' => 'tr',
                'html' => '\r\n  ',
                'children' => [
                    [
                        'tag' => 'td',
                        'html' => '06.01.1999'
                    ],
                    [
                        'tag' => 'td',
                        'html' => '1'
                    ],
                    [
                        'tag' => 'td',
                        'html' => '20,6500'
                    ]
                ]
            ]
        ];
    }
}
