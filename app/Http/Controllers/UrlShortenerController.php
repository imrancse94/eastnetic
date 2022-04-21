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
            $message = __('URL has not been shortened successfully');
            $status_code = config('status_code.FAILED_CODE');
            if (!empty($insertedData)) {
                $response['shortener_url'] = get_base_url()."/".$data['hash'] ;
                $message = __('Url created successfully.');
                $status_code = config('status_code.SUCCESS_CODE');
            }
        } catch (\Exception $e) {
            $message = __('Something went wrong.');
            $status_code = config('status_code.UNKNOWN_ERROR');
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

        abort(404,'URL not found');
    }
}
