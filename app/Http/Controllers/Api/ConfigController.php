<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function get()
    {
        $res = new CustomResponse();
        try {
            $res->response = Config::all();
            $res->status = 'ShowAll';
        } catch (\Exception $e) {
            $res->status = 'Error';
            $res->result = false;
            $res->error = $e->getMessage();
        }
        return $res->get();
    }

    public function store(Request $request)
    {
        $res = new CustomResponse();
        try {
            $item = Config::find($request->id);
            if (!$item) {
                $item = Config::create($request->all());
                $res->status = 'Created';
            } else {
                $item->fill($request->all());
                $item->save();
                $res->status = 'Updated';
            }
            $res->response = Config::find($item->id);
        } catch (\Exception $e) {
            $res->status = 'Error';
            $res->result = false;
            $res->error = $e->getMessage();
        }
        return $res->get();
    }

    public function destroy(Request $request)
    {
        $res = new CustomResponse();
        try {
            Config::destroy($request->id);
            $res->status = 'Deleted';
        } catch (\Exception $e) {
            $res->status = 'Error';
            $res->result = false;
            $res->error = $e->getMessage();
        }
        return $res->get();
    }
}
