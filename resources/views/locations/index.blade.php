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
            {{-- Tombol tambah data muncul ketika level "Super Admin" Dan Admin --}}
            @if (Auth::user()->level === 'Super Admin' || Auth::user()->level === 'Admin')
                <a href="{{ route('locations.create') }}">
                    <div class="btn btn-success"> <i class="bi bi-plus-circle"></i> Tambah Data</div>
                </a>
            @endif
            {{-- Tombol cetak muncul ketika level "Kepala" --}}
            @if (Auth::user()->level === 'Kepala')
                <a href="#">
                    <div class="btn btn-success"> <i class="bi bi-printer"></i> Cetak</div>
                </a>
            @endif
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Kordinat</th>
                    <th scope="col">Gambar</th>
                    @if (Auth::user()->level === 'Super Admin' || Auth::user()->level === 'Admin')
                        <th class="text-center" scope="col">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($locations as $location)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $location->location_name }}</td>
                        <td>{{ Str::limit($location->description, 20) }}</td>
                        <td>{{ Str::limit($location->coordinates, 20) }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $location->image) }}" alt="Gambar {{ $location->lokasi }}"
                                style="width: 100px">
                        </td>
                        {{-- Tombol lihat, edit dan hapus muncul ketika level "Super Admin" atau Admin --}}
                        @if (Auth::user()->level === 'Super Admin' || Auth::user()->level === 'Admin')
                            <td class="text-center">

                                {{-- Location View Button --}}
                                <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-info me-2"
                                    data-bs-target="#{{ $location->id }}">
                                    <span><i class="bi bi-eye"></i></span> Lihat
                                </button>

                                <!-- Location Detail Modal -->
                                <div class="modal fade" id="{{ $location->id }}" tabindex="-1"
                                    aria-labelledby="{{ $location->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title" id="{{ $location->id }}Label">
                                                    Data Lokasi {{ $location->location_name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                <img class="mb-3" src="{{ asset('storage/' . $location->image) }}"
                                                    alt="Gambar {{ $location->lokasi }}" style="width: 100%">
                                                <p><b>Lokasi : </b> {{ $location->location_name }}</p>
                                                <p><b>Deskripsi : </b> {{ $location->description }}</p>
                                                <p><b>Koordinat : </b> {{ $location->coordinates }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>
