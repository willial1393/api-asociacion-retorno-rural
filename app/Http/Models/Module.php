<?php

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static create(array $all)
 */
class Module extends Model
{
    protected $table = 'modules';
    protected $guarded = [];
    public $timestamps = false;
}
