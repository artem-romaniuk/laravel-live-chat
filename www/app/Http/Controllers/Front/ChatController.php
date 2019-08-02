<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function chat()
    {
        return view('front.chat.index');
    }
}
