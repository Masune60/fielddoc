<?php

namespace App\Http\Controllers;

use App\Models\TahapPenagihan;
use Illuminate\Support\Str;
use ZipArchive;

class ExportZipController extends Controller
{
    public function download(TahapPenagihan $tahap)
    {
        $tahap->load(['kr.khs', 'pks.fotoDokumentasis']);

        $khsName = Str::slug($tahap->kr->khs->nomor_khs ?? 'KHS-UNASSIGNED');
        $krName = Str::slug($tahap->kr->nomor_kr ?? 'KR-UNASSIGNED');
        $tahapName = Str::slug($tahap->nomor_tahap);

        $zipFileName = "FIELDDOC_{$khsName}_{$tahapName}.zip";
        $zipPath = storage_path("app/public/{$zipFileName}");

        $zip = new ZipArchive();
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            $hasFiles = false;

            foreach ($tahap->pks as $pk) {
                $pkFolder = Str::slug($pk->nomor_pk);

                foreach ($pk->fotoDokumentasis as $index => $foto) {
                    $filePhysicalPath = storage_path('app/public/' . $foto->file_path_url);

                    if (file_exists($filePhysicalPath)) {
                        $extension = pathinfo($filePhysicalPath, PATHINFO_EXTENSION);
                        // Struktur Folder: [KHS] / [KR] / [Tahap_X] / [PK] / [Foto.jpg]
                        $insideZipPath = "{$khsName}/{$krName}/{$tahapName}/{$pkFolder}/foto_" . ($index + 1) . ".{$extension}";

                        $zip->addFile($filePhysicalPath, $insideZipPath);
                        $hasFiles = true;
                    }
                }
            }

            $zip->close();

            if (!$hasFiles) {
                if (file_exists($zipPath)) unlink($zipPath);
                return redirect()->back()->with('error', 'Belum ada foto dokumentasi yang diunggah di dalam Tahap Penagihan ini.');
            }

            return response()->download($zipPath)->deleteFileAfterSend(true);
        }

        return redirect()->back()->with('error', 'Gagal membuat file ZIP.');
    }
}
