<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:4',
            'link' => 'required|min:4',
            'body' => 'required|min:4',
            'nama_button' => 'required|min:4',
        ]);

        $data = $request->all();
            $data['judul'] = ($request->judul);
            $data['link'] = ($request->link);
            $data['body'] = ($request->body);
            $data['nama_button'] = ($request->nama_button);
            $data['gambar_slide'] = $request->file('gambar_slide')->store('slides');

        Slide::create($data);

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
        return redirect()->route('slide.index');
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

        $slides = Slide::findOrFail($id);
        return view('slide.edit', compact('slides'));
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
        if (empty($request->file('gambar_slide'))) {
            $slides = Slide::find($id);
            $slides->update([
                'judul'=> $request->judul,
                'body'=> $request->body,
                'link' => $request->link,
                'status'=> $request->status,
                'nama_button'=> $request->nama_button,
            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('slide.index');

        } else{
            $slides = Slide::find($id);
            Storage::delete($slides->gambar_slide);
            $slides->update([
                'judul'=> $request->judul,
                'body'=> $request->body,
                'link' => $request->link,
                'status'=> $request->status,
                'nama_button'=> $request->nama_button,
                'gambar_slide' => $request->file('gambar_slide')->store('slide'),
            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('slide.index');
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

        $slides = Slide::find($id);

        Storage::delete($slides->gambar_slide);
        $slides->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');
        return redirect()->route('slide.index');
    }
}
