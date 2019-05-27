<?php

namespace App\Currency;

/**
 * Interface RetrieverInterface.
 */
interface RetrieverInterface
{
    /**
     * @return array
     */
    public function retrieve(): array;
}
