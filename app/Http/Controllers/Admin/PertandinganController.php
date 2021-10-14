<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pertandingan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertandingans = Pertandingan::orderBy('created_at','DESC')->paginate(5);
        return view('pertandingan.index', compact('pertandingans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('pertandingan.create');
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
            'gambar_team1' => 'required|mimes:jpg,jpeg,png,bmp',
            'gambar_team2' => 'required|mimes:jpg,jpeg,png,bmp',

        ]);

        if (!empty($request->file('gambar_team1', 'gambar_team2'))) {
            $data = $request->all();
            $data['gambar_team1'] = $request->file('gambar_team1')->store('pertandingan');
            $data['gambar_team2'] = $request->file('gambar_team2')->store('pertandingan');

            Pertandingan::create($data);

            Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
            return redirect()->route('pertandingan.index');
        }else{
            $data = $request->all();
            Pertandingan::create($data);

            Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
            return redirect()->route('pertandingan.index');
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
        abort_if(Gate::denies('edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $pertandingans = Pertandingan::findOrFail($id);
        return view('pertandingan.edit', compact('pertandingans'));
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
        if (empty($request->file('gambar_team1','gambar_team2'))) {
            $pertandingans = Pertandingan::find($id);
            $pertandingans->update([
                'nama_team1'=> $request->nama_team1,
                'nama_team2'=> $request->nama_team2,
                'tanggal_waktu'=> $request->tangal_waktu,
            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('pertandingan.index');

        } else{
            $pertandingans = Pertandingan::find($id);
            Storage::delete([$pertandingans->gambar_team1, $pertandingans->gambar_team2 ]);
            $pertandingans->update([
                'nama_team1'=> $request->nama_team1,
                'nama_team2'=> $request->nama_team2,
                'tanggal_waktu'=> $request->tangal_waktu,
                'gambar_team1' => $request->file('gambar_team1')->store('pertandingan'),
                'gambar_team2' => $request->file('gambar_team2')->store('pertandingan'),
            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('pertandingan.index');
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

        $pertandingans = Pertandingan::find($id);

        Storage::delete($pertandingans->gambar_team1);
        Storage::delete($pertandingans->gambar_team2);
        $pertandingans->delete();
        Alert::success('Berhasil', 'Data Berhasil Di Hapus');
        return redirect()->route('pertandingan.index');
    }
}
