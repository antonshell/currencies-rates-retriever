<?php

namespace App\Currency;

/**
 * Interface RetrieverInterface.
 */
interface MapperInterface
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function map(array $data): array;
}
