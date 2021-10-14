<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('storage/'. Auth::user()->foto) }}" alt="{{ asset('template') }}." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">{{ Auth::user()->email }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('profile.index') }}">
                                    <span class="link-collapse">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.edit', Auth::user()->id ) }}">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('password.edit')}}">
                                    <span class="link-collapse">Change Password</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                    @if(Auth::check() && !Auth::user()->email_verified_at)
                        <li class="alert alert-danger mb-n1 text-center" role="alert">
                            <label>Anda belum memverifikasi email!.</label>
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klik disini untuk memverifikasi') }}</button>.
                            </form>
                        </li>
                    @endif
            </ul>
            <ul class="nav nav-primary">
                <li class="nav-item {{ (request()->segment(2) == 'dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>

                @can('slide permission')
                <li class="nav-item {{ (request()->segment(3) == 'slide') ? 'active' : '' }}">
                    <a href="{{ route('slide.index') }}">
                        <i class="fas fa-images"></i>
                        <p>Slide Gambar</p>
                    </a>
                </li>
                @endcan

                @can('anggota permission')
                <li class="nav-item {{ (request()->segment(3) == 'anggota') ? 'active' : '' }}">
                    <a href="{{ route('anggota.index') }}">
                        <i class="fas fa-user"></i>
                        <p>Daftar Anggota</p>
                    </a>
                </li>
                @endcan

                @can('galeri permission')
                <li class="nav-item {{ (request()->segment(3) == 'galeri') ? 'active' : '' }}">
                    <a href="{{ route('galeri.index') }}">
                        <i class="fas fa-photo-video"></i>
                        <p>Galeri Gambar</p>
                    </a>
                </li>
                @endcan

                @can('blog permission')
                <li class="nav-item {{ (request()->segment(3) == 'blog') ? 'active' : '' }}">
                    <a href="{{ route('blog.index') }}">
                        <i class="fab fa-blogger"></i>
                        <p>Blog Site</p>
                    </a>
                </li>
                @endcan

                @can('store permission')
                <li class="nav-item {{ (request()->segment(3) == 'store') ? 'active' : '' }}">
                    <a href="{{ route('store.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Store</p>
                    </a>
                </li>
                @endcan

                @can('iklan permission')
                <li class="nav-item {{ (request()->segment(3) == 'iklan') ? 'active' : '' }}">
                    <a href="{{ route('iklan.index') }}">
                        <i class="fab fa-adversal"></i>
                        <p>Iklan</p>
                    </a>
                </li>
                @endcan

                <li class="nav-item {{ (request()->segment(3) == 'base2') ? 'active' : '' }}">
                    @can('setting permission')
                        <a data-toggle="collapse" href="#base2">
                            <i class="fas fa-cogs"></i>
                                <p>Website Settings</p>
                            <span class="caret"></span>
                        </a>
                            <div class="collapse" id="base2">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('about.index') }}">
                                            <span class="sub-item">Setting About</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('footer.index') }}">
                                            <span class="sub-item">Setting Footer</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pendaftaran.index') }}">
                                            <span class="sub-item">Setting Pendaftaran</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logo.index') }}">
                                            <span class="sub-item">Setting Logo Website</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sponsor.index') }}">
                                            <span class="sub-item">Setting Sponsor</span>
                                        </a>
                                    </li>
                            </div>
                    @endcan

                <li class="nav-item {{ (request()->segment(3) == 'base1') ? 'active' : '' }}">
                    @can('jadwal permission')
                        <a data-toggle="collapse" href="#base1">
                            <i class="fas fa-calendar-alt"></i>
                                <p>Manajemen Jadwal</p>
                            <span class="caret"></span>
                        </a>
                            <div class="collapse" id="base1">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('pertandingan.index') }}">
                                            <span class="sub-item">Jadwal Pertandingan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('latihan.index') }}">
                                            <span class="sub-item">Jadwal Latihan</span>
                                        </a>
                                    </li>
                            </div>
                    @endcan


                <li class="nav-item {{ (request()->segment(4) == 'base') ? 'active' : '' }}">
                    @can('permission manajemen')
                        <a data-toggle="collapse" href="#base">
                            <i class="fas fa-users"></i>
                                <p>Manajemen Users</p>
                            <span class="caret"></span>
                        </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('roles.index') }}">
                                    <span class="sub-item">Role</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('permissions.index') }}">
                                    <span class="sub-item">Permission</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('assign.create') }}">
                                    <span class="sub-item">Assign Permission</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('assign.user.create') }}">
                                    <span class="sub-item">Permission to User</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}">
                                    <span class="sub-item">Setting Users</span>
                                </a>
                            </li>

                    </div>
                    @endcan

                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        {{-- <li class="nav-item {{request()->is('log') ? 'active' : ''}}">
                            <a href="{{ route('log.index') }}">
                                <i class="fas fa-server"></i>
                                <p>Log</p>
                            </a>
                        </li> --}}
                    </ul>

                </li>
            </ul>
        </div>
    </div>
</div>
