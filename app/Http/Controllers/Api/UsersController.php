<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        $res = new CustomResponse();
        try {
            $res->response = DB::select('call login(?, ?)',
                [$request->username, $request->password]);
            $res->status = 'Login';
        } catch (\Exception $e) {
            $res->status = 'Error';
            $res->result = false;
            $res->error = $e->getMessage();
        }
        return $res->get();
    }

    public function get()
    {
        $res = new CustomResponse();
        try {
            $res->response = User::all();
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
            $item = User::find($request->id);
            if (!$item) {
                $item = User::create($request->all());
                $res->status = 'Created';
            } else {
                $item->fill($request->all());
                $item->save();
                $res->status = 'Updated';
            }
            $res->response = User::find($item->id);
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
            User::destroy($request->id);
            $res->status = 'Deleted';
        } catch (\Exception $e) {
            $res->status = 'Error';
            $res->result = false;
            $res->error = $e->getMessage();
        }
        return $res->get();
    }
}
