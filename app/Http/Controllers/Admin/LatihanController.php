<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Latihan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class LatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latihans = Latihan::orderBy('created_at','DESC')->paginate(5);
        return view('latihan.index', compact('latihans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('latihan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'tempat' => 'required',
            'tanggal_waktu' => 'required',
        ]);

        Latihan::create([
            'tempat' => request('tempat'),
            'tanggal_waktu' => request('tanggal_waktu'),
        ]);

        return redirect()->route('latihan.index');

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

        $latihans = Latihan::findOrFail($id);
        return view('latihan.edit', compact('latihans'));
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
        $data = $request->all();
        $data['tempat'] = ($request->tempat);
        $data['tanggal_waktu'] = ($request->tanggal_waktu);


        $latihans = Latihan::findOrFail($id);
        $latihans->update($data);

        Alert::info('Berhasil', 'Data Berhasil Di Update');
        return redirect()->route('latihan.index');
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

        $latihans = Latihan::find($id);

        $latihans->delete();
        Alert::success('Berhasil', 'Data Berhasil Di Hapus');
        return redirect()->route('latihan.index');
    }
}
