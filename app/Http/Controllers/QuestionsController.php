<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * Will show all the questions that user submits
     * it works like a home page for questions
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //go to the model and get a group of records

        //return the view, and pass in the group of records to loop through
        $questions = Question::all();  //retrieve all records

        return view('questions.index')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     * will show a form for submitting a new question
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('questions.create'); //questions is the folder, and create is the file name of blade php
    }

    /**
     * Store a newly created resource in storage.
     * Once a user submit a new questions, it will 
     * be send here. Get ready to put into the db
     * Storage, here means database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the form date, and make this field required and set up max length to 255 varchar
        $this->validate($request, ['title'=>'required|max:255']);
        
        $question = new Question();
        $question->title = $request->title;
        $question->description = $request->description;

        //if insert is successful then we want to redirect to view to show to the user
        if ($question->save()){
            return redirect()->route('questions.show', $question->id);
        }
        else {
            return redirect()->route('questions.create');
        }
    }

    /**
     * Display the specified resource.
     * view a single/particular question
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //use the model to get 1 record from the database

        //show the view and pass the record to the view
        $question = Question::findOrFail($id); //In case the id is not found

        //return the view with some info, first parameter is the name of the data
        //we want to refer to. Second parameter is the actual data we want to pass into
        return view('questions.show')->with('question', $question); 
    }

    /**
     * Show the form for editing the specified resource.
     * This is just an edit form.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     * Once the edit form is submitted, it will come here for update.
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
     * Delete a question from the database
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
