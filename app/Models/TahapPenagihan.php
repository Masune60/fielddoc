<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahapPenagihan extends Model
{
    use HasFactory;

    protected $table = 'tahap_penagihans';
    protected $fillable = ['kr_id', 'nomor_tahap', 'tanggal_pengajuan', 'status_penagihan'];

    public function kr()
    {
        return $this->belongsTo(Kr::class, 'kr_id');
    }

    public function pks()
    {
        return $this->hasMany(Pk::class, 'tahap_id');
    }
}
