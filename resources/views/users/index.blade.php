{{-- {{ dd($title) }} --}}
<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="px-5 pt-3">
        <div class="d-flex justify-content-end mb-3">
            <a href="users/create">
                <div class="btn btn-primary"> <i class="bi bi-plus-circle"></i> Tambah Data</div>
            </a>
        </div>
        <table class="table table-striped table-hover text-start">
            <thead class="table-dark">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Dibuat Pada</th>
                    <th class="text-center" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['level'] }}</td>
                        <td>{{ $user['created_at']->format('d-m-Y') }}</td>
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
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>
