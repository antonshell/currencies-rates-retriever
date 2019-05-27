<?php

namespace App\Currency\EUR;

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
        $url = 'https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/usd.xml';
        $result = $this->curlHelper->sendRequest($url, Request::METHOD_GET);

        $xml = simplexml_load_string($result);
        $json = json_encode($xml);
        $array = json_decode($json, true);

        return $array;
    }
}
