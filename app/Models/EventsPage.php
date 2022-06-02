<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventsPage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events_pages';

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
    protected $fillable = ['title', 'description', 'title_seo', 'description_seo'];

    
}
