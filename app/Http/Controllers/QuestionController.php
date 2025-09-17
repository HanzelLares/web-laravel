<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show(Question $question) //Consulta una pregunta por su ID
    {
        // return view('questions.show', compact('question'));

        $question->load('answers', 'category', 'user'); //el load es para cargar relaciones que no se cargaron en la consulta inicial
       
        return view('questions.show', [
            'question' => $question,
        ]); //Es lo mismo que comnpact('questions') solo que mas explicito
    }
}   
