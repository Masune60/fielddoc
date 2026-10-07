<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah KHS Baru</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('khs.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <x-input-label for="nomor_khs" value="Nomor KHS" />
                        <x-text-input id="nomor_khs" class="block mt-1 w-full" type="text" name="nomor_khs" placeholder="" required />
                    </div>
                    <div>
                        <x-input-label for="judul_kontrak" value="Judul Kontrak Induk" />
                        <x-text-input id="judul_kontrak" class="block mt-1 w-full" type="text" name="judul_kontrak" placeholder="" required />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="tanggal_mulai" value="Tanggal Mulai" />
                            <x-text-input id="tanggal_mulai" class="block mt-1 w-full" type="date" name="tanggal_mulai" required />
                        </div>
                        <div>
                            <x-input-label for="tanggal_selesai" value="Tanggal Selesai" />
                            <x-text-input id="tanggal_selesai" class="block mt-1 w-full" type="date" name="tanggal_selesai" required />
                        </div>
                    </div>
                    <div>
                        <x-input-label for="status_kontrak" value="Status Kontrak" />
                        <select id="status_kontrak" name="status_kontrak" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                            <option value="AKTIF">AKTIF</option>
                            <option value="NONAKTIF">NONAKTIF</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-2 pt-4">
                        <a href="{{ route('khs.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md text-sm">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700">Simpan KHS</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>