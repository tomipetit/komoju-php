<?php

namespace Tomipetit\Komoju;

abstract class BaseClass
{
    protected $secretKey;

    public function __construct($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    protected function post(string $url, object $data = null)
    {
        $ch = curl_init();
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query((array) $data));
        }
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $this->secretKey);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $buf = curl_exec($ch);
        curl_close($ch);

        return json_decode($buf);
    }
    protected function get(string $url, object $data)
    {
        $url = $data ? $url . "?" . http_build_query((array) $data) : $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $this->secretKey);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $buf = curl_exec($ch);
        curl_close($ch);

        return json_decode($buf);
    }
    protected function patch(string $url, object $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query((array) $data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $this->secretKey);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $buf = curl_exec($ch);
        curl_close($ch);

        return json_decode($buf);
    }
    protected function delete(string $url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $this->secretKey);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $buf = curl_exec($ch);
        curl_close($ch);

        return json_decode($buf);
    }

    protected function error($value)
    {
        return json_encode(["error" => $value]);
    }
}
