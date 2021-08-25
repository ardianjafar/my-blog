<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }
    public function select(Request $request)
    {
        $tags = [];
        if($request->has('q')) {
            $tags = Tag::select('id','title')->search($request->q)->get();
        } else {
            $tags = Tag::select('id','title')->limit(5)->get();
        }

        return response()->json($tags);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'      => ['required','max:25', 'unique:tags'],
        ]);

        try {
            Tag::create([
                'title'      => $request->title,
                'slug'      => Str::slug($request->title)
            ]);
            Alert::success('Tambah Tag', 'Berhasil');
            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            Alert::error('Tambah Tag','Gagal',['error' => $th->getMessage()]);
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request,[
            'title'      => ['required','max:25', 'unique:tags'],
        ]);

        try {
            $tag->update([
                'title'      => $request->title,
                'slug'      => Str::slug($request->title)
            ]);
            Alert::success('Edit Tag', 'Berhasil');
            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            Alert::error('Edit Tag','Gagal',['error' => $th->getMessage()]);
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Tag::findOrFail($id);
        try {
            $blog->delete();
            Alert::success('Delete Tag', 'Berhasil');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Delete Tag', 'Gagal', ['error' => $th->getMessage()]);
            return redirect()->back();
        }
    }
}
