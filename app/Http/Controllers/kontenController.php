<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\User;
use App\Models\barang;
use App\Models\liputan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class kontenController extends Controller
{

    //FITUR JADWAL
    public function JadwalView()
    {

        $userId = auth()->id();
        $alldatajadwal = Jadwal::whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->where('status', 'Pending')
            ->with(['barangs', 'users'])
            ->get();

        return view('user.jadwal', compact('alldatajadwal'));
    }

    public function inputJadwal()
    {
        $nme = barang::all();
        $usr = User::all();
        return view('Form.InputJadwal', compact('nme', 'usr'));
    }
    public function store_jadwal(Request $request)
    {
        // Validasi inputan user
        $validator = Validator::make($request->all(), [
            'nama_kegiatan' => 'required|string',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'waktu' => 'required|date',
            'kondisi_sebelum' => 'required|file|mimes:jpeg,jpg,png,mp4|max:24000',
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
        ]);

        // Jika validasi gagal, tampilkan pesan error
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }

        // Simpan data jadwal
        $jadwal = jadwal::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'waktu' => $request->waktu,
            'kondisi_sebelum' => $request->kondisi_sebelum->store('public/videos'),
            'user_id' => $request->user_id,
            'barang_id' => $request->barang_id,
            'status' => 'Pending', // Set status secara default ke "Pending"
        ]);

        // Kurangi stok barang jika jadwal berhasil disimpan
        if ($jadwal) {
            $barang = barang::find($request->barang_id);
            if ($barang && $barang->jumlah_unit > 0) {
                $barang->jumlah_unit--;
                $barang->save();

                return redirect()->route('user.jadwal')->with('success', 'Jadwal berhasil dibuat.');
            }

            // Jika stok barang tidak mencukupi, hapus jadwal yang sudah disimpan
            $jadwal->delete();

            return response()->json([
                'status' => false,
                'message' => 'Stok barang tidak mencukupi'
            ], 400);
        }

        // Jika data gagal disimpan, tampilkan pesan error
        return response()->json([
            'status' => false,
            'message' => 'Jadwal gagal dibuat'
        ], 500);
    }
    public function status_view($id)
    {
        $jdw = jadwal::findOrFail($id);
        return view('user.form.status', compact('jdw'));
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
                return redirect()->route('user.jadwal')->with('success', 'Status berhasil diubah!');
            } else {
                // Tidak ada perubahan status, rollback transaksi
                DB::rollBack();
                return redirect()->route('user.jadwal')->with('warning', 'Tidak ada perubahan status.');
            }
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            // Handle kesalahan sesuai kebutuhan Anda
            return redirect()->route('user.jadwal')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    //END

    public function liputanVIew()
    {
        $lpt['alldataliputan'] = liputan::all();
        return view('user.liputan', $lpt);
    }
    public function anggotaVIew()
    {
        $agt['allDataUser'] = User::all();
        return view('user.anggota', $agt);
    }
    public function barangVIew()
    {
        $brg['alldataBarang'] = barang::all();
        return view('user.barang', $brg);
    }
    public function dashVIew()
    {
        return view('dash');
    }
    //fitur Konten
    public function inpuLiputanView()
    {
        return view('Form.inputLiputan');
    }
    public function StoreLiputan(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required|date',
            'bukti_liputan' => 'required|url',
        ]);

        liputan::create($request->all());

        return redirect()->route('user.liputan')->with('success', 'Liputan kegiatan berhasil ditambahkan.');
    }
    public function destroyLiputan($id)
    {
        $liputan = Liputan::find($id);
        $liputan->delete();

        return redirect()->route('user.liputan')
            ->with('success', 'Liputan kegiatan berhasil dihapus.');
    }
    // Jadwal

}
