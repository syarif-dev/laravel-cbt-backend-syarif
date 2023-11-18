<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $questions = DB::table('questions')
            ->when($request->input('search'), function ($query, $search) {
                return $query->where('question', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        $data = [
            'questions' => $questions,
            'type_menu' => 'question'
        ];

        return view('pages.question.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title'     => 'Create Question',
            'urlAction' => route('question.store'),
            'type_menu' => 'question'
        ];
        return view('pages.question.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionStoreRequest $request)
    {
        $data = $request->all();
        Question::create($data);

        return to_route('question.index')->with('success', 'Question successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        $data = [
            'title'     => 'Edit Question',
            'urlAction' => route('question.update', $question->id),
            'question'  => $question,
            'type_menu' => 'question'
        ];
        return view('pages.question.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionUpdateRequest $request, Question $question)
    {
        $data = $request->validated();
        $question->update($data);
        return to_route('question.index')->with('success', 'Question successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return to_route('question.index')->with('success', 'Question successfully deleted');
    }
}
