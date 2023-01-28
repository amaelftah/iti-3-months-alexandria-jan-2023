<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $localBooks = [
            'Book 1',
            'Book 2',
        ];

        return view('test',[
            'name' => 'ahmed',
            'books' => $localBooks
        ]);
    }
}
