<?php


namespace App\Helpers;

class ParseXml
{
    public function __construct()
    {
    }

    /**
     * 解析xml 並回傳陣列
     * @param string $xmlUrl
     * @return mixed
     */
    public function parsingXml(string $xmlUrl)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $xmlUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $xmlString = <<<XML
$output
XML;
        if ($statusCode != '404') {
            $xml = simplexml_load_string($xmlString, 'SimpleXMLElement', LIBXML_NOCDATA);
            $json = json_encode($xml);
            return json_decode($json,TRUE);
        } else {
            return [];
        }
    }
}
