<?php

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static create(array $all)
 */
class Config extends Model
{
    protected $table = 'config';
    protected $guarded = [];
    public $timestamps = false;
}
