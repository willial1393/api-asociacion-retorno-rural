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

    public function item()
    {
        return $this->hasMany(Item::class, 'project_id', 'id')
            ->with('icon');
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function module()
    {
        return $this->hasMany(Module::class, 'project_id', 'id')
            ->with('state');
    }
}
