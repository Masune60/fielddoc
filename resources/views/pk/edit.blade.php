<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit PK / SPK</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('pk.update', $pk) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="tahap_id" value="Pilih Tahap Penagihan" />
                        <select id="tahap_id" name="tahap_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Tanpa Tahap (Bisa diatur nanti) --</option>
                            @foreach ($tahaps as $tahap)
                                <option value="{{ $tahap->id }}" {{ $pk->tahap_id == $tahap->id ? 'selected' : '' }}>
                                    {{ $tahap->nomor_tahap }} (KR: {{ $tahap->kr->nomor_kr }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="nomor_pk" value="Nomor PK / SPK" />
                        <x-text-input id="nomor_pk" class="block mt-1 w-full" type="text" name="nomor_pk" :value="old('nomor_pk', $pk->nomor_pk)" required />
                    </div>

                    <div>
                        <x-input-label for="nama_pekerjaan" value="Nama Pekerjaan" />
                        <x-text-input id="nama_pekerjaan" class="block mt-1 w-full" type="text" name="nama_pekerjaan" :value="old('nama_pekerjaan', $pk->nama_pekerjaan)" required />
                    </div>

                    <div>
                        <x-input-label for="nilai_pekerjaan" value="Nilai Pekerjaan (Rp)" />
                        <x-text-input id="nilai_pekerjaan" class="block mt-1 w-full" type="number" name="nilai_pekerjaan" :value="old('nilai_pekerjaan', $pk->nilai_pekerjaan)" required />
                    </div>

                    <div>
                        <x-input-label for="status_konstruksi" value="Status Konstruksi Fisik" />
                        <select id="status_konstruksi" name="status_konstruksi" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                            <option value="PROSES" {{ $pk->status_konstruksi === 'PROSES' ? 'selected' : '' }}>DALAM PROSES</option>
                            <option value="SELESAI_100" {{ $pk->status_konstruksi === 'SELESAI_100' ? 'selected' : '' }}>SELESAI 100%</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-2 pt-4">
                        <a href="{{ route('pk.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md text-sm">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700">Update PK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>