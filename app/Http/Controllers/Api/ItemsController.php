<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function get()
    {
        $res = new CustomResponse();
        try {
            $res->mensaje = Item::all();
        } catch (\Exception $e) {
            $res->result = false;
            $res->error = $e->getMessage();
        }
        return $res->get();
    }

    public function insert(Request $request)
    {
        $res = new CustomResponse();
        try {
            $res->mensaje = Item::all();
        } catch (\Exception $e) {
            $res->result = false;
            $res->error = $e->getMessage();
        }
        return $res->get();
    }
}
