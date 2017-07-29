<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'name',
    ];

	public function rounds()
    {
        return $this->hasMany('App\Round');
    }

    public function alerts()
    {
        return $this->hasMany('App\Alert');
    }
}
