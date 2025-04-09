<x-app-layout>
    <x-slot name="header"> {{ __('المستخدمين') }} </x-slot>
    <div class="mt-10 bg-gray-50 rounded ">
        <div class="flex justify-between mb-4 border-b-2 p-5">
            <h1 class="text-2xl font-bold text-title rounded "> {{ __('عرض المستخدمين') }} </h1>
            <a href="" class="btn btn-primary font-bold py-2 px-4 rounded">
                {{ __('اضافة مستخدم') }}
            </a>
        </div>
        <div class="p-5">
            <table id="users-table" class="" width="100%" cellspacing="0">
                <thead class="">
                    <tr>
                        <th>{{ __('الرقم') }}</th>
                        <th>{{ __('الصورة') }}</th>
                        <th>{{ __('الاسم') }}</th>
                        <th>{{ __('البريد الالكتروني') }}</th>
                        <th>{{ __('الاجراء') }}</th>
                    </tr>
                </thead>

                <tbody class="">
                    @php
                        $count = 1;
                    @endphp

                    @foreach ($users as $user)
                        <tr>

                            <td>{{ $count }}</td>
                            <td><img src="{{ $user->profile_photo_url }}" alt="" class="w-10 h-10 rounded-full">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="flex gap-5">
                                    <form method="GET" action="{{ route('users.edit', $user->id) }}">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn"><i
                                                class="fa-regular fa-edit"></i></button>
                                    </form>
                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="border: none;"><i
                                                class="far fa-trash-alt text-danger fa-lg"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
