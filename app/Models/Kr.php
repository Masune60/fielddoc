<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kr extends Model
{
    use HasFactory;

    protected $table = 'krs';
    protected $fillable = ['khs_id', 'nomor_kr', 'spesifikasi_teknis', 'syarat_apd_k3', 'standar_material'];

    public function khs()
    {
        return $this->belongsTo(Khs::class, 'khs_id');
    }

    public function tahapPenagihans()
    {
        return $this->hasMany(TahapPenagihan::class, 'kr_id');
    }
}
