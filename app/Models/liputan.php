<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class liputan extends Model
{
    use HasFactory;
    protected $table = 'liputans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_kegiatan',
        'deskripsi_kegiatan',
        'lokasi',
        'waktu',
        'bukti_liputan',
    ];
}
