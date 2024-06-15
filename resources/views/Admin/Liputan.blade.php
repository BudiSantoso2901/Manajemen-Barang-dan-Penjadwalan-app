@extends('_layouts.main')
@section('content')
    <div class="col-11 mx-auto mb-5 border overflow-hidden"
        style="background-color: rgb(255, 255, 255); font-size: 13px; margin-top: 125px; border-radius: 10px">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center p-4">
            <h1 class="fs-5 mb-3 mb-sm-0">Data Liputan</h1>
            <a href="{{ route('Admin.Form.inputLiputan') }}" class="btn btn-success align-self-end"
                style="border-radius: 25px">
                <span>Tambah Liputan</span>
            </a>
        </div>
        @if (session('success'))
            <div class="mt-3 alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        {{-- Table --}}
        <div class="table-responsive px-3 pb-3">
            <table class="table table-hover mt-3" id="table-jadwal">
                <thead class="table-light border-top border-bottom">
                    <tr>
                        <th class="text-tertiary fw-semibold text-center px-3 text-nowrap">NO</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap">Kegiatan</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap">Deskripsi</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap">Lokasi</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap">Bukti Liputan</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap">Waktu</th>
                        <th class="text-tertiary fw-semibold text-center px-3 text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($AllLiputan as $key => $lpt)
                        <tr>
                            <td class="text-tertiary text-center px-3 text-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-3 text-nowrap">{{ $lpt->nama_kegiatan }}</td>
                            <td class="px-3 text-nowrap">{{ $lpt->deskripsi_kegiatan }}</td>
                            <td class="px-3 text-nowrap">{{ $lpt->lokasi }}</td>
                            <td class="px-3 text-nowrap">
                                <a href="{{ $lpt->bukti_liputan }}" class="btn btn-secondary" target="_blank"
                                    style="color: white;">
                                    <i class="bi bi-folder-symlink-fill"></i>
                                </a>
                            </td>

                            <td class="px-3 text-nowrap">{{ $lpt->waktu }}</td>
                            <td class="px-3 text-center text-nowrap">
                                <div class="dropdown">
                                    <button type="button" name="edit"
                                        class="btn btn-outline-light text-secondary fs-5 mx-1 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bi bi-trash2"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('Admin.liputan.delete', ['id' => $lpt->id]) }}"><i
                                                class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush

@push('js')
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-jadwal').DataTable();
        });
    </script>
@endpush
