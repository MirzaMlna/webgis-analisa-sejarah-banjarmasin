<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    {{-- Bootstrap Import --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- Poppins Font CDN --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body class="bekantan-bg">
    <div class="row">
        <div class="col-md-5">
            <div class="container vh-100 bg-warning pt-5">
                <div class="d-flex justify-content-start mb-3 ps-2">
                    <a onclick="history.back()" class="text-dark fw-bold" href="#">
                        <i class="bi bi-arrow-left-circle fs-3"></i>
                    </a>
                </div>
                <div class="fs-2 fw-bold text-dark text-center mt-2">
                    SELAMAT DATANG !
                </div>
                <div class="fs-6 mb-5 text-dark text-center">
                    Silahkan masuk menggunakan akun anda!
                </div>
                <div class="m-3">

                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        @if (session('failed'))
                            <div class="alert alert-danger">
                                {{ session('failed') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="emailInput" class="form-label fw-bold">Alamat Email</label>
                            <input name="email" type="email" class="form-control" id="emailInput" />
                        </div>
                        @error('email')
                            <div class="text-danger fs-6 mb-3">Email kosong atau salah!</div>
                        @enderror
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label fw-bold">Password</label>
                            <input name="password" type="password" class="form-control" id="passwordInput" />
                            @error('password')
                                <div class="text-danger fs-6 mb-3">Password kosong atau salah!</div>
                            @enderror
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="showPassword" />
                            <label class="form-check-label" for="showPassword">Tampilkan Password</label>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 mb-3">
                            Masuk
                        </button>
                    </form>
                    {{-- Untuk Masuk Tanmpa Akun --}}
                    <p class="text-center">
                        Atau masuk sebagai Tamu
                        <a href="{{ route('guestLogin') }}">Klik Disini</a> !
                    </p>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
