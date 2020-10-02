<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Option;
use App\Vote;
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
        }

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
        $poll->views += 1;
        $poll->save();

        $data = array(
            'poll_id' => $poll->poll_id,
            'poll_description' => $poll->poll_description,
            'options' => $poll->options
        );
        return $data;
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

    /**
     * Display the poll status
     *
     * @param [int] $id
     * @return void
     */
    public function pollStatus($id) {
        $poll = Poll::findOrFail($id);
        $options = $poll->options;
        $arr_votes = array();

        foreach ($options as $value) {
            $qty = count($value->votes);
            array_push($arr_votes, [
                'option_id' => $value->option_id,
                'qty' => $qty
            ]);
        }

        $data = array(
            'views' => $poll->views,
            'votes' => $arr_votes
        );

        return $data;
    }
}
