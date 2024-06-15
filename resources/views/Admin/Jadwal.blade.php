@extends('_Layouts.main')

@section('content')
    <div class="col-11 mx-auto mb-5 border overflow-hidden"
        style="background-color: rgb(255, 255, 255); font-size: 13px; margin-top: 125px; border-radius: 10px">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center p-4">
            <h1 class="fs-5 mb-3 mb-sm-0">Data Jadwal</h1>
            <a href="{{ route('Admin.Form.InputJadwal') }}" class="btn btn-success align-self-end" style="border-radius: 25px">
                <span>Tambah Jadwal</span>
            </a>

        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center p-4">
            <h1 class="fs-5 mb-3 mb-sm-0"></h1>
            <a href="{{ route('export-jadwal') }}" class="btn btn-secondary align-self-end" style="border-radius: 25px"><i
                    class="bi bi-filetype-csv"></i> Export
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
                        <th class="text-tertiary fw-semibold px-3 text-nowrap">Petugas</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap">Barang</th>
                        <th class="text-tertiary fw-semibold text-center px-3 text-nowrap">Status</th>
                        <th class="text-tertiary fw-semibold px-3 text-nowrap">Lokasi</th>
                        <th class="text-tertiary fw-semibold text-center px-3 text-nowrap">Waktu</th>
                        <th class="text-tertiary fw-semibold text-center px-3 text-nowrap">Kondisi Sebelum</th>
                        <th class="text-tertiary fw-semibold text-center px-3 text-nowrap">Kondisi Sesudah</th>
                        {{-- <th class="text-tertiary fw-semibold text-center px-3 text-nowrap">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwals as $key => $jdw)
                        <tr>
                            <td class="text-tertiary text-center px-3 text-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-3 text-nowrap">{{ $jdw->nama_kegiatan }}</td>
                            <td class="px-3 text-nowrap">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#deskripsiModal{{ $jdw->id }}">
                                    <i class="bi bi-book-fill"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deskripsiModal{{ $jdw->id }}" tabindex="-1"
                                    aria-labelledby="deskripsiModalLabel{{ $jdw->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="deskripsiModalLabel{{ $jdw->id }}">
                                                    Deskripsi</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $jdw->deskripsi }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 text-nowrap">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#userModal{{ $jdw->id }}">
                                    <i class="bi bi-people"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="userModal{{ $jdw->id }}" tabindex="-1"
                                    aria-labelledby="userModalLabel{{ $jdw->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="userModalLabel{{ $jdw->id }}">Daftar
                                                    Anggota</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <ol>
                                                    @foreach ($jdw->users as $user)
                                                        <li>{{ $user->nama }}</li>
                                                    @endforeach
                                                </ol>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 text-nowrap">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#barangModal{{ $jdw->id }}">
                                    <i class="fas fa-laptop"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="barangModal{{ $jdw->id }}" tabindex="-1"
                                    aria-labelledby="barangModalLabel{{ $jdw->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="barangModalLabel{{ $jdw->id }}">
                                                    Daftar Barang</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <ol>
                                                    @foreach ($jdw->barangs as $barang)
                                                        <li>{{ $barang->nama_barang }}</li>
                                                    @endforeach
                                                </ol>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center px-3 text-nowrap">
                                @if ($jdw->status == 'Pending')
                                    <span class="badge text-bg-warning">{{ $jdw->status }}</span>
                                @elseif ($jdw->status == 'Completed')
                                    <span class="badge bg-success px-3 p-2 w-100">{{ $jdw->status }}</span>
                                @elseif ($jdw->status == 'Canceled')
                                    <span class="badge text-bg-danger">{{ $jdw->status }}</span>
                                @endif
                            </td>
                            <td class="px-3 text-nowrap">{{ $jdw->lokasi }}</td>
                            <td class="px-3 text-nowrap text-center">{{ $jdw->waktu }}</td>
                            <td class="px-3 text-nowrap text-center">
                                @if ($jdw->kondisi_sebelum)
                                    <img src="{{ Storage::url('videos/' . $jdw->kondisi_sebelum) }}"
                                        alt="Kondisi Sebelum Video" style="width: 100px">
                                @else
                                    <p>Tidak ada Gambar</p>
                                @endif
                            </td>
                            <td class="px-3 text-nowrap text-center">
                                @if ($jdw->kondisi_sesudah)
                                    <img src="{{ Storage::url('videos/' . $jdw->kondisi_sesudah) }}"
                                        alt="Kondisi Sesudah Video" style="width: 100px">
                                @else
                                    <p>Tidak ada Gambar</p>
                                @endif
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
