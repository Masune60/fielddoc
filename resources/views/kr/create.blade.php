<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Kontrak Rinci (KR)</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('kr.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <x-input-label for="khs_id" value="Pilih Payung Hukum (KHS)" />
                        <select id="khs_id" name="khs_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                            @foreach ($khsList as $khs)
                                <option value="{{ $khs->id }}" {{ $selectedKhsId == $khs->id ? 'selected' : '' }}>{{ $khs->nomor_khs }} - {{ $khs->judul_kontrak }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-input-label for="nomor_kr" value="Nomor KR" />
                        <x-text-input id="nomor_kr" class="block mt-1 w-full" type="text" name="nomor_kr" placeholder="" required />
                    </div>
                    <div>
                        <x-input-label for="spesifikasi_teknis" value="Spesifikasi Teknis" />
                        <textarea id="spesifikasi_teknis" name="spesifikasi_teknis" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" rows="3"></textarea>
                    </div>
                    <div class="flex justify-end gap-2 pt-4">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700">Simpan KR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>