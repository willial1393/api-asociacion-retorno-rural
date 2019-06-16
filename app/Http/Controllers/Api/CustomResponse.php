<?php

namespace App\Http\Controllers\Api;


class CustomResponse
{
    public $result = true;
    public $status;
    public $response;
    public $error;

    public function get()
    {
        return collect([
            'result' => $this->result,
            'status' => $this->status,
            'response' => $this->response,
            'error' => $this->error
        ]);
    }
}
