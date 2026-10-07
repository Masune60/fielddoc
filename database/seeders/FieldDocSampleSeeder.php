<?php

namespace Database\Seeders;

use App\Models\Khs;
use App\Models\Kr;
use App\Models\Pk;
use App\Models\TahapPenagihan;
use Illuminate\Database\Seeder;

class FieldDocSampleSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Sampel Data KHS
        $khs = Khs::create([
            'nomor_khs' => '0964.Pj/DAN.01.03/F04000000/2026',
            'judul_kontrak' => 'KHS PEKERJAAN PEMASANGAN, PEMBONGKARAN, DAN PENGADAAN MATERIAL NON MDU ZONA 2 PT DIAN CAHAYA PRIMA',
            'tanggal_mulai' => '2026-01-01',
            'tanggal_selesai' => '2026-12-31',
            'status_kontrak' => 'AKTIF',
        ]);

        // 2. Sampel Data KR 0147
        $kr147 = Kr::create([
            'khs_id' => $khs->id,
            'nomor_kr' => 'KR 0147.Pj/HKM.02.01/F04000000/2026',
            'spesifikasi_teknis' => 'Pekerjaan Pemasangan JTR & SR 3 Phasa Zona 2',
            'syarat_apd_k3' => 'Helm, Sepatu Safety, Sarung Tangan Listrik',
            'standar_material' => 'Standar Konstruksi PLN',
        ]);

        // 3. Sampel Tahap Penagihan under KR 0147
        $tahap1 = TahapPenagihan::create([
            'kr_id' => $kr147->id,
            'nomor_tahap' => 'Tahap 1',
            'tanggal_pengajuan' => '2026-10-01',
            'status_penagihan' => 'DRAFT',
        ]);

        // 4. Sampel PK / SPK Pekerjaan
        Pk::create([
            'tahap_id' => $tahap1->id,
            'nomor_pk' => 'PK-001/DCP/2026',
            'nama_pekerjaan' => 'Pemasangan JTR & SR 3 Phasa Kec. Jombang',
            'nilai_pekerjaan' => 15000000,
            'status_konstruksi' => 'SELESAI_100',
        ]);

        Pk::create([
            'tahap_id' => $tahap1->id,
            'nomor_pk' => 'PK-002/DCP/2026',
            'nama_pekerjaan' => 'Pengadaan Material Aksesories APP 3 Phasa',
            'nilai_pekerjaan' => 8500000,
            'status_konstruksi' => 'PROSES',
        ]);
    }
}
