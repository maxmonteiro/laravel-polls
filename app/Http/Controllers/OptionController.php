<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = Option::all();
        return $options;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $option = new Option;
        $option->option_description = $request->input('option_description');
        $option->poll_id = $request->input('poll_id');

        if($option->save()) {
            return $option;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $option = Option::findOrFail($id);
        return $option;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $option = Option::findOrFail($id);
        $option->option_description = $request->input('option_description');
        $option->poll_id = $request->input('poll_id');

        if($option->save()) {
            return $option;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = Option::findOrFail($id);
        $option->delete();

        return $option;
    }
}
