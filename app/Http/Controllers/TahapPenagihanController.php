<?php

namespace App\Http\Controllers;

use App\Models\Kr;
use App\Models\TahapPenagihan;
use Illuminate\Http\Request;

class TahapPenagihanController extends Controller
{
    public function index()
    {
        $tahapList = TahapPenagihan::with(['kr.khs', 'pks'])->latest()->paginate(10);
        return view('tahap.index', compact('tahapList'));
    }

    public function create(Request $request)
    {
        $krs = Kr::with('khs')->get();
        $selectedKrId = $request->get('kr_id');
        return view('tahap.create', compact('krs', 'selectedKrId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kr_id' => 'required|exists:krs,id',
            'nomor_tahap' => 'required|string|max:100',
            'tanggal_pengajuan' => 'nullable|date',
            'status_penagihan' => 'required|in:DRAFT,DIAJUKAN,DICAIRKAN',
        ]);

        TahapPenagihan::create($request->all());

        return redirect()->route('tahap.index')->with('success', 'Tahap Penagihan berhasil dibuat.');
    }

    public function show(TahapPenagihan $tahap)
    {
        $tahap->load(['kr.khs', 'pks.fotoDokumentasis']);
        return view('tahap.show', compact('tahap'));
    }

    public function edit(TahapPenagihan $tahap)
    {
        $krs = Kr::with('khs')->get();
        return view('tahap.edit', compact('tahap', 'krs'));
    }

    public function update(Request $request, TahapPenagihan $tahap)
    {
        $request->validate([
            'kr_id' => 'required|exists:krs,id',
            'nomor_tahap' => 'required|string|max:100',
            'tanggal_pengajuan' => 'nullable|date',
            'status_penagihan' => 'required|in:DRAFT,DIAJUKAN,DICAIRKAN',
        ]);

        $tahap->update($request->all());

        return redirect()->route('tahap.index')->with('success', 'Tahap Penagihan berhasil diperbarui.');
    }

    public function destroy(TahapPenagihan $tahap)
    {
        $tahap->delete();
        return redirect()->route('tahap.index')->with('success', 'Tahap Penagihan berhasil dihapus.');
    }
}