@extends('_Layouts.main')
@section('content')
    <div class="col-11 mx-auto mb-5 border overflow-hidden"
        style="background-color: rgb(255, 255, 255); font-size: 13px; margin-top: 125px; border-radius: 10px">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center p-4">
            <h1 class="fs-5 mb-3 mb-sm-0">Data Anggota</h1>
            <a href="{{ route('Admin.form.anggota') }}" class="btn btn-success align-self-end" style="border-radius: 25px">
                <span>Tambah Anggota</span>
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
                        <th class="text-tertiary fw-semibold px-3 text-nowrap">Nama</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap text-center">NIM</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap">Jurusan dan Kelas</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap text-center">Status</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap text-center">Job Desk</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap">Alamat</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap">Role</th>
                        <th class="text-tertiary fw-semibold text-center px-3 text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allDataUser as $key => $lpt)
                        <tr>
                            <td class="text-tertiary text-center px-3 text-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-3 text-nowrap">{{ $lpt->nama }}</td>
                            <td class="px-3 text-nowrap text-center">{{ $lpt->nim }}</td>
                            <td class="px-3 text-nowrap"><i class="fas fa-university"></i> {{ $lpt->kelas }}</td>
                            <td class="px-3 text-nowrap">
                                <a href=""
                                    class="btn {{ $lpt->status == 'Aktif' ? 'btn-success' : 'btn-danger' }} px-2 p-2 w-100">{{ $lpt->status }}</a>
                            </td>
                            <td class="px-3 text-nowrap text-center">
                                <a href="" class="btn btn-secondary" style="color: white;">
                                    <i class="bi bi-person-workspace"> {{ $lpt->job_desk }}</i>
                                </a>
                            </td>
                            <td class="px-3 text-nowrap">{{ $lpt->alamat }}</td>
                            <td class="px-3 text-nowrap">
                                @if ($lpt->type == 0)
                                    Mahasiswa
                                @elseif ($lpt->type == 1)
                                    Admin
                                @else
                                    Unknown
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
                                        <a class="dropdown-item" href="{{ route('Admin.form.edit_anggota', $lpt->id) }}">
                                            Edit</a>
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
