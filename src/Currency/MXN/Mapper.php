<?php

namespace App\Currency\MXN;

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
        $rows = $data["valores"];
        foreach ($rows as $row) {
            $results[] = [
                'date' => $row[0],
                'rate' => (string)$row[1],
            ];
        }

        return $results;
    }
}
