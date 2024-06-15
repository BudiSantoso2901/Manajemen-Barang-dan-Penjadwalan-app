@extends('_layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit User</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <small class="text-muted float-end">Media Center Poliwangi</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Admin.form.update', $agt->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="type">Role</label>
                                <select name="type" class="form-control" id="type" required>
                                    <option value="0" {{ $agt->type == 0 ? 'selected' : '' }}>Mahasiswa</option>
                                    <option value="1" {{ $agt->type == 1 ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="job_desk">Job Desk</label>
                                <input name="job_desk" type="text" class="form-control" id="job_desk"
                                    placeholder="Enter Job Desk" value="{{ old('job_desk', $agt->job_desk) }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="status">Status</label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="Aktif" {{ $agt->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Kurang Aktif" {{ $agt->status == 'Kurang Aktif' ? 'selected' : '' }}>
                                        Kurang Aktif</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-outline-secondary"
                                onclick="history.back()">Cancel</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
