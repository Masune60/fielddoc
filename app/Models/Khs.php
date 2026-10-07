<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khs extends Model
{
    use HasFactory;

    protected $table = 'khs';
    protected $fillable = ['nomor_khs', 'judul_kontrak', 'tanggal_mulai', 'tanggal_selesai', 'status_kontrak'];

    public function krs()
    {
        return $this->hasMany(Kr::class, 'khs_id');
    }
}