<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Option;
use Illuminate\Http\Request;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::all();
        return $polls;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poll = new Poll;
        $poll->poll_description = $request->input('poll_description');
        $options = $request->input('options');

        $arr_options = array();
        foreach ($options as $value) {
            array_push($arr_options, ['option_description' => $value]);
        };

        if ($poll->save()) {
            $poll->options()->createMany($arr_options);
            $data = array(
                'poll_id' => $poll->poll_id
            );
            return $data;
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
        $poll = Poll::findOrFail($id);
        $poll->options;

        $poll->views += 1;
        $poll->save();

        return $poll;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poll = Poll::findOrFail($id);
        $poll->delete();

        return $poll;
    }
}
