<?php

namespace App\Http\Controllers;

use App\Models\Pk;
use App\Models\TahapPenagihan;
use Illuminate\Http\Request;

class PkController extends Controller
{
    public function index()
    {
        $pks = Pk::with(['tahapPenagihan.kr.khs', 'fotoDokumentasis'])->latest()->paginate(10);
        return view('pk.index', compact('pks'));
    }

    public function create(Request $request)
    {
        $tahaps = TahapPenagihan::with('kr.khs')->get();
        $selectedTahapId = $request->get('tahap_id');
        return view('pk.create', compact('tahaps', 'selectedTahapId'));
    }

    public function store(Request $request)
{
    $request->validate([
        'tahap_id' => 'nullable|exists:tahap_penagihans,id',
        'nomor_pk' => 'required|string|unique:pks,nomor_pk',
        'nama_pekerjaan' => 'required|string|max:255',
        'nilai_pekerjaan' => 'required|numeric|min:0',
        'status_konstruksi' => 'required|in:PROSES,SELESAI_100',
    ]);

    Pk::create($request->all());

    return redirect()->route('pk.index')->with('success', 'Surat Perintah Kerja (PK) berhasil ditambahkan.');
}

    public function show(Pk $pk)
    {
        $pk->load(['tahapPenagihan.kr.khs', 'fotoDokumentasis.uploader']);
        return view('pk.show', compact('pk'));
    }

    public function edit(Pk $pk)
    {
        $tahaps = TahapPenagihan::with('kr.khs')->get();
        return view('pk.edit', compact('pk', 'tahaps'));
    }

    public function update(Request $request, Pk $pk)
{
    $request->validate([
        'tahap_id' => 'nullable|exists:tahap_penagihans,id',
        'nomor_pk' => 'required|string|unique:pks,nomor_pk,' . $pk->id,
        'nama_pekerjaan' => 'required|string|max:255',
        'nilai_pekerjaan' => 'required|numeric|min:0',
        'status_konstruksi' => 'required|in:PROSES,SELESAI_100',
    ]);

    $pk->update($request->all());

    return redirect()->route('pk.index')->with('success', 'PK/SPK berhasil diperbarui.');
}

    public function destroy(Pk $pk)
    {
        $pk->delete();
        return redirect()->route('pk.index')->with('success', 'PK/SPK berhasil dihapus.');
    }
}