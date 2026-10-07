<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah PK / SPK Baru</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('pk.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <x-input-label for="tahap_id" value="Pilih Tahap Penagihan" />
                        <select id="tahap_id" name="tahap_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Tanpa Tahap (Bisa diatur nanti) --</option>
                            @foreach ($tahaps as $tahap)
                                <option value="{{ $tahap->id }}" {{ $selectedTahapId == $tahap->id ? 'selected' : '' }}>
                                    {{ $tahap->nomor_tahap }} (KR: {{ $tahap->kr->nomor_kr }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="nomor_pk" value="Nomor PK / SPK" />
                        <x-text-input id="nomor_pk" class="block mt-1 w-full" type="text" name="nomor_pk" placeholder="" required />
                    </div>

                    <div>
                        <x-input-label for="nama_pekerjaan" value="Nama Pekerjaan" />
                        <x-text-input id="nama_pekerjaan" class="block mt-1 w-full" type="text" name="nama_pekerjaan" placeholder="" required />
                    </div>

                    <div>
                        <x-input-label for="nilai_pekerjaan" value="Nilai Pekerjaan (Rp)" />
                        <x-text-input id="nilai_pekerjaan" class="block mt-1 w-full" type="number" name="nilai_pekerjaan" value="0" required />
                    </div>

                    <div>
                        <x-input-label for="status_konstruksi" value="Status Konstruksi Fisik" />
                        <select id="status_konstruksi" name="status_konstruksi" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                            <option value="PROSES">DALAM PROSES</option>
                            <option value="SELESAI_100">SELESAI 100%</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-2 pt-4">
                        <a href="{{ route('pk.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md text-sm">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700">Simpan PK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>