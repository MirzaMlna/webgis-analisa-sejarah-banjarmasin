<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container">
        <x-header>{{ $slot }}</x-header>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home">Gis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="users">Data User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="marks_data">Data Penanda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="#">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
