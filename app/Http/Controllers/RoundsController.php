<?php

namespace App\Http\Controllers;

use App\Round;
use App\Office;
use Illuminate\Http\Request;
use App\Http\Requests\RoundRequest;
use Illuminate\Contracts\Validation\Validator;

class RoundsController extends Controller
{

	/**
     * Display a listing of the resource paginate.
     *
     * @param  int  $each
     * @return Round[]
     */
    private function paginate($each = 5)
    {
        return Round::with([
        	'office', 
        	'employee', 
        	'status_round'
        ])->paginate($each);
    }

    /**
     * Display a listing of resources that match name like $q and paginate.
     *
     * @param  int  $each
     * @param  string  $q
     * @return \Illuminate\Http\Response
     */
    public function search($each = 5, $q = '')
    {
		if($q == '')
    		return $this->paginate($each);
    	else
			return Round::with([
	        	'office', 
	        	'employee', 
	        	'status_round'
	        ])->whereHas('office', function ($query) use ($q) {
			    $query->where('name', 'ilike', '%'.strtolower($q).'%');
			})->paginate($each);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RoundRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoundRequest $request)
    {
		$round = new Round($request->all());
        $round->save();
        return response()->json(["id" => $round->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$round = Round::find($id);
    	$round->employee;
    	$round->status_round;
        return $round;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Round::destroy($id);
    }

}
