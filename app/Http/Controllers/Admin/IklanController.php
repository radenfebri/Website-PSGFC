<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iklans = Iklan::orderBy('created_at','DESC')->paginate(5);
        return view('iklan.index', compact('iklans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('iklan.create');
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
            'gambar_iklan' => 'required|mimes:jpg,jpeg,png,bmp',
        ]);

        if (!empty($request->file('gambar_iklan'))) {
            $data = $request->all();
            $data['gambar_iklan'] = $request->file('gambar_iklan')->store('iklan');

            Iklan::create($data);

            Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
            return redirect()->route('iklan.index');
        }else{
            $data = $request->all();
            Iklan::create($data);

            Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
            return redirect()->route('iklan.index');
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

        $iklan = Iklan::findOrFail($id);

        return view('iklan.edit', compact('iklan'));
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
        if(empty($request->file('gambar_iklan'))){
            $iklan = Iklan::find($id);
            $iklan->update ([
                'judul' => $request->judul,
                'link' => $request->link,
                'status' => $request->status,
            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('iklan.index');

        }else{
            $iklan = Iklan::find($id);
            Storage::delete($iklan->gambar_iklan);
            $iklan->update([
                'judul' => $request->judul,
                'link' => $request->link,
                'status' => $request->status,
                'gambar_iklan' => $request->file('gambar_iklan')->store('iklan'),
            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('iklan.index');
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
        //
    }
}
