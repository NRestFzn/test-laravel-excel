<x-public-layout>

    <h1 class="text-[24px] mb-[20px] font-bold">Edit Category</h1>

    <form action="{{ route('category.update', $category->id) }}" method="post" class="flex flex-col w-full bg-white shadow-md p-[20px] gap-7">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-[5px]">
            <label for="name">Name</label>
            <input value="{{ old('name', $category->name) }}" class="border-2 border-gray-200 rounded-md px-[10px] py-[10px]" type="text" name="name" id="name" placeholder="name">
            @error('name')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="submit" value="Update" class="text-center text-white bg-gray-900 py-[10px] w-full rounded-md">
        </div>
    </form>

</x-public-layout>