<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Buat Tahap Penagihan Baru</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('tahap.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <x-input-label for="kr_id" value="Pilih Kontrak Rinci (KR)" />
                        <select id="kr_id" name="kr_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                            @foreach ($krs as $kr)
                                <option value="{{ $kr->id }}" {{ $selectedKrId == $kr->id ? 'selected' : '' }}>
                                    {{ $kr->nomor_kr }} (KHS: {{ $kr->khs->nomor_khs }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="nomor_tahap" value="Nama Tahap Penagihan" />
                        <x-text-input id="nomor_tahap" class="block mt-1 w-full" type="text" name="nomor_tahap" placeholder="Contoh: Tahap 1, Tahap 2, dst." required />
                    </div>

                    <div>
                        <x-input-label for="status_penagihan" value="Status Penagihan" />
                        <select id="status_penagihan" name="status_penagihan" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                            <option value="DRAFT">DRAFT</option>
                            <option value="DIAJUKAN">DIAJUKAN</option>
                            <option value="DICAIRKAN">DICAIRKAN</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-2 pt-4">
                        <a href="{{ route('tahap.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md text-sm">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700">Simpan Tahap</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>