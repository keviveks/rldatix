<?php

namespace RLDatix\Lib;

class Remote
{
    public static function request(string $url, string $method = 'GET', array $options = [])
    {
        $curl = curl_init();
        $defaultOptions = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
        ];
        // $curlOptions = array_merge($defaultOptions, $options);
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, $defaultOptions);
        // Send the request & save response to $response
        $response = curl_exec($curl);
        $error = curl_error($curl);
        // Close request to clear up some resources
        curl_close($curl);

        if ($response) {
            return json_decode($response, true);
        } else {
            return $error;
        }
    }
}
