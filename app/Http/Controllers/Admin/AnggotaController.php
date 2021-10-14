<?php

namespace App\Http\Controllers\Admin;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggotas = Anggota::orderBy('created_at','DESC')->paginate(5);
        return view('anggota.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('anggota.create');
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
            'nama' => 'required|min:4',
            'jabatan' => 'required|min:4',
            'body' => 'required|min:4',
        ]);

        $data = $request->all();
            $data['nama'] = ($request->nama);
            $data['jabatan'] = ($request->jabatan);
            $data['body'] = ($request->body);
            $data['foto_anggota'] = $request->file('foto_anggota')->store('anggota');

        Anggota::create($data);

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
        return redirect()->route('anggota.index');
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

        $anggotas = Anggota::findOrFail($id);
        return view('anggota.edit', compact('anggotas'));
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
        if (empty($request->file('foto_anggota'))) {
            $anggotas = Anggota::find($id);
            $anggotas->update([
                'nama'=> $request->nama,
                'jabatan'=> $request->jabatan,
                'body'=> $request->body,

            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('anggota.index');

        } else{
            $anggotas = Anggota::find($id);
            Storage::delete($anggotas->gambar_artikel);
            $anggotas->update([
                'nama'=> $request->nama,
                'jabatan'=> $request->jabatan,
                'body'=> $request->body,
                'foto_anggota' => $request->file('foto_anggota')->store('anggota'),
            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('anggota.index');
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

        $anggotas = Anggota::find($id);

        Storage::delete($anggotas->foto_anggota);
        $anggotas->delete();
        Alert::success('Berhasil', 'Data Berhasil Di Hapus');
        return redirect()->route('anggota.index');
    }
}
