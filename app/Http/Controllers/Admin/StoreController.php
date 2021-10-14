<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::orderBy('created_at','DESC')->paginate(5);
        return view('store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('store.create');
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
            'gambar_store' => 'required|mimes:jpg,jpeg,png,bmp',
        ]);

        if (!empty($request->file('gambar_store'))) {
            $data = $request->all();
            $data['gambar_store'] = $request->file('gambar_store')->store('store');

            Store::create($data);

            Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
            return redirect()->route('store.index');
        }else{
            $data = $request->all();
            Store::create($data);

            Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
            return redirect()->route('store.index');
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

        $stores = Store::findOrFail($id);

        return view('store.edit', compact('stores'));
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
        if(empty($request->file('gambar_store'))){
            $store = Store::find($id);
            $store->update ([
                'judul' => $request->judul,
                'link' => $request->link,
                'body' => $request->body,
            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('store.index');

        }else{
            $store = Store::find($id);
            Storage::delete($store->gambar_store);
            $store->update([
                'judul' => $request->judul,
                'link' => $request->link,
                'body' => $request->body,
                'gambar_store' => $request->file('gambar_store')->store('store'),
            ]);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('store.index');
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

        $blogs = Store::find($id);

        Storage::delete($blogs->gambar_store);
        $blogs->delete();
        Alert::success('Berhasil', 'Data Berhasil Di Hapus');
        return redirect()->route('store.index');
    }
}
