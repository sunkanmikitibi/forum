<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //\DB::enableQueryLog();
        $questions = Question::with('user')->latest()->paginate(5);
        return  view('questions.index', compact('questions'));
        //dd(\DB::getQueryLog());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();
        return view('questions.create', compact('question'));
    }


    public function store(AskQuestionRequest $request)
    {
       $request->user()->questions()->create($request->only('title', 'body'));
       return redirect()->route('questions.index')->with('success', 'Your Question has been submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //dd($question->body);
        $question->increment('views');
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //find the question
       // if(\Gate::denies('update-question', $question))
       // {
       //     abort(403, "Access Denied");

      //  }
        $this->authorize("update", $question);
        return view('questions.edit', compact('question'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {

        //if(\Gate::denies('update-question', $question))
        //{
        //    abort(403, "Access Denied");

        //}
        $this->authorize("update", $question);
        $question->update($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success', 'Your Quesrion Has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //if(\Gate::denies('delete-question', $question))
       // {
       //     abort(403, "Access Denied");

       // }
       $this->authorize("delete", $question);
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Your Question is deleted');
    }
}
