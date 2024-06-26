<x-layout>

    <!-- Location Detail Modal -->
    <div class="modal modal-dialog modal-xl fade" id="locationModal" tabindex="-1" role="dialog"
        aria-labelledby="locationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title fw-bold" id="modalLocationName">
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start" style="max-height: 70vh; overflow-y: auto;">
                    <div class="container mb-3" style="width: 50%; height: 300px;">
                        <img id="modalImage" src="" class="img-fluid" alt="Location Image"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <p><b>Koordinat : </b> <span id="modalCoordinates"></span></p>
                    <p><b>Sejarah : </b> <span id="modalHistory"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <b>{{ Auth::user()->name }}</b> !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div id="map"></div>

</x-layout>
