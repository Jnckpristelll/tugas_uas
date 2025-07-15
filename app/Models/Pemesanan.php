<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pelanggan',
        'tanggal',
        'status_dp',
        'durasi_jam',
        'jam_mulai',
        'jam_selesai',
    ];

     public function pelanggan()
        {
            return $this->hasOne(Pelanggan::class, 'id', 'id_pelanggan');
        }


    public function pembayaran()
    {
        return $this->belongTo(Pembayaran::class);
    }
}
