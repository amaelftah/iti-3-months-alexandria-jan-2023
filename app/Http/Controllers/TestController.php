<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $name = 'ahmed';

        return view('test',[
            'xyz' => $name,
        ]);
    }
}
