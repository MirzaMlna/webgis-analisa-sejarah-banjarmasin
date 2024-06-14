{{-- {{ dd($title) }} --}}
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <b>{{ Auth::user()->name }}</b> !
        </div>
    @endif

    Ceritanya Kena Ada Maps Disini Anjay

</x-layout>
