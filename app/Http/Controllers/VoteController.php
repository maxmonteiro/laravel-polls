<?php

namespace App\Http\Controllers;

use App\Option;
use App\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votes = Vote::all();
        return $votes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $option_id = $request->input('option_id');
        Option::findOrFail($option_id);
        $vote = new Vote;
        $vote->option_id = $option_id;

        if($vote->save()) {
            return $vote;
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
        $vote = Vote::findOrFail($id);
        return $vote;
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
        $option_id = $request->input('option_id');
        Option::findOrFail($option_id);
        $vote = Vote::findOrFail($id);
        $vote->option_id = $option_id;

        if($vote->save()) {
            return $vote;
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
        $vote = Vote::findOrFail($id);
        $vote->delete();

        return $vote;
    }
}
