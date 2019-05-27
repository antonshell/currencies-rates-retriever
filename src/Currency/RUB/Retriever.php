<?php

namespace App\Currency\RUB;

use App\Currency\RetrieverInterface;
use App\Helper\CurlHelper;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Retriever.
 */
class Retriever implements RetrieverInterface
{
    const START_YEAR = 1998;

    const START_TOKEN = '<table class="data" xmlns:XsltBlock="urn:XsltBlock">';

    const END_TOKEN = '<div class="history_of_valute" xmlns:XsltBlock="urn:XsltBlock">';

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
        $url = 'https://www.cbr.ru/currency_base/dynamics/?UniDbQuery.Posted=True&UniDbQuery.mode=1&UniDbQuery.date_req1=&UniDbQuery.date_req2=&UniDbQuery.VAL_NM_RQ=R01235&UniDbQuery.FromDate=31.12.'.self::START_YEAR.'&UniDbQuery.ToDate=24.08.'.$endYear;

        $result = $this->curlHelper->sendRequest($url, Request::METHOD_GET);

        $startPos = strpos($result, self::START_TOKEN);
        $parsed = substr($result, $startPos);

        $endPos = strpos($parsed, self::END_TOKEN);
        $parsed = substr($parsed, 0, $endPos);

        $parsed = '<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>'.$parsed.'</body></html>';

        $data = $this->htmlToArray($parsed);
        $data = $data['children'][1]['children'][0]['children'];
        $data = array_slice($data, 2);

        return $data;
    }

    /**
     * @param $html
     *
     * @return array
     */
    private function htmlToArray($html): array
    {
        $dom = new \DOMDocument();
        $dom->loadHTML($html);

        return $this->elementToArray($dom->documentElement);
    }

    /**
     * @param $element
     *
     * @return array
     */
    private function elementToArray($element): array
    {
        $obj = ['tag' => $element->tagName];
        foreach ($element->attributes as $attribute) {
            $obj[$attribute->name] = $attribute->value;
        }
        foreach ($element->childNodes as $subElement) {
            if (XML_TEXT_NODE == $subElement->nodeType) {
                $obj['html'] = $subElement->wholeText;
            } else {
                $obj['children'][] = $this->elementToArray($subElement);
            }
        }

        return $obj;
    }
}
