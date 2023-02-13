
@extends('template.template')
@section('content')

<section class="min-h-screen flex justify-center items-center">

    <div class="w-[400px] p-4 border-1 border-gray-100">
        <form action="/register" method="POST">
            @csrf
            <div class="mb-6">
                <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                <input name="nama" type="text" id="Name" class="bg-gray-50 border @error('nama') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('nama') }}" required>
                @error('nama')
                    <p class="text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                <input name="email" type="email" id="email" class="bg-gray-50 border @error('email') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@email.com" value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="Phone Number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Phone Number</label>
                <input name="no_telepon" type="tel" pattern="[0]{1}[8]{1}[1-9]{2}[0-9]{3}[0-9]{3}[0-9]{2}" id="Phone Number" class="bg-gray-50 border @error('no_telepon') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('no_telepon') }}" required>
                @error('no_telepon')
                    <p class="text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input name="password" type="password" id="password" class="bg-gray-50 border @error('password') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="" required>
                @error('password')
                    <p class="text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>

</section>

@endsection


  