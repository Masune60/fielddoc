<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoDokumentasi extends Model
{
    use HasFactory;

    protected $table = 'foto_dokumentasis';
    protected $fillable = ['pk_id', 'uploader_id', 'file_path_url', 'latitude', 'longitude', 'timestamp_exif', 'status_verifikasi'];

    public function pk()
    {
        return $this->belongsTo(Pk::class, 'pk_id');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploader_id');
    }
}
