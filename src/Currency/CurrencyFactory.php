<?php

namespace App\Currency;

use App\Helper\CurlHelper;

/**
 * Class CurrencyFactory.
 */
class CurrencyFactory
{
    const EUR = 'EUR';
    const GBP = 'GBP';
    const RUB = 'RUB';

    /**
     * @param string $currency
     *
     * @return MapperInterface
     *
     * @throws \Exception
     */
    public function createMapper(string $currency): MapperInterface
    {
        $className = 'App\\Currency\\'.$currency.'\\Mapper';
        if (!class_exists($className)) {
            throw new \Exception('Wrong currency: '.$currency);
        }

        return new $className();
    }

    /**
     * @param string $currency
     *
     * @return RetrieverInterface
     *
     * @throws \Exception
     */
    public function createRetriever(string $currency): RetrieverInterface
    {
        $curlHelper = new CurlHelper();

        $className = 'App\\Currency\\'.$currency.'\\Retriever';
        if (!class_exists($className)) {
            throw new \Exception('Wrong currency: '.$currency);
        }

        return new $className($curlHelper);
    }
}
