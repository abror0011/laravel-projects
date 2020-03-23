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
        // $posts = Post::orderBy('id', 'DESC')->paginate(2);
        $posts = Post::latest()->paginate(2);
        $links = $posts->links();
        
        return view('news', compact('posts', 'links'));
    }

    public function newsMore($id)
    {
        $post = Post::findOrFail($id);
        $post->increment('views');
        // dd($post);

        $most_viewed = Post::mostViews()->get();

        return view('news-more', [
            'post' => $post,
            'most_posts' => $most_viewed
        ]);
    }

    public function search(Request $request)
    {
        //SQL code:
        //SELECT * FROM `posts` 
        //WHERE `title` LIKE '%sar%' OR `short` LIKE '%sar%' OR `content` LIKE '%Sar%'
        $key = $request->get('key');
        $key = '%'.trim($key).'%';
        $results = Post::where('title', 'LIKE', $key)
                       ->orWhere('short', 'LIKE', $key)
                       ->orWhere('content', 'LIKE', $key)
                       ->paginate(10);
        // dd($results->toSql());
        $links = $results->links();

        return view('search', compact('results', 'links'));
    }
}
