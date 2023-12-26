<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
class SurveyController extends Controller
{
    public function get_surveys()
    {
        $questions = Survey::all();
        return view('survey',[
            'questions' => $questions
        ]);
    }
    public function showAddForm()
    {
        return view('form');
    }

    public function storeSurvey(Request $request)
    {
        Survey::create([
            'question' => $request->question
        ]);
        return redirect('/surveys');
    }

    public function deleteSurvey($id)
    {
        $question = Survey::find($id)->delete();
        return back();
    }
}
