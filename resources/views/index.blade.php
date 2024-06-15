<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>WEBGIS ANALISA SEJARAH BANJARMASIN</title>
    {{-- Bootstrap Import --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- Poppins Font CDN --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-warning shadow sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bolder fs-3 text-dark" href="#">WEBGIS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="#explanation">Jelajahi Web</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#profile">Profil Tim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="login-form">Login </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section id="hero" class="vh-100 bekantan-bg d-flex flex-column justify-content-center align-items-center">
            <div class="display-1 text-light fw-bold text-center">
                SISTEM INFORMASI GEOGRAFIS
            </div>

            <div class="display-6 text-light text-center">
                Analisis Sejarah Kota Banjarmasin
            </div>
            <a href="login-form">
                <div class="mt-3 btn btn-lg btn-warning fw-bold ms-2">
                    Masuk Ke Webgis
                </div>
            </a>
        </section>
        <section id="explanation" class="bg-dark p-2 p-lg-5">
            <div class="fs-1 text-light fw-bold text-center mt-3 mb-5">
                Apa Itu <span class="text-warning">WebGis</span>?
            </div>
            <div class="row px-5">
                <div class="col-md-4 d-flex flex-column align-items-center">
                    <img src="{{ asset('images/eddy_prahasta.webp') }}" alt="Eddy Prahasta" width="300"
                        class="rounded-5" />
                    <br />
                    <div class="fs-5 text-light text-center fw-bold">Eddy Prahasta</div>
                    <p class="text-secondary text-center fst-italic">
                        Pakar dan penulis buku bidang Sistem Informasi Geografis (SIG) dan
                        Penginderaan Jauh (Penginderaan Jauh).
                    </p>
                </div>

                <div class="col-md-1">
                    <br />
                </div>

                <div class="col-md-7">
                    <p class="text-light fs-3 text-center text-lg-start">
                        <span class="text-warning fw-bold">Menurut Prahasta (2007)</span>
                        “WebGIS adalah aplikasi Sistem Informasi Geografis (SIG) atau
                        pemetaan digital yang memanfaatkan jaringan internet sebagai media
                        komunikasi...”
                    </p>
                    <br />
                    <p class="text-light fs-3 text-center text-lg-start">
                        Singkatnya, WebGIS merupakan singkatan dari
                        <span class="text-warning fw-bold">Web Geographic Information System</span>
                        , bisa diartikan sebagai sebuah
                        <span class="text-warning fw-bold">Sistem Informasi Geografis Berbasis Web.</span>
                    </p>
                </div>
            </div>
        </section>

        <!-- Profile Section -->
        <section id="profile" class="bg-warning p-2 p-lg-5">
            <div class="fs-1 text-dark fw-bold text-center mt-3 mb-5">
                Profil Tim
            </div>
            <div class="row mb-0 mb-lg-5">
                <div class="col-md-6 d-flex flex-column align-items-center">
                    <img src="{{ asset('images/team-images/mirza.webp') }}" width="200"
                        class="rounded rounded-5 shadow mb-2 border" alt="Muhammad Mirza Maulana" />
                    <h3 class="fs-3">Muhammad Mirza Maulana</h3>
                    <p class="text-secondary text-center fst-italic">
                        Team Leader, Front End Developer, Back End Developer.
                    </p>
                </div>
                <div class="col-md-6 d-flex flex-column align-items-center">
                    <img src="{{ asset('images/team-images/renny.webp') }}" width="200"
                        class="rounded rounded-5 shadow mb-2 border" alt="Renny Melanda Febrianti " />
                    <h3 class="fs-3">Renny Melanda Febrianti</h3>
                    <p class="text-secondary text-center fst-italic">
                        Back End Developer.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex flex-column align-items-center">
                    <img src="{{ asset('images/team-images/wahyu.webp') }}" width="200"
                        class="rounded rounded-5 shadow mb-2 border" alt="Muhammad Wahyu" />
                    <h3 class="fs-3">Muhammad Wahyu</h3>
                    <p class="text-secondary text-center fst-italic">
                        Front End Developer
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column align-items-center">
                    <img src="{{ asset('images/team-images/rifqi.webp') }}" width="200"
                        class="rounded rounded-5 shadow mb-2 border" alt="Rifqi Riandi Rahman" />
                    <h3 class="fs-3">Rifqi Riandi Rahman</h3>
                    <p class="text-secondary text-center fst-italic">
                        Data Researcher.
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column align-items-center">
                    <img src="{{ asset('images/team-images/fajar.webp') }}" width="200"
                        class="rounded rounded-5 shadow mb-2 border" alt="Muhammad Fajar Hermawan " />
                    <h3 class="fs-3 text-center">Muhammad Fajar Hermawan</h3>
                    <p class="text-secondary text-center fst-italic">
                        Front End Developer.
                    </p>
                </div>
            </div>
        </section>
        <!-- Profile Section -->
        <footer class="bg-dark text-center shadow text-light">
            <div class="text-center p-3">
                &copy; 2024 Kelompok 1 | All Rights Reserved
            </div>
        </footer>
    </main>

</body>

</html>
