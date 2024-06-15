@extends('_Layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Barang</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <small class="text-muted float-end">Media Center Poliwangi</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama Barang</label>
                                <input name="nama_barang" type="text" class="form-control" id="nama_barang"
                                    placeholder="..." />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tanggal Beli</label>
                                <input class="form-control" type="datetime-local" value="" name="tanggal_beli"
                                    id="tanggal_beli" />
                            </div>
                            <div>
                                <label for="kondisi_barang" class="form-label">kondisi Barang</label>
                                <input id="kondisi_barang" name="kondisi_barang" class="form-control form-control-sm"
                                    type="text" placeholder="..." />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Jumlah unit</label>
                                <input type="number" id="jumlah_unit" name="jumlah_unit" class="form-control"
                                    placeholder="..." />
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
