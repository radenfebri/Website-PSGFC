<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Anggota;
use App\Models\Blog;
use App\Models\Footer;
use App\Models\Galeri;
use App\Models\Iklan;
use App\Models\Latihan;
use App\Models\Logo;
use App\Models\Pendaftaran;
use App\Models\Pertandingan;
use App\Models\Slide;
use App\Models\Sponsor;
use App\Models\Store;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $slide = Slide::where('status', '1')->get();
        $footer = Footer::all();
        $blogs = Blog::all();
        $about = About::all();
        $logo = Logo::all();
        $sponsor = Sponsor::all();
        $galeri = Galeri::orderBy('created_at','DESC')->limit('6')->get();
        $pendaftaran = Pendaftaran::all();
        $pertandingans = Pertandingan::all();
        $iklans = Iklan::orderBy('created_at','DESC')->limit('1')->get();
        $postinganTerbaru = Blog::orderBy('created_at','DESC')->limit('3')->get();

        return view('front.index',[
            'slide' => $slide,
            'footer' => $footer,
            'blogs' => $blogs,
            'about' => $about,
            'sponsor' => $sponsor,
            'logo' => $logo,
            'galeri' => $galeri,
            'pendaftaran' => $pendaftaran,
            'pertandingans' => $pertandingans,
            'iklans' => $iklans,
            'postinganTerbaru' => $postinganTerbaru,
        ]);
    }


    public function anggota()
    {
        $anggota = Anggota::all();
        $logo = Logo::all();
        $pendaftaran = Pendaftaran::all();
        $footer = Footer::all();

        return view('front.anggota.daftar-anggota',[
        'anggota' => $anggota,
        'logo' => $logo,
        'pendaftaran' => $pendaftaran,
        'footer' => $footer,
        ]);
    }



    public function blog()
    {
        $anggota = Anggota::all();
        $pendaftaran = Pendaftaran::all();
        $footer = Footer::all();
        $logo = Logo::all();
        // $blog = Blog::orderBy('created_at','DESC')->paginate(3);
        $iklan = Iklan::orderBy('created_at','DESC')->paginate(2);
        $postinganTerbaru = Blog::orderBy('created_at','DESC')->limit('5')->get();

        return view('front.blog.blog',[
            // 'blog' => $blog,
            'blog' => Blog::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
            'logo' => $logo,
            'anggota' => $anggota,
            'pendaftaran' => $pendaftaran,
            'footer' => $footer,
            'iklan' => $iklan,
            'postinganTerbaru' => $postinganTerbaru,
        ]);
    }



    public function detail($slug)
    {
        $anggota = Anggota::all();
        $pendaftaran = Pendaftaran::all();
        $footer = Footer::all();
        $logo = Logo::all();
        $blog = Blog::where('slug', $slug)->first();
        $iklan = Iklan::orderBy('created_at','DESC')->paginate(2);
        $postinganTerbaru = Blog::orderBy('created_at','DESC')->limit('5')->get();

        return view('front.blog.detail',[
            'blog' => $blog,
            'logo' => $logo,
            'anggota' => $anggota,
            'pendaftaran' => $pendaftaran,
            'footer' => $footer,
            'iklan' => $iklan,
            'postinganTerbaru' => $postinganTerbaru,
        ]);
    }



    public function jadwal()
    {
        $footer = Footer::all();
        $logo = Logo::all();
        $pendaftaran = Pendaftaran::all();
        $pertandingan = Pertandingan::orderBy('created_at','DESC')->get();
        $latihan = Latihan::all();

        return view('front.jadwal.jadwal-pertandingan-latihan',[
        'footer' => $footer,
        'logo' => $logo,
        'pendaftaran' => $pendaftaran,
        'pertandingan' => $pertandingan,
        'latihan' => $latihan,
        ]);
    }



    public function galeri()
    {
        $galeri = Galeri::orderBy('created_at','DESC')->get();
        $logo = Logo::all();
        $pendaftaran = Pendaftaran::all();
        $footer = Footer::all();

        return view('front.galeri.galeri',[
        'galeri' => $galeri,
        'logo' => $logo,
        'pendaftaran' => $pendaftaran,
        'footer' => $footer,
        ]);
    }



    public function about()
    {
        $about = About::all();
        $logo = Logo::all();
        $pendaftaran = Pendaftaran::all();
        $footer = Footer::all();

        return view('front.about.about',[
        'about' => $about,
        'logo' => $logo,
        'pendaftaran' => $pendaftaran,
        'footer' => $footer,
        ]);
    }



    public function store()
    {
        $store = Store::orderBy('created_at','DESC')->get();
        $logo = Logo::all();
        $pendaftaran = Pendaftaran::all();
        $footer = Footer::all();

        return view('front.store.store',[
        'store' => $store,
        'logo' => $logo,
        'pendaftaran' => $pendaftaran,
        'footer' => $footer,
        ]);
    }
}
