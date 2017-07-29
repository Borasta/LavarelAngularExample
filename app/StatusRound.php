<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusRound extends Model
{
    protected $fillable = [
        'status',
    ];

		public function rounds()
    {
        return $this->hasMany('App\Round');
    }
}
