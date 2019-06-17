<?php

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static create(array $all)
 */
class User extends Model
{
    protected $table = 'users';
    protected $guarded = [];
    public $timestamps = false;
}
