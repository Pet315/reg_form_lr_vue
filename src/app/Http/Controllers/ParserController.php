<?php

namespace App\Http\Controllers;
use App\Models\Crossword;
use Illuminate\Http\Request;

class ParserController extends Controller
{

    public function parseData()
    {
        $paginator = Crossword::simplePaginate(100);
        $crossword = $paginator->all();

        return view('parser', ['crossword' => $crossword, 'paginator' => $paginator]);
    }
}
