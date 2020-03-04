<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
        return view('home',compact('doctors')); //['doctors' => $doctors] <=> compact('doctors') 
    }
    
    public function contact()
    {
        return view('contact');
    }

    public function services()
    {
        return view('services');
    }

    public function news()
    {
        // Model methods Model::get() hammasini = massiv
        //Model::get = massiv qaytaradi
        //Model::paginate() = massiv
        //Model::first()
        $posts = Post::orderBy('id', 'DESC')->paginate(2);
        $links = $posts->links();
        
        return view('news', compact('posts', 'links'));
    }

    public function newsMore($id)
    {
        $post = Post::findOrFail($id);
        // dd($post);

        return view('news-more', [
            'post' => $post
        ]);
    }
}
