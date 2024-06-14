<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container">
        <x-header>{{ $slot }}</x-header>

        {{-- @if (Auth::user()->level === 'Kepala' || Auth::user()->level === 'Super Admin' || Auth::user()->level === 'Admin') --}}

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home">Peta</a>
                </li>

                {{-- Ditampilkan ketika level "Super Admin" atau "Kepala" --}}
                @if (Auth::user()->level === 'Kepala' || Auth::user()->level === 'Super Admin')
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="users">Data Akun</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="marks">Data Penanda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link fw-bold dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name ?? '' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="userDropdown">
                        <li><a onclick="return confirm('Apakah anda yakin ingin keluar akun?');" class="dropdown-item"
                                href="{{ route('logout') }}">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        {{-- @endif --}}
    </div>
</nav>
