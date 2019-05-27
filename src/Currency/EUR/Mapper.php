<?php

namespace App\Currency\EUR;

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
        $rows = $data['DataSet']['Series']['Obs'];
        foreach ($rows as $row) {
            $attributes = $row['@attributes'];
            $results[] = [
                'date' => $attributes['TIME_PERIOD'],
                'rate' => $attributes['OBS_VALUE'],
            ];
        }

        return $results;
    }
}
