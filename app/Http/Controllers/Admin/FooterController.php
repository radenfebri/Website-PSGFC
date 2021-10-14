<?php

namespace App\Http\Controllers\Admin;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = Footer::all();
        return view('footer.index', compact('footers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $footers = Footer::all();
        return view('footers.edit', compact('footers'));
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
        $data['link_fb'] = ($request->link_fb);
        $data['link_wa'] = ($request->link_wa);
        $data['link_yt'] = ($request->link_yt);
        $data['link_ig'] = ($request->link_ig);
        $data['alamat'] = ($request->alamat);
        $data['no_hp'] = ($request->no_hp);
        $data['email'] = ($request->email);


        $footers = Footer::findOrFail($id);
        $footers->update($data);

        Alert::info('Berhasil', 'Data Berhasil Di Update');
        return redirect()->route('footer.index');
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
