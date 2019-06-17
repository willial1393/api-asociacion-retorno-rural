<?php

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static create(array $all)
 */
class Icon extends Model
{
    protected $table = 'icons';
    protected $guarded = [];
    public $timestamps = false;
}
