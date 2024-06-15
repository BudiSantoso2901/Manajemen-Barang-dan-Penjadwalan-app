<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'nama',
    //     'alamat',
    //     'phone_number',
    //     'kelas',
    //     'nim',
    //     'pengalaman',
    //     'job_desk',
    //     'email',
    //     'password',
    //     'status',
    //     'type'
    // ];
    protected $fillable = [
        'nim',
        'type',
        'nama',
        'alamat',
        'job_desk',
        'email',
        'phone_number',
        'status',
        'kelas',
        'pengalaman',
        'profile_picture',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    //Relasi antara jadwal

    // public function jadwals(){
    //     return $this->hasMany(jadwal::class);
    // }
    public function jadwals()
    {
        return $this->belongsToMany(jadwal::class, 'jadwal_user');
    }
}
