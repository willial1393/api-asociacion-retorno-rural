<?php

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static create(array $all)
 */
class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];
    public $timestamps = false;
}
