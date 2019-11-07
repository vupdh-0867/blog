<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Model\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changeLanguage($language)
    {
        \Session::put('lang', $language);

        return redirect()->back();
    }

    public function index(Request $request)
    {
        $posts = Post::newest()->with('user')->with('comments')->paginate(3);
        return view('home', compact('posts'));
    }

    public function getUser(Request $request){
        return $request->user();
    }

    public function welcome(){
        return view('static_pages.welcome');
    }
}
