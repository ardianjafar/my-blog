<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tag_show',['only' => 'index']);
        $this->middleware('permission:tag_create',['only' => ['create','store']]);
        $this->middleware('permission:tag_update',['only' => ['edit','update']]);
        $this->middleware('permission:tag_delete',['only' => 'destroy']);
    }

    private $perPage = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = $request->get('keyword')
        ? Tag::search($request->keyword)->paginate($this->perPage)
        : Tag::paginate($this->perPage);
        return view('admin.tags.index',[
            'tags' => $tags->appends(['keyword' => $request->keyword])
        ]);
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
        Validator::make(
            $request->all(),
            [
                'title'     => ['required','string','max:25'],
                'slug'      => ['required','string','unique:tags,slug']
            ],
        )->validate();

        try {
            Tag::create([
                'title'      => $request->title,
                'slug'       => Str::slug($request->title)
            ]);
            Alert::success('Tambah Tag', 'Berhasil');
            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            Alert::error('Tambah Tag','Gagal' . $th->getMessage());
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
        Validator::make(
            $request->all(),
            [
                'title'     => ['required','string','max:25'],
                'slug'      => ['required','string','unique:tags,slug,' . $tag->id]
            ],
        )->validate();

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
            Alert::error('Delete Tag', 'Gagal' . $th->getMessage());
        }
        return redirect()->back();
    }
}
