<?php

namespace App\Http\Controllers\Admin;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at','DESC')->paginate(5);
        return view('blog.index',compact('blogs') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'min:3'],
            'gambar_artikel' => 'required|mimes:jpg,jpeg,png,bmp',

        ]);

        $data = $request->all();
            $data['slug'] = Str::slug($request->judul);
            $data['user_id'] = Auth::id();
            $data['gambar_artikel'] = $request->file('gambar_artikel')->store('artikel');

        Blog::create($data);


        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $blogs = Blog::findOrFail($id);

        return view('blog.edit', compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('gambar_artikel'))) {
            $blogs = Blog::find($id);
            $blogs->update([
                'judul'=> $request->judul,
                'body'=> $request->body,
                'slug' => Str::slug($request->judul),
                'is_active'=> $request->is_active,
                'user_id' => Auth::id(),
            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('blog.index');

        } else{
            $blogs = Blog::find($id);
            Storage::delete($blogs->gambar_artikel);
            $blogs->update([
                'judul'=> $request->judul,
                'body'=> $request->body,
                'slug' => Str::slug($request->judul),
                'is_active'=> $request->is_active,
                'user_id' => Auth::id(),
                'gambar_artikel' => $request->file('gambar_artikel')->store('blog'),
            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('blog.index');
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
        abort_if(Gate::denies('delete'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $blogs = Blog::find($id);

        Storage::delete($blogs->gambar_artikel);
        $blogs->delete();
        Alert::success('Berhasil', 'Data Berhasil Di Hapus');
        return redirect()->route('blog.index');
    }
}
