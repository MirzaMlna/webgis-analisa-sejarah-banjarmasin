{{-- {{ dd($title) }} --}}
<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="px-5 pt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Dibuat Pada</th>
                </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div>

</x-layout>
