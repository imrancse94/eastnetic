<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Link;

class UrlShortenerController extends Controller
{
    public function storeUrl(UrlRequest $request)
    {
        $response = [];
        $data = $request->all();
        try {
            $link = new Link();
            $data['hash'] = $this->unique_strings(6);
            $insertedData = $link->insertUrl($data);
            $message = 'URL has not been shortened successfully';
            $status_code = 101;
            if (!empty($insertedData)) {
                $response['shortener_url'] = url('/') . '/' . $data['hash'];
                $message = 'Url created successfully.';
                $status_code = 100;
            }
        } catch (\Exception $e) {
            $message = 'Something went wrong.';
            $status_code = 102;
        }
        return $this->sendResponse($response, $message,$status_code);
    }

    private function unique_strings($length_of_string) {
        return substr(md5(time()), 0, $length_of_string);
    }

    public function getUrl($hash)
    {
        $link = new Link();
        $data = $link->getLinkByHashKey($hash);
        if(!empty($data)){
            return redirect($data->url);
        }

        return $this->sendResponse([], "URL not found", 404);
    }
}
