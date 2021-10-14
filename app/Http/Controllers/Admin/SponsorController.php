<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::orderBy('created_at','DESC')->get();
        return view('sponsor.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('sponsor.create');
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
            'logo' => 'required|mimes:jpg,jpeg,png,bmp',

        ]);

        if (!empty($request->file('logo'))) {
            $data = $request->all();
            $data['logo'] = $request->file('logo')->store('sponsor');

            Sponsor::create($data);

            Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
            return redirect()->route('sponsor.index');
        }else{
            $data = $request->all();
            Sponsor::create($data);

            Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
            return redirect()->route('sponsor.index');
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

        $sponsors = Sponsor::findOrFail($id);
        return view('sponsor.edit', compact('sponsors'));
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
        if (empty($request->file('logo'))) {
            $sponsors = Sponsor::find($id);
            $sponsors->update([
                'link'=> $request->link,
            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('sponsor.index');

        } else{
            $sponsors = Sponsor::find($id);
            Storage::delete($sponsors->logol);
            $sponsors->update([
                'link'=> $request->link,
                'logo' => $request->file('logo')->store('sponsor'),
            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('sponsor.index');
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

        $sponsors = Sponsor::find($id);

        Storage::delete($sponsors->logo);
        $sponsors->delete();
        Alert::success('Berhasil', 'Data Berhasil Di Hapus');
        return redirect()->route('sponsor.index');
    }
}
