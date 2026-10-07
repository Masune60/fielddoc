<?php

namespace App\Http\Controllers;

use App\Models\Khs;
use Illuminate\Http\Request;

class KhsController extends Controller
{
    public function index()
    {
        $khsList = Khs::withCount('krs')->latest()->paginate(10);
        return view('khs.index', compact('khsList'));
    }

    public function create()
    {
        return view('khs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_khs' => 'required|string|unique:khs,nomor_khs',
            'judul_kontrak' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status_kontrak' => 'required|in:AKTIF,NONAKTIF',
        ]);

        Khs::create($request->all());

        return redirect()->route('khs.index')->with('success', 'Data KHS berhasil ditambahkan.');
    }

    public function show(Khs $kh)
    {
        $kh->load('krs');
        return view('khs.show', compact('kh'));
    }

    public function edit(Khs $kh)
    {
        return view('khs.edit', ['khs' => $kh]);
    }

    public function update(Request $request, Khs $kh)
    {
        $request->validate([
            'nomor_khs' => 'required|string|unique:khs,nomor_khs,' . $kh->id,
            'judul_kontrak' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status_kontrak' => 'required|in:AKTIF,NONAKTIF',
        ]);

        $kh->update($request->all());

        return redirect()->route('khs.index')->with('success', 'Data KHS berhasil diperbarui.');
    }

    public function destroy(Khs $kh)
    {
        $kh->delete();
        return redirect()->route('khs.index')->with('success', 'Data KHS berhasil dihapus.');
    }
}