{{-- {{ dd($title) }} --}}
<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="px-5 pt-5">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Dibuat Pada</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    {{-- {{ dd($user['name']) }} --}}
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['level'] }}</td>
                    <td>{{ $user['created_at'] }}</td>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>
