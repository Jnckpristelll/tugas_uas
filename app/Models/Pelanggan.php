<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pelanggan',
        'no_hp',
        'nama_tim',
    ];

    public function pemesanan()
    {
        return $this->belongTo(Pemesanan::class);
    }
}
