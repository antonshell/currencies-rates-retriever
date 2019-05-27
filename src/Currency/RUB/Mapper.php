<?php

namespace App\Currency\RUB;

use App\Currency\MapperInterface;

/**
 * Class Mapper.
 */
class Mapper implements MapperInterface
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function map(array $data): array
    {
        $results = [];

        foreach ($data as $row) {
            $date = $row['children'][0]['html'];
            $dateTimeObj = \DateTime::createFromFormat('d.m.Y', $date);
            $date = $dateTimeObj->format('Y-m-d');

            $rate = $row['children'][2]['html'];
            $rate = str_replace(',', '.', $rate);

            $results[] = [
                'date' => $date,
                'rate' => $rate,
            ];
        }

        return $results;
    }
}
