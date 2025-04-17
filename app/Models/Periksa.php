<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    // Menonaktifkan timestamps jika tidak digunakan
    public $timestamps = false;

    // Menentukan kolom yang bisa diisi massal
    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'tgl_periksa',
        'catatan',
        'biaya_periksa',
    ];

    /**
     * Relasi dengan model Pasien (User)
     */
    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    /**
     * Relasi dengan model Dokter (User)
     */
    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }

    /**
     * Relasi dengan model Obat (melalui DetailPeriksa)
     */
    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'detail_periksas', 'id_periksa', 'id_obat');
    }
}
