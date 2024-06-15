<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_kegiatan',
        'deskripsi',
        'lokasi',
        'waktu',
        'status',
        'kondisi_sebelum',
        'kondisi_sesudah',
        'user_id',
        'barang_id',

    ];
    public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'jadwal_barang')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'jadwal_user')->withTimestamps();
    }
}
