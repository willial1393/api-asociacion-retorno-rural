<?php

namespace App\Http\Controllers\Api;


class CustomResponse
{
    public $result = true;
    public $mensaje;
    public $error;

    public function get()
    {
        return collect([
            'result' => $this->result,
            'message' => $this->mensaje,
            'error' => $this->error
        ]);
    }
}
