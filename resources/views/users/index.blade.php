{{-- {{ dd($title) }} --}}
<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="px-5 pt-3">
        {{-- Alert --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {{-- Alert --}}
        <div class="d-flex justify-content-end mb-3">

            {{-- Tombol tambah data muncul ketika level "Super Admin" --}}
            @if (Auth::user()->level === 'Super Admin')
                <a href="users/create">
                    <div class="btn btn-success"> <i class="bi bi-plus-circle"></i> Tambah Data</div>
                </a>
            @endif
            {{-- Tombol cetak muncul ketika level "Super Admin" --}}
            @if (Auth::user()->level === 'Kepala')
                <a href="#">
                    <div class="btn btn-success"> <i class="bi bi-printer"></i> Cetak</div>
                </a>
            @endif

        </div>
        <table class="table table-striped table-hover text-start">
            <thead class="table-dark">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No.Telp</th>
                    <th scope="col">Level</th>

                    {{-- Kolom aksi muncul ketika level "Super Admin" --}}
                    @if (Auth::user()->level === 'Super Admin')
                        <th class="text-center" scope="col">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['phone'] }}</td>
                        <td>{{ $user['level'] }}</td>

                        {{-- Tombol edit dan hapus muncul ketika level "Super Admin" --}}
                        @if (Auth::user()->level === 'Super Admin')
                            <td class="text-center">
                                {{-- User Edit Button --}}
                                <form action="{{ route('users.edit', $user->id) }}" method="get"
                                    style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning me-2">
                                        <span><i class="bi bi-pencil"></i></span> Ubah
                                    </button>
                                </form>
                                {{-- User Delete Button --}}
                                <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Apakah anda yakin ingin menghapus data?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <span><i class="bi bi-trash3"></i></span> Hapus
                                    </button>
                        @endif

                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>
