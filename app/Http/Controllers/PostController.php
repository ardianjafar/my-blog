<?php

namespace App\Http\Controllers;

use App\Models\{Category,Tag,Post};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statusSelected = in_array($request->get('status'),['publish','draft']) ? $request->get('status') : "publish";
        $posts = $statusSelected == "publish" ? Post::publish() : Post::draft();
        if($request->get('keyword')){
            $posts->search($request->get('keyword'));
        }
        return view('admin.posts.index', [
            'posts' => $posts->paginate(10)->withQueryString(),
            'statuses' => $this->statuses(),
            'statusSelected'    => $statusSelected
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', [
            'categories'    => Category::with('descendants')->onlyParent()->get(),
            'statuses'      => $this->statuses()

        ]);
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
                "title"         => ['required','string','max:60'],
                "slug"          => ['required','string','unique:posts,slug'],
                "thumbnail"     => ['required'],
                "description"   => ['required','string','max:240'],
                "content"       => ['required'],
                "category"      => ['required'],
                "tag"           => ['required'],
                "status"        => ['required'],
            ]);

        if($validator->fails()){
            if($request['tag']){
                $request['tag'] = Tag::select('id','title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $post = Post::create([
                'title'         => $request->title,
                'slug'          => $request->slug,
                'thumbnail'     => parse_url($request->thumbnail)['path'],
                'description'   => $request->description,
                'content'       => $request->content,
                'status'        => $request->status,
                'user_id'       => Auth::user()->id
            ]);

            $post->tags()->attach($request->tag);
            $post->categories()->attach($request->category);

            Alert::success("Tambah Post","Berhasil");
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error("Tambah Post","Gagal".  $th->getMessage());
            if($request['tag']){
                $request['tag'] = Tag::select('id','title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
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
        $post = Post::findOrFail($id);
        $categories = $post->categories;
        $tags = $post->tags;
        return view('admin.posts.detail', [
            'post' => $post,
            'categories' => $categories,
            'tags'  => $tags
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit',[
            'post' => $post,
            'categories'    => Category::with('descendants')->onlyParent()->get(),
            'statuses'      => $this->statuses()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "title"         => ['required','string','max:60'],
                "slug"          => ['required','string','unique:posts,slug,' . $post->id ],
                "thumbnail"     => ['required'],
                "description"   => ['required','string','max:240'],
                "content"       => ['required'],
                "category"      => ['required'],
                "tag"           => ['required'],
                "status"        => ['required'],
            ]);

        if($validator->fails()){
            if($request['tag']){
                $request['tag'] = Tag::select('id','title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $post->update([
                'title'         => $request->title,
                'slug'          => $request->slug,
                'thumbnail'     => parse_url($request->thumbnail)['path'],
                'description'   => $request->description,
                'content'       => $request->content,
                'status'        => $request->status,
                'user_id'       => Auth::user()->id
            ]);

            $post->tags()->sync($request->tag);
            $post->categories()->sync($request->category);

            Alert::success("Edit Post","Berhasil");
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error("Edit Post","Gagal".  $th->getMessage());
            if($request['tag']){
                $request['tag'] = Tag::select('id','title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        DB::beginTransaction();
        try {
            $post->tags()->detach();
            $post->categories()->detach();
            $post->delete();
            Alert::success("Hapus Post","Berhasil");
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error("Hapus Post","Gagal".  $th->getMessage());
        } finally {
            DB::commit();
            return redirect()->back();
        }
    }


    private function statuses()
    {
        return [
            'draft'     => 'Draft',
            'publish'   => 'Publish'
        ];
    }
}
