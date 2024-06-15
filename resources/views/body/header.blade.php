<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container px-5">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/medcen1.png') }}" width="100" height="100" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Dashboard</a>
                </li>
                @if (Auth::check() && Auth::user()->type == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('Admin/view/jadwal') }}">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('Admin/view/liputan') }}">Liputan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('Admin/view/barang') }}">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('Admin/view/anggota') }}">Anggota Tim</a>
                    </li>
                @elseif (Auth::check() && Auth::user()->type == 0)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('user/jadwal') }}">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('user/liputan') }}">Liputan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('user/barang') }}">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('user/anggota') }}">Anggota Tim</a>
                    </li>
                @else
                @endif
            </ul>
            @if (Auth::check() == false)
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Log In</a></li>
                </ul>
            @else
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('images/user.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            @if (auth()->user() && auth()->user()->profile_picture)
                                                <img src="{{ Storage::url(auth()->user()->profile_picture) }}"
                                                    alt="Foto Profil" class="w-px-40 h-auto rounded-circle">
                                            @else
                                                <img src="{{ asset('images/user.png') }}" alt
                                                    class="w-px-40 h-auto rounded-circle" />
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-medium d-block">{{ Auth::user()->nama }}</span>
                                        <small class="text-muted">-</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.view') }}">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ url('user/process-logout') }}">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
        </div>
        @endif
    </div>
    </div>
</nav>

<!-- Header-->
<header class="masthead text-center text-white">
    <div class="masthead-content">
        <div class="container px-5">
            <h1 class="masthead-heading mb-0">Media Center Poliwangi</h1>
            <h2 class="masthead-subheading mb-0"></h2>
            {{-- <a class="btn btn-info btn-xl rounded-pill mt-5" href="{{ url('/') }}"></a> --}}
        </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
</header>
