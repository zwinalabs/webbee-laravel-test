<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	protected $table = 'events';

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
    public function workshops()
    {
        return $this->hasMany('App\Models\Workshop', 'event_id', 'id');
    }

}
