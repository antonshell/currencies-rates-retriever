<?php

namespace App\Tests\Currency;

use App\Currency\CurrencyEnum;
use App\Currency\CurrencyFactory;
use App\Currency\EUR\Retriever;
use PHPUnit\Framework\TestCase;

/**
 * Class CurrencyFactoryTest
 * @package App\Tests\Currency
 */
class CurrencyFactoryTest extends TestCase
{
    /**
     * @var CurrencyFactory
     */
    private $currencyFactory;

    /**
     * CurrencyFactoryTest constructor.
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->currencyFactory = new CurrencyFactory();
    }

    /**
     * @throws \Exception
     */
    public function testCreateRetriever()
    {
        $result = $this->currencyFactory->createRetriever(CurrencyEnum::EUR);
        $this->assertTrue($result instanceof \App\Currency\EUR\Retriever);

        $result = $this->currencyFactory->createRetriever(CurrencyEnum::RUB);
        $this->assertTrue($result instanceof \App\Currency\RUB\Retriever);

        $result = $this->currencyFactory->createRetriever(CurrencyEnum::GBP);
        $this->assertTrue($result instanceof \App\Currency\GBP\Retriever);
    }

    /**
     * @throws \Exception
     */
    public function testCreateMapper()
    {
        $result = $this->currencyFactory->createMapper(CurrencyEnum::EUR);
        $this->assertTrue($result instanceof \App\Currency\EUR\Mapper);

        $result = $this->currencyFactory->createMapper(CurrencyEnum::RUB);
        $this->assertTrue($result instanceof \App\Currency\RUB\Mapper);

        $result = $this->currencyFactory->createMapper(CurrencyEnum::GBP);
        $this->assertTrue($result instanceof \App\Currency\GBP\Mapper);
    }
}
