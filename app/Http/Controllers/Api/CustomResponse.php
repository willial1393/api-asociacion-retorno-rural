<?php

namespace App\Http\Controllers\Api;


class CustomResponse
{
    public $result = true;
    public $status;
    public $mensaje;
    public $error;

    public function get()
    {
        return collect([
            'result' => $this->result,
            'status' => $this->status,
            'message' => $this->mensaje,
            'error' => $this->error
        ]);
    }
}
