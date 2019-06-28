<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poll;
use Validator;

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
        $rules = [
            'title' => 'required|max:10',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
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
