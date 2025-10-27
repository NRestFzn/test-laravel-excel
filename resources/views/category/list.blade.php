<x-public-layout>

    <div class="flex justify-between">
        <h1 class="text-[24px] mb-[20px] font-bold">Category List</h1>
        <a href="/category/add" class="bg-blue-600 h-[40px] p-[15px] text-white flex items-center justify-center rounded-md shadow-md">+ Add Category</a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-800">
            <thead class="text-xs text-white uppercase bg-gray-900">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$category->name}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3.5 justify-start">
                            <a href="{{ route('category.update', $category->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="font-medium text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</x-public-layout>