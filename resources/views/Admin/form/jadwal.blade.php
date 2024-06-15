@extends('_Layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Jadwal</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <small class="text-muted float-end">Media Center Poliwangi</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Admin.jadwal.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama Kegiatan</label>
                                <input name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan"
                                    placeholder="..." />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="barang">Pilih Barang</label>
                                <div class="input-group">
                                    <select name="barangs[]" id="barang" multiple>
                                        @foreach ($nme as $item)
                                            @if ($item->jumlah_unit > 0)
                                                <option value="{{ $item->id }}" aria-placeholder="Pilih Item">
                                                    {{ $item->nama_barang }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="users[]">Pilih Petugas</label>
                                <div class="input-group">
                                    <select id="user" name="users[]" multiple>
                                        @foreach ($usr as $item)
                                            <option value="{{ $item->id }}" aria-placeholder="Pilih Item">
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Waktu</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="datetime-local" value="" name="waktu"
                                        id="waktu" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Kondisi Barang Sebelum Kegiatan</label>
                                <input class="form-control" type="file" id="kondisi_sebelum"
                                    name="kondisi_sebelum" />
                            </div>

                            <div>
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <input id="lokasi" name="lokasi" class="form-control form-control-sm" type="text"
                                    placeholder="..." />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="..."></textarea>
                            </div>
                            <button type="button" class="btn btn-outline-secondary" onclick="history.back()">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        new MultiSelectTag('user')
        new MultiSelectTag('barang')
    </script>
@endpush
