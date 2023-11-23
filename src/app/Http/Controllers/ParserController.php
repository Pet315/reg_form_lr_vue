<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParserController extends Controller
{

    public function parseData()
    {
        $questions = [[
            'question' => 'a',
            'answers' => ['b'],
            'length' => ['1']
        ]];
        return view('parser', ['questions' => $questions]);
    }
}
