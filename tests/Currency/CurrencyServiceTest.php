<?php

namespace App\Tests\Currency;

use App\Currency\CurrencyEnum;
use App\Currency\CurrencyService;
use PHPUnit\Framework\TestCase;

/**
 * Class CurrencyServiceTest
 * @package App\Tests\Currency
 */
class CurrencyServiceTest extends TestCase
{
    /**
     * @var CurrencyService
     */
    private $currencyService;

    /**
     * CurrencyServiceTest constructor.
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->currencyService = new CurrencyService();
    }

    /**
     * @throws \Exception
     */
    public function testAddMissingDates()
    {
        $data = [
            ['date' => '1998-01-02','rate' => '1.6405'],
            ['date' => '1998-01-05','rate' => '1.638']
        ];

        $results = $this->currencyService->addMissingDates($data);

        $this->assertEquals($data[0]['date'], $results[0]['date']);
        $this->assertEquals($data[0]['rate'], $results[0]['rate']);
    }
}
