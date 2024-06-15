@extends('_Layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Update Barang</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <small class="text-muted float-end">Media Center Poliwangi</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Admin.barang.update', $editData->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="nama_barang">Nama Barang</label>
                                <input name="nama_barang" type="text" class="form-control" id="nama_barang"
                                    value="{{ old('nama_barang', $editData->nama_barang) }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tanggal_beli">Tanggal Beli</label>
                                <input name="tanggal_beli" type="date" class="form-control" id="tanggal_beli"
                                    value="{{ old('tanggal_beli', $editData->tanggal_beli) }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="kondisi_barang">Kondisi Barang</label>
                                <select name="kondisi_barang" class="form-control" id="kondisi_barang" required>
                                    <option value="Baik" {{ $editData->kondisi_barang == 'Baik' ? 'selected' : '' }}>Baik
                                    </option>
                                    <option value="Rusak" {{ $editData->kondisi_barang == 'Rusak' ? 'selected' : '' }}>Rusak
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jumlah_unit">Jumlah Unit</label>
                                <input name="jumlah_unit" type="number" class="form-control" id="jumlah_unit"
                                    value="{{ old('jumlah_unit', $editData->jumlah_unit) }}" required />
                            </div>
                            <button type="button" class="btn btn-outline-secondary"
                                onclick="history.back()">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Barang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
