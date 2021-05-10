<?php


namespace App\Builders\Product\Providers;


use Illuminate\Support\Collection;

abstract class ProductJson
{
    private $data;

    public function setAttribute(string $key, object $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an
     * array containing the HTTP server response header fields and content.
     * @param $url
     * @param array $options
     * @param bool $proxy
     * @param int $timeout
     * @return mixed
     * @throws \Exception
     */
    function getWebPage($url, $options = [], $proxy = false, $timeout = 30) :array
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);

        $content = curl_exec($ch);
        $err = curl_errno($ch);
        $errmsg = curl_error($ch);
        $page = curl_getinfo($ch);
        curl_close($ch);

        // 429 Too Many Requests
        if ($page['http_code'] == 429) {
            return $this->getWebPage($url, $options, true);
        }

        if($page['http_code'] == "404") {
            $content = '';
            throw new \Exception('Error 404: ' . $url);
        }

        $page['errno'] = $err;
        $page['errmsg'] = $errmsg;
        $page['content'] = $content;

        return $page;
    }
}