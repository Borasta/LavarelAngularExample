<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $fillable = [
        'office_id', 
        'employee_id',
        'status_round_id',
    ];

	public function office()
    {
        return $this->belongsTo('App\Office');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function status_round()
    {
        return $this->belongsTo('App\StatusRound');
    }

}
