<?php

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static create(array $all)
 */
class Item extends Model
{
    protected $table = 'items';
    protected $guarded = [];
    public $timestamps = false;

    public function icon()
    {
        return $this->belongsTo(Icon::class);
    }
}
