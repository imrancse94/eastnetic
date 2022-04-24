<?php

namespace App\Lib;
use Illuminate\Support\Facades\Http;

class UrlChecker
{
    const API_KEY = "AIzaSyAhmcy97eGfwLymWsw1mLrxQm1PUWAR7l0";

    public static function postRequest($url,$data)
    {
       $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($url,$data);

        return json_decode((string) $response->getBody(), true);
    }


    public static function isValidURL($url){
        $result = true;
        $base_url =  "https://safebrowsing.googleapis.com/v4/threatMatches:find?key=".self::API_KEY;
        $data = array(
            "client" => array(
                "clientId" => "yourcompanyname",
                "clientVersion" => "1.5.2"
            ),
            "threatInfo" => array(
                "threatTypes" => ["MALWARE"],
                "platformTypes" => array("WINDOWS"),
                "threatEntryTypes" => array("URL"),
                "threatEntries" => array(
                    array(
                        "url" => $url
                    )
                )
            )
        );

        $response = self::postRequest($base_url,$data);
        if(!empty($response) && isset($response['matches'])){
            $result = false;
        }

        return $result;
    }
}
