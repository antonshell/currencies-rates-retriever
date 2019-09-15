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
    public const CAD = 'CAD';
    public const MXN = 'MXN';

    /**
     * @return string[]
     */
    public static function getValues(): array
    {
        return [
            self::EUR,
            self::GBP,
            self::RUB,
            self::CAD,
            self::MXN,
        ];
    }
}
