<?php

namespace App\Tests\Currency\CAD;

use App\Currency\CAD\Mapper;
use PHPUnit\Framework\TestCase;

/**
 * Class MapperTest
 * @package App\Tests\Currency\CAD
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

        $this->assertEquals(2, count($result));

        $this->assertEquals('2017-01-03', $result[0]['date']);
        $this->assertEquals('1.3435', $result[0]['rate']);

        $this->assertEquals('2017-01-04', $result[1]['date']);
        $this->assertEquals('1.3315', $result[1]['rate']);
    }

    private function getData(){
        return [
            "observations" => [
                [
                    "d" => "2017-01-03",
                    "FXAUDCAD" => [
                        "v" => "0.9702"
                    ],
                    "FXTHBCAD" => [
                        "v" => "0.03739"
                    ],
                    "FXMYRCAD" => [
                        "v" => "0.2991"
                    ],
                    "FXZARCAD" => [
                        "v" => "0.09740"
                    ],
                    "FXEURCAD" => [
                        "v" => "1.3973"
                    ],
                    "FXUSDCAD" => [
                        "v" => "1.3435"
                    ],
                    "FXNOKCAD" => [
                        "v" => "0.1551"
                    ],
                    "FXCHFCAD" => [
                        "v" => "1.3064"
                    ],
                    "FXIDRCAD" => [
                        "v" => "0.000100"
                    ],
                    "FXSARCAD" => [
                        "v" => "0.3582"
                    ],
                    "FXBRLCAD" => [
                        "v" => "0.4121"
                    ],
                    "FXTRYCAD" => [
                        "v" => "0.3744"
                    ],
                    "FXMXNCAD" => [
                        "v" => "0.06439"
                    ],
                    "FXKRWCAD" => [
                        "v" => "0.001112"
                    ],
                    "FXHKDCAD" => [
                        "v" => "0.1732"
                    ],
                    "FXVNDCAD" => [
                        "v" => "0.000059"
                    ],
                    "FXPENCAD" => [
                        "v" => "0.3976"
                    ],
                    "FXTWDCAD" => [
                        "v" => "0.04150"
                    ],
                    "FXJPYCAD" => [
                        "v" => "0.01140"
                    ],
                    "FXSGDCAD" => [
                        "v" => "0.9264"
                    ],
                    "FXCNYCAD" => [
                        "v" => "0.1930"
                    ],
                    "FXGBPCAD" => [
                        "v" => "1.6459"
                    ],
                    "FXNZDCAD" => [
                        "v" => "0.9295"
                    ],
                    "FXSEKCAD" => [
                        "v" => "0.1465"
                    ],
                    "FXINRCAD" => [
                        "v" => "0.01965"
                    ],
                    "FXRUBCAD" => [
                        "v" => "0.02210"
                    ]
                ],
                [
                    "d" => "2017-01-04",
                    "FXAUDCAD" => [
                        "v" => "0.9678"
                    ],
                    "FXTHBCAD" => [
                        "v" => "0.03717"
                    ],
                    "FXMYRCAD" => [
                        "v" => "0.2961"
                    ],
                    "FXZARCAD" => [
                        "v" => "0.09767"
                    ],
                    "FXEURCAD" => [
                        "v" => "1.3930"
                    ],
                    "FXUSDCAD" => [
                        "v" => "1.3315"
                    ],
                    "FXNOKCAD" => [
                        "v" => "0.1546"
                    ],
                    "FXCHFCAD" => [
                        "v" => "1.3005"
                    ],
                    "FXIDRCAD" => [
                        "v" => "0.000099"
                    ],
                    "FXSARCAD" => [
                        "v" => "0.3550"
                    ],
                    "FXBRLCAD" => [
                        "v" => "0.4129"
                    ],
                    "FXTRYCAD" => [
                        "v" => "0.3722"
                    ],
                    "FXMXNCAD" => [
                        "v" => "0.06242"
                    ],
                    "FXKRWCAD" => [
                        "v" => "0.001111"
                    ],
                    "FXHKDCAD" => [
                        "v" => "0.1717"
                    ],
                    "FXVNDCAD" => [
                        "v" => "0.000059"
                    ],
                    "FXPENCAD" => [
                        "v" => "0.3930"
                    ],
                    "FXTWDCAD" => [
                        "v" => "0.04141"
                    ],
                    "FXJPYCAD" => [
                        "v" => "0.01134"
                    ],
                    "FXSGDCAD" => [
                        "v" => "0.9240"
                    ],
                    "FXCNYCAD" => [
                        "v" => "0.1920"
                    ],
                    "FXGBPCAD" => [
                        "v" => "1.6377"
                    ],
                    "FXNZDCAD" => [
                        "v" => "0.9251"
                    ],
                    "FXSEKCAD" => [
                        "v" => "0.1460"
                    ],
                    "FXINRCAD" => [
                        "v" => "0.01959"
                    ],
                    "FXRUBCAD" => [
                        "v" => "0.02200"
                    ]
                ],
            ]
        ];
    }
}
