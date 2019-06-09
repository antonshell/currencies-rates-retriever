<?php

namespace App\Currency;

/**
 * Class CurrencyService.
 */
class CurrencyService
{
    /**
     * @param array $data
     *
     * @param string $endDate
     * @return array
     *
     * @throws \Exception
     */
    public function addMissingDates(array $data, string $endDate): array
    {
        $currentDate = $data[0]['date'];
        $currentRate = $data[0]['rate'];

        $dataMap = $this->getDataMap($data);

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

            if (isset($dataMap[$currentDate])) {
                $currentRate = $dataMap[$currentDate];
            }
        }

        return $results;
    }

    /**
     * @param $data
     * @return array
     */
    private function getDataMap(array $data): array
    {
        $map = [];

        foreach ($data as $row){
            $date = $row['date'];
            $rate = $row['rate'];
            $map[$date] = $rate;
        }

        return $map;
    }
}
