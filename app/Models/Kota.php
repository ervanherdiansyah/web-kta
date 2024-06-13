<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $guarded = [];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'kota_id');
    }
}
