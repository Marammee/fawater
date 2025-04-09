<x-app-layout>
    <x-slot name="header"> {{ __('تعديل المستخدم') }} </x-slot>

    <div class="mt-10 bg-white rounded shadow" dir="rtl">

        <div class="flex justify-between mb-4 border-b-2 p-5">
            <h1 class="text-2xl font-bold text-title rounded"> {{ __('تعديل المستخدم') }} </h1>
            <a href="{{ route('users.index') }}" class="btn btn-primary font-bold py-2 px-4 rounded">
                {{ __('رجوع') }}
                {{-- make icon --}}
                <i class="fas fa-arrow-left mr-2"></i>
            </a>
        </div>

        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" class="p-5">
            @csrf
            @method('PUT')

            <!-- Inputs in one row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <!-- Name Input -->
                <div class="relative">
                    <input type="text" name="name" id="name" value="{{ $user->name }}"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 
                        appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer text-right"
                        placeholder=" " />
                    <label for="name"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 right-2 z-10 
                        origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 
                        peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 
                        peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        {{ __('الاسم') }}
                    </label>
                </div>

                <!-- Email Input -->
                <div class="relative">
                    <input type="email" name="email" id="email" value="{{ $user->email }}"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 
                        appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer text-right"
                        placeholder=" " />
                    <label for="email"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 right-2 z-10 
                        origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 
                        peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 
                        peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        {{ __('البريد الالكتروني') }}
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="profile_photo"
                    class="block text-sm font-medium text-gray-700 text-right">{{ __('الصورة الشخصية') }}</label>
                <input type="file" name="profile_photo" id="profile_photo"
                    class="mt-1 p-2 w-full border rounded-lg border-gray-300 text-right">
            </div>

            <div class="mt-6 text-left">
                <button type="submit" class="px-4 py-2 btn btn-primary rounded">{{ __('حفظ') }}</button>
            </div>
        </form>
    </div>
</x-app-layout>
