@extends('_Layouts.main')

@section('content')
    <div class="col-11 mx-auto mb-5 border overflow-hidden"
        style="background-color: rgb(255, 255, 255); font-size: 13px; margin-top: 125px; border-radius: 10px">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center p-4">
            <h1 class="fs-5 mb-3 mb-sm-0">Ubah Status Jadwal</h1>
        </div>

        @if (session('success'))
            <div class="mt-3 alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @elseif (session('warning'))
            <div class="mt-3 alert alert-warning" role="alert">
                {{ session('warning') }}
            </div>
        @elseif (session('error'))
            <div class="mt-3 alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="p-4">
            <form action="{{ route('status.update', $jdw->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                        value="{{ $jdw->nama_kegiatan }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="Pending" {{ $jdw->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Completed" {{ $jdw->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Canceled" {{ $jdw->status == 'Canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kondisi_sesudah" class="form-label">Kondisi Sesudah Kegiatan (Video/Foto)</label>
                    <input type="file" class="form-control" id="kondisi_sesudah" name="kondisi_sesudah">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('user.jadwal') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection

