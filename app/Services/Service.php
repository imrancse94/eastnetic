<?php

namespace App\Services;

class Service{

    public $status_message;
    public $status_code;
    public $response_data;

    public function __construct()
    {
       $this->response_data = [];
       $this->status_message = "";
       $this->status_code = config('status_code.SUCCESS_CODE');
    }
}
