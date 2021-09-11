<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category_show',['only' => 'index']);
        $this->middleware('permission:category_create',['only' => ['create','store']]);
        $this->middleware('permission:category_update',['only' => ['edit','update']]);
        $this->middleware('permission:category_detail',['only' => 'show']);
        $this->middleware('permission:category_delete',['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories     = Category::with('descendants');
        if($request->has('keyword') && trim($request->keyword)){
            $categories->search($request->keyword);
        } else {
            $categories->onlyParent();
        }
        return view('admin.categories.index', [
            'categories' => $categories->paginate()->appends(['keyword' => $request->get('keyword')])
        ]);
    }

    public function select(Request $request)
    {
        $categories = [];
        if($request->has('q')){
            $search = $request->q;
            $categories = Category::select('id','title')->where('title', 'LIKE', "%$search%")->limit(6)->get();
        }else {
            $categories = Category::select('id','title')->onlyParent()->limit(6)->get();
        }
        return response()->json($categories);
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
        $validator = Validator::make(
            $request->all(),
            [
                'title'         => ['required','string','max:60'],
                'slug'          => ['required','string','unique:categories,slug'],
                'thumbnail'     => ['required'],
                'description'   => ['required','string','max:240']
            ]);
            if($validator->fails()){
                if($request->has('parent_category')){
                    $request['parent_category']     =  Category::select('id','title')->find($request->parent_category);
                }
                return redirect()->back()->withInput($request->all())->withErrors($validator);
            }

            try {
                Category::create([
                    'title'     => $request->title,
                    'slug'     => $request->slug,
                    'thumbnail'     => parse_url($request->thumbnail)['path'],
                    'description'   => $request->description,
                    'parent_id'     => $request->parent_category,
                ]);
                Alert::success("Tambah Kategori","Berhasil di tambahkan");
                return redirect()->route('category.index');
            } catch (\Throwable $th) {
                if($request->has('parent_category')){
                    $request['parent_category'] = Category::select('id','title')->find($request->parent_category);
                }
                Alert::error("Tambah Kategori","Gagal" .   $th->getMessage());
                return redirect()->back()->withInput($request->all());
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

        return view('admin.categories.detail', compact('category'));
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
    public function update(Request $request,Category $category)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title'         => ['required','string','max:60'],
                'slug'          => ['required','string','unique:categories,slug,' . $category->id],
                'thumbnail'     => ['required'],
                'description'   => ['required','string','max:240']
            ]);
        if($validator->fails()){
            if($request->has('parent_category')){
                $request['parent_category']     =  Category::select('id','title')->find($request->parent_category);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            $category->update([
                'title'     => $request->title,
                'slug'     => $request->slug,
                'thumbnail'     => parse_url($request->thumbnail)['path'],
                'description'   => $request->description,
                'parent_id'     => $request->parent_category,
            ]);
            Alert::success("Update Kategori","Berhasil");
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            if($request->has('parent_category')){
                $request['parent_category'] = Category::select('id','title')->find($request->parent_category);
            }
            Alert::error("Update Kategori","Gagal" .   $th->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            Alert::success("Hapus Data", "Berhasil");
        } catch (\Throwable $th) {
            Alert::error("Hapus Data", "Gagal" . $th->getMessage());
        }
        return redirect()->back();
    }
}
