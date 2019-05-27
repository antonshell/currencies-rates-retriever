<?php

namespace App\Currency\GBP;

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
            $dateTimeObj = \DateTime::createFromFormat('d-m-Y', $row['Date']);
            $date = $dateTimeObj->format('Y-m-d');

            $results[] = [
                'date' => $date,
                'rate' => $row['Value'],
            ];
        }

        return $results;
    }
}
