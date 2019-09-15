<?php

namespace App\Currency\CAD;

use App\Currency\RetrieverInterface;
use App\Helper\CurlHelper;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Retriever.
 */
class Retriever implements RetrieverInterface
{
    /**
     * @var CurlHelper
     */
    private $curlHelper;

    /**
     * Retriever constructor.
     *
     * @param CurlHelper $curlHelper
     */
    public function __construct(
        CurlHelper $curlHelper
    ) {
        $this->curlHelper = $curlHelper;
    }

    /**
     * @return array
     */
    public function retrieve(): array
    {
        $url = 'https://www.bankofcanada.ca/valet/observations/group/FX_RATES_DAILY/json?start_date=2015-01-03';
        $result = $this->curlHelper->sendRequest($url, Request::METHOD_GET);
        $array = json_decode($result, true);

        return $array;
    }
}
