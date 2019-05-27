<?php

namespace App\Tests\Currency;

use App\Currency\CurrencyEnum;
use PHPUnit\Framework\TestCase;

/**
 * Class CurrencyEnumTest
 * @package App\Tests\Currency
 */
class CurrencyEnumTest extends TestCase
{
    /**
     * @var CurrencyEnum
     */
    private $currencyEnum;

    /**
     * CurrencyEnumTest constructor.
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->currencyEnum = new CurrencyEnum();
    }

    public function testGetValues()
    {
        $results = $this->currencyEnum->getValues();
        $this->assertTrue(is_array($results));
        $this->assertEquals(CurrencyEnum::EUR, $results[0]);
    }
}
