<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail PK: {{ $pk->nomor_pk }}</h2>
            <span class="px-3 py-1 text-xs font-bold rounded-full {{ $pk->status_konstruksi === 'SELESAI_100' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                Status: {{ $pk->status_konstruksi }}
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <p class="text-sm text-gray-600">Nama Pekerjaan: <strong class="text-gray-900">{{ $pk->nama_pekerjaan }}</strong></p>
                <p class="text-sm text-gray-600">Nilai Pekerjaan: <strong class="text-gray-900">Rp {{ number_format($pk->nilai_pekerjaan, 0, ',', '.') }}</strong></p>
                <p class="text-sm text-gray-600">Tahap Penagihan: <strong class="text-gray-900">{{ $pk->tahapPenagihan->nomor_tahap ?? 'Belum Dikaitkan' }}</strong></p>
            </div>

            <!-- Form Upload Foto (Tambahkan di dalam container show.blade.php) -->
<div class="bg-white p-6 rounded-lg shadow-sm mb-6">
    <h4 class="font-bold text-md text-gray-700 mb-3">Upload Foto Dokumentasi (Ber-Geotag GPS)</h4>
    <form action="{{ route('foto.store', $pk) }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-4">
        @csrf
        <input type="file" name="foto" accept="image/jpeg,image/jpg,image/png" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700 whitespace-nowrap">
            + Unggah Foto
        </button>
    </form>
</div>

            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="font-bold text-md text-gray-700">Foto Dokumentasi Lapangan</h4>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @forelse ($pk->fotoDokumentasis as $foto)
                        <div class="border rounded-lg p-2 shadow-sm">
                            <img src="{{ asset('storage/' . $foto->file_path_url) }}" alt="Foto Dokumentasi" class="w-full h-48 object-cover rounded-md mb-2">
                            <div class="mt-2 text-xs text-gray-600 space-y-1">
                                <p><strong>GPS:</strong> {{ $foto->latitude }}, {{ $foto->longitude }}</p>
                                <p><strong>Tgl EXIF:</strong> {{ $foto->timestamp_exif ?? '-' }}</p>
                                <p><strong>Uploader:</strong> {{ $foto->uploader->nama_lengkap ?? 'System' }}</p>
                                <p>
                                    <strong>Verifikasi:</strong> 
                                    <span class="font-bold {{ $foto->status_verifikasi === 'VALID' ? 'text-green-600' : ($foto->status_verifikasi === 'INVALID' ? 'text-red-600' : 'text-yellow-600') }}">
                                        {{ $foto->status_verifikasi }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 col-span-3 py-4 text-center">Belum ada foto dokumentasi yang diunggah untuk PK ini.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>