<?php

namespace App\Currency\GBP;

use App\Currency\RetrieverInterface;
use App\Helper\CurlHelper;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Retriever.
 */
class Retriever implements RetrieverInterface
{
    const START_TOKEN = '"dataProvider":';

    const END_TOKEN = '</script>';

    const REPLACE_BOTTOM = ',]});';

    const START_YEAR = 1998;

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
        $endYear = (int) date('Y') + 1;
        $url = 'https://www.bankofengland.co.uk/boeapps/database/fromshowcolumns.asp?Travel=NIxAZxSUx&FromSeries=1&ToSeries=50&DAT=RNG&FD=1&FM=Jan&FY='.self::START_YEAR.'&TD=31&TM=Dec&TY='.$endYear.'&FNY=Y&CSVF=TT&html.x=66&html.y=26&SeriesCodes=XUDLUSS&UsingCodes=Y&Filter=N&title=XUDLUSS&VPD=Y#';

        $result = $this->curlHelper->sendRequest($url, Request::METHOD_GET);

        $startPos = strpos($result, self::START_TOKEN);
        $parsed = substr($result, $startPos);

        $endPos = strpos($parsed, self::END_TOKEN);
        $parsed = substr($parsed, 0, $endPos);

        $parsed = str_replace(' ', '', $parsed);
        $parsed = str_replace("\t", '', $parsed);
        $parsed = str_replace("\n", '', $parsed);
        $parsed = str_replace("\r", '', $parsed);
        $parsed = str_replace(self::START_TOKEN, '', $parsed);
        $parsed = str_replace(self::REPLACE_BOTTOM, ']', $parsed);

        $data = json_decode($parsed, true);

        return $data;
    }
}
