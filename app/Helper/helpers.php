<?php

if (!function_exists('getimagesizefromstring')) {
    function getimagesizefromstring($data)
    {
        $uri = 'data://application/octet-stream;base64,' . base64_encode($data);
        return getimagesize($uri);
    }
}

if (!function_exists('getBase64ImageSize')) {
    function getBase64ImageSize($base64Image){ //return memory size in B, KB, MB
        try{
            $size_in_bytes = (int) (strlen(rtrim($base64Image, '=')) * 3 / 4);
            $size_in_kb    = $size_in_bytes / 1024;
            $size_in_mb    = $size_in_kb / 1024;

            return $size_in_mb;
        }
        catch(Exception $e){
            return $e;
        }
    }
}


if (!function_exists('get_base_url')) {
    function get_base_url(){
        return str_replace('public','',url('/'));
    }
}
