<?php

namespace App\Currency\MXN;

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
        $url = 'https://www.banxico.org.mx/SieInternet/consultaSerieGrafica.do?s=SF43718,CF102';
        $result = $this->curlHelper->sendRequest($url, Request::METHOD_GET);
        $array = json_decode($result, true);

        return $array;
    }
}
