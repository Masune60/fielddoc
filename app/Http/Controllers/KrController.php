<?php

namespace App\Http\Controllers;

use App\Models\Khs;
use App\Models\Kr;
use Illuminate\Http\Request;

class KrController extends Controller
{
    public function create(Request $request)
    {
        $khsList = Khs::where('status_kontrak', 'AKTIF')->get();
        $selectedKhsId = $request->get('khs_id');
        return view('kr.create', compact('khsList', 'selectedKhsId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'khs_id' => 'required|exists:khs,id',
            'nomor_kr' => 'required|string|unique:krs,nomor_kr',
            'spesifikasi_teknis' => 'nullable|string',
            'syarat_apd_k3' => 'nullable|string',
            'standar_material' => 'nullable|string',
        ]);

        Kr::create($request->all());

        return redirect()->route('khs.show', $request->khs_id)->with('success', 'Kontrak Rinci (KR) berhasil ditambahkan.');
    }

    public function edit(Kr $kr)
    {
        $khsList = Khs::all();
        return view('kr.edit', compact('kr', 'khsList'));
    }

    public function update(Request $request, Kr $kr)
    {
        $request->validate([
            'khs_id' => 'required|exists:khs,id',
            'nomor_kr' => 'required|string|unique:krs,nomor_kr,' . $kr->id,
            'spesifikasi_teknis' => 'nullable|string',
            'syarat_apd_k3' => 'nullable|string',
            'standar_material' => 'nullable|string',
        ]);

        $kr->update($request->all());

        return redirect()->route('khs.show', $request->khs_id)->with('success', 'Kontrak Rinci (KR) berhasil diperbarui.');
    }

    public function destroy(Kr $kr)
    {
        $khsId = $kr->khs_id;
        $kr->delete();
        return redirect()->route('khs.show', $khsId)->with('success', 'Kontrak Rinci (KR) berhasil dihapus.');
    }
}