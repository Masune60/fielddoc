<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="username" value="Username" />
                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username', $user->username)" required />
                    </div>

                    <div>
                        <x-input-label for="nama_lengkap" value="Nama Lengkap" />
                        <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap', $user->nama_lengkap)" required />
                    </div>

                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required />
                    </div>

                    <div>
                        <x-input-label for="password" value="Password Baru (Kosongkan jika tidak diubah)" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
                    </div>

                    <div>
                        <x-input-label for="role" value="Role Akses" />
                        <select id="role" name="role" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                            <option value="WORKER" {{ $user->role === 'WORKER' ? 'selected' : '' }}>WORKER (Teknisi)</option>
                            <option value="SUPERVISOR" {{ $user->role === 'SUPERVISOR' ? 'selected' : '' }}>SUPERVISOR (Verifikator)</option>
                            <option value="ADMIN" {{ $user->role === 'ADMIN' ? 'selected' : '' }}>ADMIN (Penagihan)</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-2 pt-4">
                        <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md text-sm font-medium">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>