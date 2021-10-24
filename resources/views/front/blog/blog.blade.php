@extends('layouts.front')

@section('title', 'Blog')

@section('content')



<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container pt-5">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Blog</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Blog</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <br>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 entries">

                    @php
                    $i = 1;
                    @endphp

                    @foreach ($blog as $item)
                    @php
                        $i++;
                    @endphp
                    <article class="entry {{ $i == '1' ? 'active' : '' }}">
                        <div class="entry-img ">
                            <img src="{{ asset('storage/'. $item->gambar_artikel) }}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="{{ route('detail', $item->slug ) }}">{{ $item->judul }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="{{ route('detail', $item->slug ) }}">{{ $item->users->name }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="{{ route('detail', $item->slug ) }}">{{date('d M Y',strtotime($item->created_at))}}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="{{ route('detail', $item->slug ) }}">Coment</a></li>

                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {!! \Illuminate\Support\Str::words($item->body, 50,'....') !!}

                                {{-- {!! $item->body !!} --}}
                            </p>
                            <div class="read-more">
                                <a href="{{ route('detail', $item->slug ) }}">Read More</a>
                            </div>
                        </div>
                    </article>

                    @endforeach


                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            {{ $blog->links() }}
                        </ul>
                    </div>


                    <!-- End blog entry -->


                    {{-- <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li>{{ $blog->links() }}</li>
                        </ul>
                    </div> --}}

                </div>


                <div class="col-lg-4">

                    <div class="sidebar">
                        <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            <form action="{{ route('blog') }}">
                                <input type="text" name="search" id="search" value="{{ request('search') }}">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                        <!-- End sidebar search formn-->

                        @forelse ($iklan as $item)
                        <h3 class="sidebar-title">{{ $item->judul }}</h3>
                        <div class="sidebar-item">
                            <div class="post-item clearfix">
                                <a href="{{ $item->link }}" class="">
                                    <img src="{{ asset('storage/'. $item->gambar_iklan) }}" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        @empty
                        <p>Iklan Masih Kosong</p>
                        @endforelse ()




                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">
                            @forelse ($postinganTerbaru as $item)
                            <div class="post-item clearfix">
                                <img src="{{ asset('storage/'. $item->gambar_artikel) }}" alt="">
                                <h4><a href="{{ route('detail', $item->slug ) }}">{{ $item->judul }}</a></h4>
                                <time datetime="2020-01-01">{{date('d M Y ',strtotime($item->created_at))}}</time>
                            </div>
                            @empty
                            <p>Data Masih Kosong</p>
                            @endforelse

                        </div><!-- End sidebar recent posts-->

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->
            </div>

        </section><!-- End Blog Section -->

    </main><!-- End #main -->

    <script id="dsq-count-scr" src="//psg-fc.disqus.com/count.js" async></script>


    @endsection
