<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    //
    public function about(){
        $data = [];
        $data['first'] = 'ali';
        $data['last'] = 'mahmood';
        $aval = 'zabih';
        $dovom = 'kazem';
        return view('pages.about' , $data);
    }

    public function contact()
    {
        $people = [
            'taylor' , 'samir' , 'shahram'
        ];
        return view('pages.contact' , compact('people'));

    }




}
