<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function get()
    {
        $res = new CustomResponse();
        try {
            $res->response = Product::all();
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
            $item = Product::find($request->id);
            if (strpos($request->image, 'https://asorural.s3.us-east-2.amazonaws.com/') === false) {
                if ($item) {
                    if (strpos($item['image'], 'data:image') === false) {
                        $pathImage = str_replace('https://asorural.s3.us-east-2.amazonaws.com/', '', $item['image']);
                        Storage::disk('s3')->delete($item['image']);
                    }
                }
                $base64_str = substr($request->image, strpos($request->image, ",") + 1);
                $image = base64_decode($base64_str);
                $timestamp = Carbon::now()->getTimestamp();
                Storage::disk('s3')->put("images/productos/{$timestamp}.png", $image);
                $url = Storage::disk('s3')->url("images/productos/{$timestamp}.png");
                $request['image'] = $url;
            } else {
                unset($request['image']);
            }
            if (!$item) {
                $item = Product::create($request->all());
                $res->status = 'Created';
            } else {
                $item->fill($request->all());
                $item->save();
                $res->status = 'Updated';
            }
            $res->response = Product::find($item->id);
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
            Product::destroy($request->id);
            $res->status = 'Deleted';
        } catch (\Exception $e) {
            $res->status = 'Error';
            $res->result = false;
            $res->error = $e->getMessage();
        }
        return $res->get();
    }
}
