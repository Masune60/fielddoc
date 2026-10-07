<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pk extends Model
{
    use HasFactory;

    protected $table = 'pks';
    protected $fillable = ['tahap_id', 'nomor_pk', 'nama_pekerjaan', 'nilai_pekerjaan', 'status_konstruksi'];

    public function tahapPenagihan()
    {
        return $this->belongsTo(TahapPenagihan::class, 'tahap_id');
    }

    public function fotoDokumentasis()
    {
        return $this->hasMany(FotoDokumentasi::class, 'pk_id');
    }
}
