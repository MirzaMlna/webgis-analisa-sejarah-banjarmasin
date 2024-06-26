<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>



    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="px-5 pt-3">
        <div class="d-flex justify-content-end mb-3">
            @foreach ($locations as $location)
                <!-- Location Detail Modal -->
                <div class="modal modal-dialog modal-xl fade" id="{{ $location->id }}" tabindex="-1"
                    aria-labelledby="{{ $location->id }}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h5 class="modal-title" id="{{ $location->id }}Label">
                                    Data Lokasi {{ $location->location_name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start" style="max-height: 70vh; overflow-y: auto;">
                                <div class="container mb-3" style="width: 100%; height: 250px">
                                    <img class="img-fluid" src="{{ asset('storage/' . $location->image) }}"
                                        alt="Gambar {{ $location->lokasi }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <p><b>Lokasi : </b> {{ $location->location_name }}</p>
                                <p><b>Koordinat : </b> {{ $location->coordinates }}</p>
                                <p><b>Sejarah : </b> {{ $location->history }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Tombol tambah data muncul ketika level "Super Admin" Dan Admin --}}
            @if (Auth::user()->level === 'Super Admin' || Auth::user()->level === 'Admin')
                <a href="{{ route('locations.create') }}">
                    <div class="btn btn-success"> <i class="bi bi-plus-circle"></i> Tambah Data</div>
                </a>
            @endif
            {{-- Tombol cetak muncul ketika level "Kepala" --}}
            @if (Auth::user()->level === 'Kepala')
                <a href="{{ route('locations.print') }}">
                    <div class="btn btn-success"> <i class="bi bi-printer"></i> Cetak</div>
                </a>
            @endif
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Sejarah</th>
                    <th scope="col">Kordinat</th>
                    <th scope="col">Gambar</th>

                    <th class="text-center" scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($locations as $location)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $location->location_name }}</td>
                        <td>{{ Str::limit($location->history, 20) }}</td>
                        <td>{{ Str::limit($location->coordinates, 20) }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $location->image) }}" alt="Gambar {{ $location->lokasi }}"
                                style="width: 100px">
                        </td>
                        <td class="text-center">
                            {{-- Location View Button --}}
                            <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-info me-2"
                                data-bs-target="#{{ $location->id }}">
                                <span><i class="bi bi-eye"></i></span> Lihat
                            </button>

                            {{-- Tombol Edit dan Hapus muncul ketika level "Super Admin" atau Admin --}}
                            @if (Auth::user()->level === 'Super Admin' || Auth::user()->level === 'Admin')
                                {{-- Location Edit Button --}}
                                <a href="{{ route('locations.edit', $location->id) }}"
                                    class="btn btn-sm btn-warning me-2">
                                    <span><i class="bi bi-pencil"></i></span> Ubah
                                </a>
                                {{-- Location Delete Button --}}
                                <form action="{{ route('locations.destroy', $location->id) }}" method="post"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Apakah anda yakin ingin menghapus data?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <span><i class="bi bi-trash3"></i></span> Hapus
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>
