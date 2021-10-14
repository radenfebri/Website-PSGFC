@extends('layouts.front')

@section('title', 'Detail Blog')

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
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">
        {{-- @foreach ($blog as $item) --}}
          <div class="col-lg-8 entries">

            <article class="entry">

              <div class="entry-img">
                <img src="{{ asset('storage/'. $blog->gambar_artikel) }}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{ route('detail', $blog->slug ) }}">{{ $blog->judul }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="{{ route('detail', $blog->slug ) }}">{{ $blog->users->name }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="{{ route('detail', $blog->slug ) }}">{{date('d M Y',strtotime($blog->created_at))}}</a></li>
                  {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">12 Comments</a></li> --}}
                </ul>
              </div>
              <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->

              <div class="entry-content">
                <p>
                {{-- {!! \Illuminate\Support\Str::words($item->body, 50,'....') !!} --}}

                {!! $blog->body !!}
                </p>
              </div>

            </article>


            {{-- @endforeach --}}

            <!-- End blog entry -->


            {{-- <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#" class="active">1</a></li>
                <li class=""><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div> --}}
          </div>


          <div class="col-lg-4">

            <div class="sidebar">

            @forelse ($iklan as $item)
            <h3 class="sidebar-title">Iklan</h3>
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

<br>
<br>
<div class="container" data-aos="fade-up">
    <div id="disqus_thread" class="mt-4"></div>
    <script>
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://psg-fc.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
  </div>
<br>
<br>
</main><!-- End #main -->


@endsection
