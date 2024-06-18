<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mengubah Data Lokasi</title>
    {{-- Bootstrap Import --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- Poppins Font CDN --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    {{-- Leaflet CSS CDN --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 550px;
        }
    </style>
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

            <form method="post" action="{{ route('locations.update', $location->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Nama Lokasi</label>
                    <input name="location_name" value="{{ old('location_name', $location->location_name) }}"
                        type="text" class="form-control" id="nameInput" required>
                </div>

                <div class="mb-3">
                    <label for="descriptionInput">Deskripsi</label>
                    <textarea name="description" class="form-control" id="descriptionInput">{{ old('description', $location->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="coordinatesInput" class="form-label">Kordinat <br> <span
                            class="fst-italic text-secondary">Pilih kordinat
                            di
                            samping</span></label>
                    <input name="coordinates" value="{{ old('coordinates', $location->coordinates) }}" type="text"
                        class="form-control" id="coordinatesInput" readonly required>
                </div>

                <div class="mb-5">
                    <label for="imageInput" class="form-label">Gambar</label>
                    <input name="image" type="file" class="form-control" id="imageInput">
                </div>
                <button type="submit" class="btn btn-primary w-100">Ubah</button>
            </form>
        </div>

        <div class="col-md-6">
            <div id="map"></div>
        </div>
    </div>

    {{-- Leaflet JS CDN --}}
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="/js/map.js"></script>

</body>

</html>
