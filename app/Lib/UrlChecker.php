<?php

namespace App\Lib;

class UrlChecker
{
    const API_KEY = "AIzaSyAhmcy97eGfwLymWsw1mLrxQm1PUWAR7l0";

    public static function postRequest($url,$data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        return $server_output;
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

        $data = json_encode($data);
        $response = self::postRequest($base_url,$data);
        $response = json_decode($response,true);
        if(!empty($response) && isset($response['matches'])){
            $result = false;
        }

        return $result;
    }
}
