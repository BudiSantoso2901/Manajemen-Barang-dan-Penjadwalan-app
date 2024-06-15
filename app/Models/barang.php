<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_barang',
        'tanggal_beli',
        'kondisi_barang',
        'jumlah_unit',
    ];
    // public function jadwals(){
    //     return $this->hasMany(jadwal::class);
    // }
    public function jadwals()
    {
        return $this->belongsToMany(Jadwal::class, 'jadwal_barang');
    }
}
