<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'features';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
}
