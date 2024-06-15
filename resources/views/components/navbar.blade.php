<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container">

        <x-header>
            {{-- Button kembali untuk tamu --}}
            @if (Auth::user()->level === 'Tamu')
                <span><a class="text-dark me-2" href="{{ route('logout') }}"><i
                            class="bi bi-arrow-left-circle"></i></a></span>
            @endif

            {{ $slot }}
        </x-header>
        {{-- Menampilkan Nav-Item Ketika Role Selain Tamu --}}
        @if (Auth::user()->level !== 'Tamu')
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home">Peta</a>
                    </li>

                    {{-- Data akun ditampilkan ketika level "Super Admin" atau "Kepala" --}}
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
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="userDropdown">
                            <li><a onclick="return confirm('Apakah anda yakin ingin keluar akun?');"
                                    class="dropdown-item" href="{{ route('logout') }}">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        @endif
    </div>
</nav>
