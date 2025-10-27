<x-public-layout>

    <h1 class="text-[24px] mb-[20px] font-bold">Book List</h1>

    <form action="/book/add" method="post" enctype="multipart/form-data" class="flex flex-col w-full bg-white shadow-md p-[20px] gap-7">
        @csrf
        <div class="flex flex-col gap-[5px]">
            <label for="title">Title</label>
            <input value="{{ old('title') }}" class="border-2 border-gray-200 rounded-md px-[10px] py-[10px]" type="text" name="title" id="title" placeholder="title">
            @error('title')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col gap-[5px]">
            <label for="writer">Writer</label>
            <input value="{{ old('writer') }}" class="border-2 border-gray-200 rounded-md px-[10px] py-[10px]" type="text" name="writer" id="writer" placeholder="writer">
            @error('writer')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col gap-[5px]">
            <label for="category">Category</label>
            <select name="category" id="category" class="border-2 border-gray-200 rounded-md px-[10px] py-[10px]">
                <option value="fantasy">Fantasy</option>
                <option value="horror">Horror</option>
                <option value="adventure">Adventure</option>
            </select>
            @error('category')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col gap-[5px]">
            <label for="cover">Cover</label>
            <input class="border-2 border-gray-200 rounded-md px-[10px] py-[10px]" type="file" name="cover" id="cover">
            @error('cover')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="submit" value="Add" class="text-center text-white bg-gray-900 py-[10px] w-full rounded-md">
        </div>
    </form>

</x-public-layout>