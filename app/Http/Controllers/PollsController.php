<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poll;

class PollsController extends Controller
{
    public function index(){
        return Poll::all();
    }

    public function show($id){
        $poll = Poll::find($id);
        if (is_null($poll)){
            return response()->json(null, 404);
        }
        return Poll::findOrFail($id);
    }

    public function store(Request $request){
        $poll = Poll::create($request->all()); 
        return $poll;
    }

    public function update(Request $request, Poll $poll){
        $poll->update($request->all());
        return $poll;
    }

    public function delete(Request $request, Poll $poll){
        $poll->delete();
        return response()->json(null, 204);
    }
}
