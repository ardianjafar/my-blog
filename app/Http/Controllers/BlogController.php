<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post,Category,Tag, User};

class BlogController extends Controller
{
    private $perPage = 15;

    public function index()
    {
        return view('frontend.home');
    }

    public function content()
    {
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title  = "in" . $category->slug;
        }

        if(request('author')){
            $author = User::firstWhere('slug', request('author'));
            $title  = "in" . $author->name;
        }
        return view('frontend.blog-content',[
            'title'     => "Cari Postingan" . $title,
            'posts' => Post::publish()->latest()->paginate($this->perPage)
        ]);
    }

    public function detail($slug)
    {
        $post = Post::publish()->where('slug', $slug)->first();
        if(!$post){
            return redirect()->route('blog.content');
        }
        return view('frontend.blog-detail',[
            'post'  => $post,
        ]);


    }

    public function showPostByCategory($slug)
    {
        $posts = Post::publish()->whereHas('categories',function($query)use ($slug){
            return $query->where('slug', $slug);
        })->paginate($this->perPage);


        $category = Category::where('slug', $slug)->first();
        $categoryRoot =  $category->root();
        return view('frontend.blog-category-bypost',[
            'posts' => $posts,
            'category'  => $category,
            'categoryRoot' => $categoryRoot,
        ]);
    }

    public function category()
    {
        return view('frontend.blog-category',[
            'categories'    => Category::onlyParent()->paginate($this->perPage)
        ]);
    }

    public function authors()
    {
        # code...
    }

    public function about(){
        return view('frontend.about');
    }
}
