<?php

namespace App\Helper;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class CurlHelper.
 */
class CurlHelper
{
    /**
     * @param string $url
     * @param string $method
     * @param string $data
     * @param array  $headers
     *
     * @return string
     */
    public function sendRequest(string $url, string $method, $data = '', array $headers = []): string
    {
        if (is_array($data)) {
            $data = json_encode($data);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        if (in_array($method, [Request::METHOD_POST, Request::METHOD_PUT])) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if (count($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $result = curl_exec($ch);

        return $result;
    }
}
