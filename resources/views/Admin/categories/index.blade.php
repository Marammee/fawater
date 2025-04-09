<x-app-layout>
    <x-slot name="header"> {{ __('التصنيفات') }} </x-slot>

    <div class="mt-5 bg-white rounded ">
        <div class="flex justify-between mb-4 border-b-2 p-5">
            <h1 class="text-2xl font-bold text-title rounded " id="categoryFormTitle"> {{ __('اضافة تصنيف') }} </h1>
        </div>
        <div class="p-5">
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" id="categoryForm">
                @csrf
                <input type="hidden" name="_method" id="method" value="POST">
                <input type="hidden" name="category_id" id="category_id">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="relative">
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 
                            appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer text-right"
                            placeholder=" " required />
                        <label for="name"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 right-2 z-10 
                            origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 
                            peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                            {{ __('الاسم') }}
                        </label>
                    </div>
                    <div class="relative">
                        <input type="file" name="icon" id="icon"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 
                            appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer text-right" />
                        <label for="icon"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 right-2 z-10 
                            origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 
                            peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                            {{ __('الصورة') }}
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                    <div class=" md:col-start-5 md:col-span-4 lg:col-start-9 lg:col-span-2 invisible" id="cancelButtonContainer">
                        <button type="button" onclick="resetForm()"
                            class="btn btn-secondary font-bold py-2 px-4 rounded w-full">
                            {{ __('إلغاء') }}
                        </button>
                    </div>
                    <div class="md:col-start-9 md:col-span-4 lg:col-start-11 lg:col-span-2">
                        <button type="submit" class="btn btn-primary font-bold py-2 px-4 rounded w-full"
                            id="submitButton">
                            {{ __('اضافة') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="mt-5 bg-gray-50 rounded ">
        <div class="flex justify-between mb-4 border-b-2 p-5">
            <h1 class="text-2xl font-bold text-title rounded "> {{ __('عرض التصنيفات') }} </h1>
        </div>
        <div class="p-5">
            <table id="categories-table" class="w-full" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ __('الرقم') }}</th>
                        <th>{{ __('الصورة') }}</th>
                        <th>{{ __('الاسم') }}</th>
                        <th>{{ __('الإجراء') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><img src="{{ asset($category->icon) }}" alt="" class="w-10 h-10 rounded-full">
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div class="flex gap-5">
                                    <button onclick="editCategory({{ json_encode($category) }})" class="text-primary">
                                        <i class="fa-regular fa-edit"></i>
                                    </button>
                                    <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger"><i
                                                class="far fa-trash-alt fa-lg"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function editCategory(category) {
            document.getElementById('method').value = 'PUT';
            document.getElementById('category_id').value = category.id;
            document.getElementById('categoryForm').action = `/categories/${category.id}`;
            document.getElementById('name').value = category.name;
            document.getElementById('categoryFormTitle').innerText = 'تعديل التصنيف';
            document.getElementById('submitButton').innerText = 'تعديل';
            document.getElementById('cancelButtonContainer').classList.remove('invisible');
        }

        function resetForm() {
            document.getElementById('method').value = 'POST';
            document.getElementById('category_id').value = '';
            document.getElementById('categoryForm').action = '{{ route('categories.store') }}';
            document.getElementById('name').value = '';
            document.getElementById('categoryFormTitle').innerText = 'اضافة تصنيف';
            document.getElementById('submitButton').innerText = 'اضافة';
            document.getElementById('cancelButtonContainer').classList.add('invisible');
        }
    </script>
</x-app-layout>
