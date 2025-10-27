<x-public-layout>

    <div class="flex justify-between">
        <h1 class="text-[24px] mb-[20px] font-bold">Book List</h1>
        <div class="flex items-center gap-[10px]">
            <form class="flex items-center gap-2" id="import-form" action="{{ route('book.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="bg-gray-300 h-[40px] rounded-md flex items-center">
                <button type="submit" class="bg-blue-600 h-[40px] p-[15px] text-white flex items-center justify-center rounded-md shadow-md">Import</button>
            </form>
            <a href="/book/export" class="bg-blue-600 h-[40px] p-[15px] text-white flex items-center justify-center rounded-md shadow-md">Export</a>
            <a href="/book/add" class="bg-blue-600 h-[40px] p-[15px] text-white flex items-center justify-center rounded-md shadow-md">+ Add Book</a>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-800">
            <thead class="text-xs text-white uppercase bg-gray-900">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Writer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$book->title}}
                    </td>
                    <td class="px-6 py-4">
                        {{$book->writer}}
                    </td>
                    <td class="px-6 py-4">
                        {{$book->category}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3.5 justify-start">
                            <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                            <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const importForm = document.getElementById('import-form');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            importForm.addEventListener('submit', async function(event) {
                event.preventDefault();
                const formData = new FormData(importForm);
                const response = await fetch(importForm.getAttribute('action'), {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                const result = await response.json();
                alert(result.message);
                importForm.reset();
            });

        });
    </script>



</x-public-layout>