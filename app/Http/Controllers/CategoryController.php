<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,
        [
            'title'          => ['required','max:25', 'min:3','string','unique:categories,title'],
            'thumbnail'     => ['required'],
            'description'   => ['required']
        ]);


        $category = Category::create([
            'title'         => $request->title,
            'slug'          => Str::slug($request->title),
            'thumbnail'     => parse_url($request->thumbnail)['path'],
            'description'   => $request->description
        ]);

        if($category){
            $alert = Alert::success('Tambah Kategori', 'Berhasil');
            return redirect()->route('category.index')->with(['Alert' => $alert]);
        }else {
            return "Gagal";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categories = Category::findOrFail($category->id);
        return view('admin.categories.detail', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $this->validate($request,[
            'title'          => ['required','max:25', 'min:3','string','unique:categories,title,' . $category->id],
            'thumbnail'     => ['required'],
            'description'   => ['required']
        ]);
        $category = Category::findOrFail($category->id);
        $category->update([
            'title'     => $request->title,
            'slug'     => Str::slug($request->title),
            'thumbnail'     => parse_url($request->thumbnail)['path'],
            'description'   => $request->description
        ]);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        if($category){
            $alert = Alert::success('Data Category', 'Berhasil Di Hapus');
            return redirect()->route('category.index')->with(['Alert' => $alert]);
        }else{
            return "Gagal";
        }
    }
}
