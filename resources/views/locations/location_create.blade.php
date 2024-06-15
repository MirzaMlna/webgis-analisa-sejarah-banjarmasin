<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menambahkan Data Lokasi</title>
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
    <div class="row d-flex justify-content-center m-5">

        <div class="col-md-6">
            <div class="fs-3 mb-3 mt-3">
                <span><a class="text-secondary" onclick="history.back();">
                        <i class="bi bi-arrow-left-circle me-2 fs-4"></i></a></span>
                Tambah Data Lokasi
            </div>
            <hr class="text-black">

            <form method="post" action="">
                @csrf
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Nama Lokasi</label>
                    <input type="text" class="form-control" id="" required>
                </div>

                <div class="mb-3">
                    <label for="descriptionInput">Deskripsi</label>
                    <textarea class="form-control" id="descriptionInput"></textarea>
                </div>

                <div class="mb-3">
                    <label for="coordinatesInput" class="form-label">Kordinat <br> <span
                            class="fst-italic text-secondary">Pilih lokasi
                            di
                            samping</span></label>

                    <input type="text" class="form-control" id="coordinatesInput" readonly required>
                </div>

                <div class="mb-5">
                    <label for="imageInput" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="imageInput" required>
                </div>


                <button type="submit" class="btn btn-primary w-100">Tambahkan</button>
            </form>
        </div>

        <div class="col-md-6 bg-secondary">
            <div class="container">
                Kena map disini anjay
            </div>
        </div>
    </div>

</body>

</html>
