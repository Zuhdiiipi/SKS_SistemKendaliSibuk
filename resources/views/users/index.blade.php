<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Pengguna Sistem') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Daftar Mahasiswa Terdaftar</h3>
                        <p class="text-sm text-gray-600">Pantau dan atur level akses pengguna aplikasi SKS.</p>
                    </div>
                    <div class="bg-blue-100 text-blue-700 font-bold px-4 py-2 rounded-lg">
                        Total: {{ $users->count() }} Pengguna
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white border-b border-gray-100">
                                <th class="p-4 font-semibold text-gray-700">Nama Pengguna</th>
                                <th class="p-4 font-semibold text-gray-700">Email</th>
                                <th class="p-4 font-semibold text-gray-700 text-center">Status Akun</th>
                                <th class="p-4 font-semibold text-gray-700 text-center">Aksi (Ubah Level)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="p-4 font-medium text-gray-900">{{ $user->name }}</td>
                                <td class="p-4 text-gray-600">{{ $user->email }}</td>
                                <td class="p-4 text-center">
                                    @if($user->role_level === 'premium')
                                        <span class="bg-yellow-100 text-yellow-700 text-xs font-bold px-3 py-1 rounded-full">Premium</span>
                                    @elseif($user->role_level === 'admin')
                                        <span class="bg-purple-100 text-purple-700 text-xs font-bold px-3 py-1 rounded-full">Admin</span>
                                    @else
                                        <span class="bg-gray-100 text-gray-600 text-xs font-bold px-3 py-1 rounded-full">Basic</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <form action="{{ route('users.updateRole', $user->id) }}" method="POST" class="flex justify-center gap-2">
                                        @csrf
                                        @method('PATCH')
                                        <select name="role_level" class="text-sm rounded border-gray-300 py-1 px-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="basic" {{ $user->role_level === 'basic' ? 'selected' : '' }}>Basic</option>
                                            <option value="premium" {{ $user->role_level === 'premium' ? 'selected' : '' }}>Premium</option>
                                            <option value="admin" {{ $user->role_level === 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold py-1 px-3 rounded transition">
                                            Simpan
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-8 text-center text-gray-500">
                                    Belum ada pengguna lain yang terdaftar.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>