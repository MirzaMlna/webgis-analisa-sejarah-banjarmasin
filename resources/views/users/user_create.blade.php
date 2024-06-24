<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menambahkan Data Akun</title>
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
    <div class="row d-flex justify-content-center">

        <div class="col-md-6">
            <div class="fs-3 mb-3 mt-3">
                <span><a class="text-secondary" onclick="history.back();">
                        <i class="bi bi-arrow-left-circle me-2 fs-4"></i></a></span>
                Tambah Data Akun
            </div>
            <hr class="text-black">

            <form method="post" action="{{ route('users.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Nama</label>
                    <input name="name" type="text" class="form-control" id="nameInput" required>
                </div>

                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="emailInput" required>
                </div>

                <div class="mb-3">
                    <label for="phoneInput" class="form-label">Nomor Telpon</label>
                    <input name="phone" type="number" class="form-control" id="exampleInputphone1" required>
                </div>

                <div class="mb-3">
                    <label for="passwordInput" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                </div>

                <div class="mb-5">
                    <label for="levelSelect" class="form-label">Pilih Level</label>
                    <select name="level" id="levelSelect" class="form-select" required>
                        <option>Kepala</option>
                        <option>Super Admin</option>
                        <option>Admin</option>
                        <option>Tamu</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary w-100">Tambahkan</button>
            </form>
        </div>
    </div>

</body>

</html>
