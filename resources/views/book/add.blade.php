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
                    <form action="{{route('book.add')}}" method="post" class="flex flex-col gap-4">
                        @csrf
                        <div class="flex flex-col gap-2">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" placeholder="Judul"
                                value="{{ old('judul') }}"
                                class="rounded-md border border-gray-200 @error('judul') border-red-500 @enderror">
                            @error('judul')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="penulis">Penulis</label>
                            <select name="penulis_id" id="penulis"
                                class="rounded-md border border-gray-200 @error('penulis_id') border-red-500 @enderror">
                                @foreach($penulis as $p)
                                <option value="{{ $p->id }}" {{ old('penulis_id') == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('penulis_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="kategori">Kategori</label>
                            <select name="kategori_id" id="kategori"
                                class="rounded-md border border-gray-200 @error('kategori_id') border-red-500 @enderror">
                                @foreach($kategori as $k)
                                <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="penerbit">Penerbit</label>
                            <select name="penerbit_id" id="penerbit"
                                class="rounded-md border border-gray-200 @error('penerbit_id') border-red-500 @enderror">
                                @foreach($penerbit as $p)
                                <option value="{{ $p->id }}" {{ old('penerbit_id') == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('penerbit_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="submit" value="Add" class="bg-green-500 rounded-md text-white shadow-md px-4 py-2 cursor-pointer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>