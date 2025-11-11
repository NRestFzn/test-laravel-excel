<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col gap-6">
                    <a href="/book/add">
                        <button class="bg-green-500 w-[140px] px-4 py-1 text-white rounded-md shadow-md">Tambah data</button>
                    </a>
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="py-2 text-left">Judul</th>
                                <th class="py-2 text-left">Penulis</th>
                                <th class="py-2 text-left">Penerbit</th>
                                <th class="py-2 text-left">Kategori</th>
                                <th class="py-2 text-left">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($bukus as $buku)
                            <tr class="border-b border-gray-200">
                                <td class="py-2">{{ $buku->judul }}</td>
                                <td class="py-2">{{ $buku->penulis->nama}}</td>
                                <td class="py-2">{{ $buku->penerbits->pluck('nama')->implode(', ') }}</td>
                                <td class="py-2">{{ $buku->kategori->nama}}</td>
                                <td>
                                    <button class="bg-blue-500 px-4 py-1 text-white rounded-sm pointer">Edit</button>
                                    <form action="/book" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 px-4 py-1 text-white rounded-sm pointer">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>