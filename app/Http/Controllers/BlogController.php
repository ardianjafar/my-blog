<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post,Category,Tag};

class BlogController extends Controller
{
    public function index()
    {
        return view('frontend/index');
    }
    public function home()
    {
        return view('frontend/main-blog',[
            'posts' =>  Post::publish()->latest()->paginate($this->perPage)
        ]);
    }

    private $perPage = 10;
    public function content() {

        return view('frontend.blog-content',[
            'posts' =>  Post::publish()->latest()->paginate($this->perPage)
        ]);
    }
}
