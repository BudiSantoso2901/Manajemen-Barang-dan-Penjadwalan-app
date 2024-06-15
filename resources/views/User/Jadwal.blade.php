@extends('_layouts.main')

@section('content')
    <div class="col-11 mx-auto mb-5 border overflow-hidden"
        style="background-color: rgb(255, 255, 255); font-size: 13px; margin-top: 125px; border-radius: 10px">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center p-4">
            <h1 class="fs-5 mb-3 mb-sm-0">Data Jadwal</h1>
        </div>
        @if (session('success'))
            <div class="mt-3 alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        {{-- Card Grid --}}
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($alldatajadwal as $jdw)
                <div class="col-lg-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/jadwal 2.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $jdw->nama_kegiatan }}</h5>
                            <p class="card-text">{{ $jdw->deskripsi }}</p>
                            <p class="card-text">
                                <strong>Nama Anggota Tim:</strong>
                                @foreach ($jdw->users as $user)
                                    {{ $user->nama }},
                                @endforeach
                            </p>
                            <p class="card-text">
                                <strong>Barangs:</strong>
                                @foreach ($jdw->barangs as $barang)
                                    {{ $barang->nama_barang }},
                                @endforeach
                            </p>
                            <p class="card-text"><strong>Status:</strong>
                                <span class="badge text-bg-warning">{{ $jdw->status }}</span>
                            </p>
                            <p class="card-text"><strong>Lokasi:</strong> {{ $jdw->lokasi }}</p>
                            <p class="card-text"><strong>Waktu:</strong> {{ $jdw->waktu }}</p>
                            <a href="{{ route('Form.status', ['id' => $jdw->id]) }}">
                                <button type="button" class="btn btn-outline-success">
                                    <i class="bi bi-clipboard2-plus"></i>
                                    Edit Status
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('images/jadwal.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Tidak Ada Jadwal untuk Anda </p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endpush

@push('js')
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-jadwal').DataTable();
        });
    </script>
@endpush
