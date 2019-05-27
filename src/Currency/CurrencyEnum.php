<?php

namespace App\Currency;

/**
 * Class CurrencyEnum.
 */
class CurrencyEnum
{
    public const EUR = 'EUR';
    public const GBP = 'GBP';
    public const RUB = 'RUB';

    /**
     * @return string[]
     */
    public static function getValues(): array
    {
        return [
            self::EUR,
            self::GBP,
            self::RUB,
        ];
    }
}
