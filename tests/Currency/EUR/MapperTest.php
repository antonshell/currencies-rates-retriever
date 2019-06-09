<?php

namespace App\Tests\Currency\EUR;

use App\Currency\EUR\Mapper;
use PHPUnit\Framework\TestCase;

/**
 * Class MapperTest
 * @package App\Tests\Currency\EUR
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

        $this->assertEquals('1999-01-04', $result[0]['date']);
        $this->assertEquals('1.1789', $result[0]['rate']);

        $this->assertEquals('1999-01-06', $result[2]['date']);
        $this->assertEquals('1.1743', $result[2]['rate']);
    }

    private function getData(){
        return [
            'Header' => [
                'ID' => 'EXR-HIST_2019-06-07',
                'Test' => 'false',
                'Name' => 'Euro foreign exchange reference rates',
                'Prepared' => '2019-06-07T15:55:11',
                'Sender' => [
                    '@attributes' => [
                        'id' => '4F0'
                    ],
                    'Name' => 'European Central Bank',
                    'Contact' => [
                        'Department' => 'DG Statistics',
                        'URI' => 'mailto:statistics@ecb.europa.eu'
                    ]
                ],
                'DataSetAgency' => 'ECB',
                'DataSetID' => 'ECB_EXR_WEB',
                'Extracted' => '2019-06-07T15:55:11'
            ],
            'DataSet' => [
                'Group' => [
                    '@attributes' => [
                        'CURRENCY' => 'USD',
                        'CURRENCY_DENOM' => 'EUR',
                        'EXR_TYPE' => 'SP00',
                        'EXR_SUFFIX' => 'A',
                        'DECIMALS' => '4',
                        'UNIT' => 'USD',
                        'UNIT_MULT' => '0',
                        'TITLE_COMPL' => 'ECB reference exchange rate, US dollar/Euro, 2:15 pm (C.E.T.)'
                    ]
                ],
                'Series' => [
                    '@attributes' => [
                        'FREQ' => 'D',
                        'CURRENCY' => 'USD',
                        'CURRENCY_DENOM' => 'EUR',
                        'EXR_TYPE' => 'SP00',
                        'EXR_SUFFIX' => 'A',
                        'TIME_FORMAT' => 'P1D',
                        'COLLECTION' => 'A'
                    ],
                    'Obs' => [
                        [
                            '@attributes' => [
                                'TIME_PERIOD' => '1999-01-04',
                                'OBS_VALUE' => '1.1789',
                                'OBS_STATUS' => 'A',
                                'OBS_CONF' => 'F'
                            ]
                        ],
                        [
                            '@attributes' => [
                                'TIME_PERIOD' => '1999-01-05',
                                'OBS_VALUE' => '1.1790',
                                'OBS_STATUS' => 'A',
                                'OBS_CONF' => 'F'
                            ]
                        ],
                        [
                            '@attributes' => [
                                'TIME_PERIOD' => '1999-01-06',
                                'OBS_VALUE' => '1.1743',
                                'OBS_STATUS' => 'A',
                                'OBS_CONF' => 'F'
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
