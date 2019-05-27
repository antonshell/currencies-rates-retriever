<?php

namespace App\Currency;

/**
 * Class CurrencyService.
 */
class CurrencyService
{
    /**
     * @param $data
     *
     * @return array
     *
     * @throws \Exception
     */
    public function addMissingDates($data): array
    {
        $currentDate = $data[0]['date'];
        $currentRate = $data[0]['rate'];
        $endDate = date('Y-m-d');

        $results = [];
        for (;;) {
            $results[] = [
                'date' => $currentDate,
                'rate' => $currentRate,
            ];

            if ($currentDate == $endDate) {
                break;
            }

            $currentDate = (new \DateTime($currentDate))->modify('+1 day')->format('Y-m-d');

            if (isset($data[$currentDate])) {
                $currentRate = $data[$currentDate];
            }
        }

        return $results;
    }
}
