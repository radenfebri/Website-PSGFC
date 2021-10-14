<?php

namespace App\Http\Controllers\User;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Galeri;
use App\Models\Iklan;
use App\Models\Pertandingan;
use App\Models\Store;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        $galeris = Galeri::all();
        $pertandingans = Pertandingan::orderBy('created_at','DESC')->limit('1');
        $iklans = Iklan::orderBy('created_at','DESC')->limit('1')->get();
        $stores = Store::orderBy('created_at','DESC')->limit('1')->get();
        $postinganTerbaru = Blog::orderBy('created_at','DESC')->limit('3')->get();
        return view('dashboard',[
            'blogs' => $blogs,
            'galeris' => $galeris,
            'stores' => $stores,
            'pertandingans' => $pertandingans,
            'iklans' => $iklans,
            'postinganTerbaru' => $postinganTerbaru,
        ]);
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
        //
    }
}
