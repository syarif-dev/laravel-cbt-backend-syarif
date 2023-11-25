<?php

namespace App\Http\Controllers\Api;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\ExamQuestionList;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createExam(Request $request)
    {
        // numeric question
        $numericQuestion = Question::where('category', 'numeric')
            ->inRandomOrder()
            ->limit(20)
            ->get();

        // verbal question
        $verbalQuestion = Question::where('category', 'verbal')
            ->inRandomOrder()
            ->limit(20)
            ->get();

        // logic question
        $logicQuestion = Question::where('category', 'logika')
            ->inRandomOrder()
            ->limit(20)
            ->get();

        $exam = Exam::create([
            'user_id' => $request->user()->id,
        ]);

        foreach ($numericQuestion as $numeric) {
            ExamQuestionList::create([
                'exam_id' => $exam->id,
                'question_id' => $numeric->id,
            ]);
        }

        foreach ($verbalQuestion as $verbal) {
            ExamQuestionList::create([
                'exam_id' => $exam->id,
                'question_id' => $verbal->id,
            ]);
        }

        foreach ($logicQuestion as $logic) {
            ExamQuestionList::create([
                'exam_id' => $exam->id,
                'question_id' => $logic->id,
            ]);
        }

        return response()->json([
            'message' => 'Exam created successfully',
            'data'    => $exam,
        ]);
    }

    // get list by category
    public function getListQuestionByCategory(Request $request)
    {
        $exam = Exam::where('user_id', $request->user()->id)->first();
        $examQuestionList = ExamQuestionList::where('exam_id', $exam->id)->get();

        $questionIds = $examQuestionList->pluck('question_id');

        $question = Question::whereIn('id', $questionIds)
            ->where('category', $request->category)
            ->get();

        return response()->json([
            'message' => 'Get Question Successfully',
            'data'    => QuestionResource::collection($question),
        ]);
    }

    // answer question
    public function answerQuestion(Request $request)
    {
        $validatedData = $request->validate([
            'question_id' => ['required'],
            'answer'      => ['required'],
        ]);

        $exam = Exam::where('user_id', $request->user()->id)->first();
        $examQuestionList = ExamQuestionList::where('exam_id', $exam->id)
            ->where('question_id', $validatedData['question_id'])
            ->first();
        $question = Question::where('id', $validatedData['question_id'])->first();

        // answer check
        if($question->answer == $validatedData['answer']) {
            $examQuestionList->update([
                'correct' => true,
            ]);
        } else {
            $examQuestionList->update([
                'correct' => false,
            ]);
        }

        return response()->json([
            'message' => 'answer save successfully',
            'jawaban' => $examQuestionList->correct,
        ]);
    }
}
