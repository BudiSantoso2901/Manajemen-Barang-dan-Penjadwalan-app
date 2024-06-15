@extends('_layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Create User</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <small class="text-muted float-end">Media Center Poliwangi</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.anggota') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="nim">NIM</label>
                            <input name="nim" type="text" class="form-control" id="nim" placeholder="Enter NIM"
                                value="{{ old('nim') }}" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama</label>
                            <input name="nama" type="text" class="form-control" id="nama" placeholder="Enter Name"
                                value="{{ old('nama') }}" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="alamat">Alamat</label>
                            <input name="alamat" type="text" class="form-control" id="alamat"
                                placeholder="Enter Address" value="{{ old('alamat') }}" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="kelas">Kelas</label>
                            <input name="kelas" type="text" class="form-control" id="kelas" placeholder="Enter Class"
                                value="{{ old('kelas') }}" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pengalaman">Pengalaman</label>
                            <input name="pengalaman" type="text" class="form-control" id="pengalaman"
                                placeholder="Enter Experience" value="{{ old('pengalaman') }}" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email"
                                placeholder="Enter Email" value="{{ old('email') }}" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password"
                                placeholder="Enter Password" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="type">Type</label>
                            <select name="type" class="form-control" id="type" required>
                                <option value="0">Mahasiswa</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="job_desk">Job Desk</label>
                            <input name="job_desk" type="text" class="form-control" id="job_desk"
                                placeholder="Enter Job Desk" value="{{ old('job_desk') }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phone_number">Phone Number</label>
                            <input name="phone_number" type="text" class="form-control" id="phone_number"
                                placeholder="Enter Phone Number" value="{{ old('phone_number') }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" class="form-control" id="status" required>
                                <option value="Aktif">Aktif</option>
                                <option value="Kurang Aktif">Kurang Aktif</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-outline-secondary" onclick="history.back()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
