<?php

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static create(array $all)
 */
class Project extends Model
{
    protected $table = 'projects';
    protected $guarded = [];
    public $timestamps = false;
}
