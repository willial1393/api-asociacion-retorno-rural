<?php

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static create(array $all)
 */
class State extends Model
{
    protected $table = 'states';
    protected $guarded = [];
    public $timestamps = false;
}
