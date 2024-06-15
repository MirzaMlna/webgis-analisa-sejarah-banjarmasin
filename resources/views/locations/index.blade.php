{{-- {{ dd($title) }} --}}
<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="px-5 pt-3">
        <div class="d-flex justify-content-end mb-3">
            {{-- Tombol tambah data muncul ketika level "Super Admin" --}}
            {{-- @if (Auth::user()->level === 'Super Admin') --}}
            <a href="locations/create">
                <div class="btn btn-success"> <i class="bi bi-plus-circle"></i> Tambah Data</div>
            </a>
            {{-- @endif --}}
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Kordinat</th>
                    <th scope="col">Gambar</th>
                    <th class="text-center" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <td>Bambang</td>
                <td>Bambang</td>
                <td>Bambang</td>
                <td>Bambang</td>
                <td>Bambang</td>
                {{-- Tombol edit dan hapus muncul ketika level "Super Admin" --}}
                {{-- @if (Auth::user()->level === 'Super Admin') --}}
                <td class="text-center">
                    {{-- User Edit Button --}}
                    <form action="" method="get" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-warning me-2">
                            <span><i class="bi bi-pencil"></i></span> Ubah
                        </button>
                    </form>
                    {{-- User Delete Button --}}
                    <form action="" method="post" style="display:inline-block;"
                        onsubmit="return confirm('Apakah anda yakin ingin menghapus data?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <span><i class="bi bi-trash3"></i></span> Hapus
                        </button>
                        {{-- @endif --}}
            </tbody>
        </table>
    </div>

</x-layout>
