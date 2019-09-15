<?php

namespace App\Currency\CAD;

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
        $rows = $data['observations'];
        foreach ($rows as $row) {
            $results[] = [
                'date' => $row['d'],
                'rate' => $row['FXUSDCAD']['v'],
            ];
        }

        return $results;
    }
}
