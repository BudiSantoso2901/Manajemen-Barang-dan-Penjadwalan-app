@extends('_Layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Liputan</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <small class="text-muted float-end">Media Center Poliwangi</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Admin.liputan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="nama_kegiatan" for="basic-default-fullname">Nama Kegiatan</label>
                                <input id="nama_kegiatan" name="nama_kegiatan" type="text" class="form-control"
                                    id="basic-default-fullname" placeholder="..." />
                            </div>
                            <div class="mb-3">
                                <label class="bukti_liputan" for="basic-default-fullname">Link G-Drive</label>
                                <input id="bukti_liputan" name="bukti_liputan" type="text" class="form-control"
                                    id="basic-default-fullname" placeholder="..." />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="deskripsi_kegiatan">Deskripsi</label>
                                <textarea id="deskripsi_kegiatan" name="deskripsi_kegiatan" class="form-control" placeholder="..."></textarea>
                            </div>
                            <div class="mb-3 row">
                                <label for="waktu" class="col-md-2 col-form-label">Datetime</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="datetime-local" value="" id="waktu"
                                        name="waktu" />
                                </div>
                            </div>
                            <div>
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <input id="lokasi" name="lokasi" class="form-control form-control-sm" type="text"
                                    placeholder="..." />
                            </div>
                            <br>
                            <button type="button" class="btn btn-outline-secondary" onclick="history.back()">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
