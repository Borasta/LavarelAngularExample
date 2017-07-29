<?php

namespace App\Http\Controllers;

use App\Alert;
use Illuminate\Http\Request;
use App\Http\Requests\AlertRequest;

class AlertsController extends Controller
{
	/**
     * Display a listing of the resource paginate.
     *
     * @param  int  $each
     * @return Alert[]
     */
    public function paginate($each = 5)
    {
		return Alert::with([
            'status_alert', 
            'office'
        ])->paginate($each);
    }

    /**
     * Display a listing of resources that match description like $q and paginate.
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
			return Alert::with([
                'status_alert', 
                'office'
            ])->where('description', 'ilike', '%'.strtolower($q).'%')
			->paginate($each);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AlertRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlertRequest $request)
    {
        $alert = new Alert($request->all());
        $alert->save();
    	return response()->json(["id" => $alert->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Alert::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Alert::destroy($id);
    }
}
