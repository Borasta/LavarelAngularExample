<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [
        'description', 
        'office_id',
        'status_alert_id',
    ];

	public function office()
    {
        return $this->belongsTo('App\Office');
    }

    public function status_alert()
    {
        return $this->belongsTo('App\StatusAlert');
    }
}
