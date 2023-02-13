
@extends('template.template')
@section('content')

<section class="min-h-screen flex justify-center items-center">

    <div class="w-[300px] p-4 border-1 border-gray-100">
        <form action="/login" method="POST">
            @csrf
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                <input name="email" type="email" id="email" class="bg-gray-50 border @error('email') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@email.com" value="{{ old('email') }}" required>
                @error('email')
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
            <div class="flex items-start mb-6">
              <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
              </div>
              <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
            </div>
            <button type="submit" class="mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            <a href="/register" class="w-full text-sm font-semibold flex justify-center text-blue-500">Register</a>
        </form>
    </div>

</section>

<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>
@endsection


  