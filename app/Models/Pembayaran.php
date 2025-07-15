<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pemesanan',
        'tgl_pembayaran',
        'status_pembayaran',

    ];

    public function pemesanan()
        {
            return $this->hasOne(Pemesanan::class, 'id', 'id_pemesanan');
        }
}
