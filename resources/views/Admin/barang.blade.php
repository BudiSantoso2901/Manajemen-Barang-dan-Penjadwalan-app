@extends('_Layouts.main')
@section('content')
    <div class="col-11 mx-auto mb-5 border overflow-hidden"
        style="background-color: rgb(255, 255, 255); font-size: 13px; margin-top: 125px; border-radius: 10px">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center p-4">
            <h1 class="fs-5 mb-3 mb-sm-0">Data Barang</h1>
            <a href="{{ route('Admin.Form.inputbarang') }}" class="btn btn-success align-self-end" style="border-radius: 25px">
                <span>Tambah Barang</span>
            </a>
        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center p-4">
            <h1 class="fs-5 mb-3 mb-sm-0"></h1>
            <a href="{{ route('export-barang') }}" class="btn btn-secondary align-self-end" style="border-radius: 25px"><i
                    class="bi bi-filetype-csv"></i> Export
            </a>

        </div>
        @if (session('success'))
            <div class="mt-3 alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('info'))
            <div class="mt-3 alert alert-info" role="alert">
                {{ session('info') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="table-responsive px-3 pb-3">
            <table class="table table-hover mt-3" id="table-jadwal">
                <thead class="table-light border-top border-bottom">
                    <tr>
                        <th class="text-tertiary fw-semibold text-center px-3 text-nowrap">NO</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap text-center">Nama Barang</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap text-center">Tanggal Beli</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap text-center">Kondisi</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap text-center">Jumlah Unit</th>
                        <th class="text-tertiary fw-semibold text-center px-3 text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($alldataBarang as $key => $lpt)
                        <tr>
                            <td class="text-tertiary text-center px-3 text-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-3 text-nowrap text-center">{{ $lpt->nama_barang }}</td>
                            <td class="px-3 text-nowrap text-center">{{ $lpt->tanggal_beli }}</td>
                            <td class="px-3 text-nowrap text-center">{{ $lpt->kondisi_barang }}</td>
                            <td class="px-3 text-nowrap text-center">
                                @if ($lpt->jumlah_unit > 0)
                                    {{ $lpt->jumlah_unit }}
                                @else
                                    Barang Dipakai
                                @endif
                            </td>
                            <td class="px-3 text-center text-nowrap">
                                <div class="dropdown">
                                    <button type="button" name="edit"
                                        class="btn btn-outline-light text-secondary fs-5 mx-1 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('Admin.Form.edit_barang', $lpt->id) }}"><i
                                                class="bi bi-pencil-square"> Edit</i></a>
                                        <a class="dropdown-item" href="{{ route('barang.delete', $lpt->id) }}"><i
                                                class="bi bi-trash"> Delete</i></a>
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
