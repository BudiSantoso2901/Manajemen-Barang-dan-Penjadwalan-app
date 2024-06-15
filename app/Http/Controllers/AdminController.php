<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jadwal;
use App\Models\User;
use App\Models\barang;
use App\Models\liputan;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //USER
    public function viewAnggota()
    {
        $agt['allDataUser'] = User::all();
        return view("Admin.anggota", $agt);
    }
    public function create()
    {
        return view('admin.form.anggota');
    }
    public function createAnggota(Request $request)
    {
        // Validasi input sesuai kebutuhan
        $request->validate([
            'nim' => 'required|string|max:12|unique:users,nim',
            'type' => 'required|in:0,1',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'job_desk' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable|string',
            'status' => 'required|in:Aktif,Kurang Aktif',
            'kelas' => 'required|string',
            'pengalaman' => 'required|string',
            'password' => 'required|string|min:8',
        ]); {
            // Validasi form
            $request->validate([
                'nim' => 'required|string|max:12|unique:users,nim',
                'type' => 'required|in:0,1',
                'nama' => 'required|string',
                'alamat' => 'required|string',
                'job_desk' => 'nullable|string',
                'email' => 'required|email|unique:users,email',
                'phone_number' => 'nullable|string',
                'status' => 'required|in:Aktif,Kurang Aktif',
                'kelas' => 'required|string',
                'pengalaman' => 'required|string',
                'password' => 'required|string|min:8',
            ]);

            try {
                // Simpan data user baru
                $user = new User();
                $user->nim = $request->nim;
                $user->type = $request->type;
                $user->nama = $request->nama;
                $user->alamat = $request->alamat;
                $user->job_desk = $request->job_desk;
                $user->email = $request->email;
                $user->phone_number = $request->phone_number;
                $user->status = $request->status;
                $user->kelas = $request->kelas;
                $user->pengalaman = $request->pengalaman;
                $user->password = Hash::make($request->password);
                $user->save();

                // Redirect dengan pesan sukses
                return redirect()->route('Admin.view.anggota')->with('success', 'User berhasil ditambahkan!');
            } catch (\Exception $e) {
                // Tangani jika terjadi error saat menyimpan data
                return redirect()->back()->with('error', 'Gagal menambahkan user: ' . $e->getMessage())->withInput();
            }
        }
    }
    public function editAnggota($id)
    {
        $agt = User::findOrFail($id);
        return view('Admin.form.editAnggota', compact('agt'));
    }

    public function updateAnggota(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'type' => 'required|integer',
            'job_desk' => 'nullable|string|max:255',
            'status' => 'required|in:Aktif,Kurang Aktif',
        ]);

        $agt = User::findOrFail($id);
        //dd($agt);
        $agt->update([
            'type' => $request->type,
            'job_desk' => $request->job_desk,
            'status' => $request->status,
        ]);

        return redirect()->route('Admin.view.anggota', $agt->id)->with('success', 'Data User telah di Ubah.');
    }
    public function userdelete($id)
    {
        $deleteData = User::find($id);
        $deleteData->delete();

        return redirect()->route('Admin.view.anggota')->with('info', 'Delete Barang berhasil');
    }

    //Barang
    public function view_barang()
    {
        $brg['alldataBarang'] = barang::all();

        //dd($brg['alldataBarang']);
        return view('Admin.barang', $brg);
    }

    public function add_barang()
    {
        return view('Admin.form.barang');
    }
    public function barang_store(Request $Request)
    {
        $data = new barang();
        $data->nama_barang = $Request->nama_barang;
        $data->tanggal_beli = $Request->tanggal_beli;
        $data->kondisi_barang = $Request->kondisi_barang;
        $data->jumlah_unit = $Request->jumlah_unit;
        $data->save();

        return redirect()->route('Admin.view.barang')->with('success', 'Tambah Barang berhasil');
    }
    public function barangEdit($id)
    {
        $editData = barang::find($id);
        return view('Admin.form.edit_barang', compact('editData'));
    }
    public function barangUpdate(Request $request, $id)
    {
        $data = barang::find($id);
        $data->nama_barang = $request->nama_barang;
        $data->tanggal_beli = $request->tanggal_beli;
        $data->kondisi_barang = $request->kondisi_barang;
        $data->jumlah_unit = $request->jumlah_unit;
        $data->save();

        return redirect()->route('Admin.view.barang')->with('success', 'Update Barang berhasil');
    }
    public function barangDelete($id)
    {
        $deleteData = barang::find($id);
        $deleteData->delete();

        return redirect()->route('Admin.view.barang')->with('info', 'Delete Barang berhasil');
    }

    //LIPUTAN
    public function view_liputan()
    {
        $lpt['AllLiputan'] = liputan::all();

        return view('Admin.Liputan', $lpt);
    }
    public function add_liputan()
    {
        return view('Admin.form.liputan');
    }
    public function Store_Liputan(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required|date',
            'bukti_liputan' => 'required|url',
        ]);

        liputan::create($request->all());

        return redirect()->route('Admin.view.liputan')->with('success', 'Liputan kegiatan berhasil ditambahkan.');
    }
    public function liputandelete($id)
    {
        $deleteData = liputan::find($id);
        $deleteData->delete();

        return redirect()->route('Admin.view.liputan')->with('info', 'Delete Barang berhasil');
    }

    //JADWAL

    public function view_jadwal()
    {
        $jadwals = jadwal::with(['barangs', 'users'])->get();
        return view('Admin.jadwal', compact('jadwals'));
    }

    public function view_add_jadwal()
    {
        $nme = barang::all();
        $usr = User::all();

        return view('Admin.form.jadwal', compact('nme', 'usr'));
    }

    public function store_jadwal(Request $request)
    {
        // Validasi input sesuai kebutuhan
        $request->validate([
            'nama_kegiatan' => 'required|string',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'waktu' => 'required|date',
            'barangs' => 'array',
            'users' => 'array',
            'kondisi_sebelum' => 'required|file|mimes:jpeg,jpg,png,mp4|max:24000',
        ]);

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Membuat jadwal baru
            $jadwal = Jadwal::create([
                'nama_kegiatan' => $request->input('nama_kegiatan'),
                'deskripsi' => $request->input('deskripsi'),
                'lokasi' => $request->input('lokasi'),
                'waktu' => $request->input('waktu'),
            ]);

            // Menambahkan relasi dengan barangs dan users menggunakan sync
            $jadwal->barangs()->sync($request->input('barangs', []));
            $jadwal->users()->sync($request->input('users', []));

            // Mengurangi jumlah barang setiap barangnya
            foreach ($request->input('barangs', []) as $barangId) {
                $barang = Barang::find($barangId);

                if ($barang) {
                    // Periksa apakah jumlah barang mencukupi sebelum dikurangi
                    if ($barang->jumlah_unit > 0) {
                        $barang->jumlah_unit--;
                        $barang->save();
                    } else {
                        // Rollback transaksi jika jumlah barang tidak mencukupi
                        DB::rollBack();
                        return redirect()->route('Admin.view.jadwal')->with('error', 'Jumlah barang tidak mencukupi.');
                    }
                }
            }

            // Mengelola file kondisi_sebelum_video
            if ($request->hasFile('kondisi_sebelum')) {
                $file = $request->file('kondisi_sebelum');
                $fileName = time() . '_' . $file->getClientOriginalName();

                // Simpan video ke dalam direktori public/videos
                $file->storeAs('public/videos', $fileName);

                // Simpan nama file ke dalam database
                $jadwal->kondisi_sebelum = $fileName;
                $jadwal->save();
            }

            // Commit transaksi jika berhasil
            DB::commit();

            // Redirect atau lakukan sesuatu setelah pembuatan jadwal
            return redirect()->route('Admin.view.jadwal')->with('success', 'Jadwal berhasil dibuat!');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            // Handle kesalahan sesuai kebutuhan Anda
            return redirect()->route('Admin.view.jadwal')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function status_view_admin($id)
    {
        $jdw = jadwal::findOrFail($id);
        return view('Admin.Form.status', compact('jdw'));
    }
    public function edit_status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Completed,Canceled,Pending',
            'kondisi_sesudah' => 'nullable|file|mimes:jpeg,jpg,png,mp4|max:24000',
        ]);

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Temukan jadwal berdasarkan ID
            $jadwal = Jadwal::findOrFail($id);

            // Periksa apakah status yang diminta valid
            if ($jadwal->status !== $request->input('status')) {
                $jadwal->status = $request->input('status');
                $jadwal->save();

                // Mengembalikan stok barang jika status diubah menjadi 'Canceled'
                if ($request->input('status') === 'Canceled') {
                    foreach ($jadwal->barangs as $barang) {
                        $barang->jumlah_unit++;
                        $barang->save();
                    }
                }
                // Mengembalikan stok barang jika status diubah menjadi 'Completed'
                if ($request->input('status') === 'Completed') {
                    foreach ($jadwal->barangs as $barang) {
                        $barang->jumlah_unit++;
                        $barang->save();
                    }
                }

                // Mengelola file kondisi_sesudah_video
                if ($request->hasFile('kondisi_sesudah')) {
                    $file = $request->file('kondisi_sesudah');
                    $fileName = time() . '_' . $file->getClientOriginalName();

                    // Simpan video ke dalam direktori public/videos
                    $file->storeAs('public/videos', $fileName);

                    // Simpan nama file ke dalam database
                    $jadwal->kondisi_sesudah = $fileName;
                    $jadwal->save();
                }

                // Commit transaksi jika berhasil
                DB::commit();

                // Redirect atau lakukan sesuatu setelah pengubahan status
                return redirect()->route('Admin.view.jadwal')->with('success', 'Status berhasil diubah!');
            } else {
                // Tidak ada perubahan status, rollback transaksi
                DB::rollBack();
                return redirect()->route('Admin.view.jadwal')->with('warning', 'Tidak ada perubahan status.');
            }
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            // Handle kesalahan sesuai kebutuhan Anda
            return redirect()->route('Admin.view.jadwal')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function jadwaldelete($id)
    {
        try {
            // Temukan data jadwal berdasarkan ID
            $jadwal = Jadwal::findOrFail($id);

            // Mulai transaksi database
            DB::beginTransaction();

            // Hapus data jadwal
            $jadwal->delete();

            // Commit transaksi jika berhasil
            DB::commit();

            return redirect()->route('Admin.view.jadwal')->with('info', 'Data Jadwal berhasil dihapus');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            // Handle kesalahan dan redirect dengan pesan error
            return redirect()->route('Admin.view.jadwal')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function export()
    {
        // Fetch all jadwals with related data (barangs and users)
        $jadwals = Jadwal::with('barangs', 'users')->get();

        // CSV file name
        $csvFileName = 'jadwals.csv';

        // Headers for CSV file
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        // Open a stream to php://output
        $handle = fopen('php://output', 'w');

        // Write headers to the CSV file
        fputcsv($handle, [
            'Nama Kegiatan',
            'Deskripsi',
            'Lokasi',
            'Waktu',
            'Status',
            // 'Kondisi Sebelum',
            // 'Kondisi Sesudah',
            'Barang',
            'User',
        ]);

        // Iterate through jadwals and write each row to the CSV file
        foreach ($jadwals as $jadwal) {
            // Initialize variables to store barang names and user names
            $barangs = [];
            $users = [];

            // Collect barang names
            foreach ($jadwal->barangs as $barang) {
                $barangs[] = $barang->nama; // Assuming 'nama' is the attribute name for barang name
            }

            // Collect user names
            foreach ($jadwal->users as $user) {
                $users[] = $user->name; // Assuming 'name' is the attribute name for user name
            }

            // Write row to CSV file
            fputcsv($handle, [
                $jadwal->nama_kegiatan,
                $jadwal->deskripsi,
                $jadwal->lokasi,
                $jadwal->waktu,
                $jadwal->status,
                // $jadwal->kondisi_sebelum,
                // $jadwal->kondisi_sesudah,
                implode(', ', $barangs), // Convert array of barang names to comma-separated string
                implode(', ', $users), // Convert array of user names to comma-separated string
            ]);
        }

        // Close the file handle
        fclose($handle);

        // Return response with headers
        return Response('', 200, $headers);
    }
    public function exportBarang()
    {
        $barangs = Barang::all();
        $dateTime = date('Y-m-d_H-i-s'); // Get the current date and time
        $csvFileName = "barangs_export_{$dateTime}.csv"; // Include the date and time in the file name
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['Nama Barang', 'Tanggal Beli', 'Kondisi Barang', 'Jumlah Unit', 'Tanggal Ekspor']); // Add more headers as needed

        foreach ($barangs as $barang) {
            fputcsv($handle, [
                $barang->nama_barang,
                $barang->tanggal_beli,
                $barang->kondisi_barang,
                $barang->jumlah_unit,
                $dateTime // Add export date to each row
            ]);
        }

        fclose($handle);

        return Response('', 200, $headers);
    }
}
