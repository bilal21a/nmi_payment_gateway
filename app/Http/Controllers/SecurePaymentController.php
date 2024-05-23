<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurePaymentController extends Controller
{
    public function step_1()
    {
        return view('3ds.step1');
    }
    public function step_2(Request $request)
    {
        $data['data']=$request;
        return view('3ds.step2',$data);
    }

    public function test()
    {
        return view('test');
    }
}
