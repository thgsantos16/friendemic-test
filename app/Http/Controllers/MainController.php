<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function reverse(Request $request)
    {
        return view('welcome', ['submittedtext' => $request->text ]);
    }
}