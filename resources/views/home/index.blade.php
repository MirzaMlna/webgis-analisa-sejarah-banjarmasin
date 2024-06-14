{{-- {{ dd($title) }} --}}
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    Ceritanya Kena Ada Maps Disini Anjay

</x-layout>
