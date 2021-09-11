<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post,Category,Tag, User};

class BlogController extends Controller
{
    public function index()
    {
        return "Oke";
    }

    public function content()
    {

        // dd(Post::publish()->latest()->filter(request(['search','categories','author']))->paginate(15)->withQueryString());
        // return Post::publish()->latest()->filter(request(['search','categories','author']))->paginate(15)->withQueryString();
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
            // 'posts' => Post::publish()->latest()->filter(request(['search','categories','author']))->where('categories')->get(),
            'posts' => Post::publish()->latest()->paginate(15)
        ]);
    }

    public function detail($slug)
    {
        $post = Post::publish()->where('slug', $slug)->first();
        // $posts = Post::where('category_id', $post->category_id)->latest()->limit(10)->get();
        if(!$post){
            return redirect()->route('blog.content');
        }

        return view('frontend.blog-detail',[
            'post'  => $post,
        ]);


    }

    public function category()
    {
        return view('frontend.blog-category',[
            'categories'    => Category::onlyParent()->paginate(10)
        ]);
    }

    public function authors()
    {
        # code...
    }
}
