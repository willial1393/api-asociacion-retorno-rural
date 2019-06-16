<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Models\State;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    public function get()
    {
        $res = new CustomResponse();
        try {
            $res->response = State::all();
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
            $item = State::find($request->id);
            if (!$item) {
                $item = State::create($request->all());
                $res->status = 'Created';
            } else {
                $item->fill($request->all());
                $item->save();
                $res->status = 'Updated';
            }
            $res->response = State::find($item->id);
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
            State::destroy($request->id);
            $res->status = 'Deleted';
        } catch (\Exception $e) {
            $res->status = 'Error';
            $res->result = false;
            $res->error = $e->getMessage();
        }
        return $res->get();
    }
}
