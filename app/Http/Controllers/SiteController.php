<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home() 
    {
        $doctors = [
            ['name' => 'John Doe', 'type' => 'Stom'],
            ['name' => 'Buster Keaton', 'type' => 'Lor'],
            ['name' => 'Zafar', 'type' => 'Test'],
            ['name' => 'Nodir', 'type' => 'Test 2'],
        ];
        return view('home', compact('doctors')); //['doctors' => $doctors] <=> compact('doctors') 
    }
    
    public function contact()
    {
        return view('contact');
    }
}
