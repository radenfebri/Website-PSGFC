<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeris = Galeri::orderBy('created_at','DESC')->paginate(5);
        return view('galeri.index', compact('galeris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('galeri.create');
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
            'gambar_galeri' => 'required|mimes:jpg,jpeg,png,bmp',
        ]);

        if (!empty($request->file('gambar_galeri'))) {
            $data = $request->all();
            $data['gambar_galeri'] = $request->file('gambar_galeri')->store('galeri');

            Galeri::create($data);

            Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
            return redirect()->route('galeri.index');
        }else{
            $data = $request->all();
            Galeri::create($data);

            Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
            return redirect()->route('galeri.index');
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
        //
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
        //
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

        $galeris = Galeri::find($id);

        Storage::delete($galeris->gambar_galeri);
        $galeris->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');
        return redirect()->route('galeri.index');
    }
}
