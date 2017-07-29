<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
    ];

	public function rounds()
    {
        return $this->hasMany('App\Round');
    }

}
