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
        //$result = $this->mapper->map();
    }
}
