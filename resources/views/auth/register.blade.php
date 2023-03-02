@extends('auth.layout.template')
@section('content')

<section id="Registrasi">
    <div class="grid grid-cols-1 lg:grid-cols-2">
        <div class="relative flex items-start px-4 pb-8 pt-32 sm:pb-16 md:justify-center lg:pb-24 bg-gray-50 sm:px-6 lg:px-8">
            <div class="absolute inset-0">
                <img class="object-cover object-top w-full h-full bg-primary" src="/img/regis.png" alt="" id="image">
            </div>
        </div>

        <div class="flex items-center justify-center px-4 py-2 bg-white sm:px-6 lg:px-8 sm:py-16">
            <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
                <img class="w-28 h-20 mb-14 mx-36" src="/img/logo-radian 1.png" alt="">
                <h2 class="text-xl font-medium text-black sm:text-xl mb-2">Registrasi</h2>
                <p class="mt-2 text-lg font-normal text-body">Nowadays, it isn’t uncommon to see </p>
                <div>
                    <button onclick="cange()" class="text-lg font-medium text-black py-5 px-4 bg-border rounded-lg">
                        <input type="radio" name="agree" id="agree" class="w-5 h-5 text-blue-600 bg-transparent border border-primary rounded-full">
                            <label for="agree" class="ml-2 self-center">
                                Sebagai Siswa
                            </label>
                    </button>
                    <button onclick="change()" class="text-lg font-medium text-black py-5 px-4 bg-border rounded-lg">
                        <input type="radio" name="agree" id="agree" class="w-5 h-5 text-blue-600 bg-white border-primary rounded-full">
                            <label for="agree" class="ml-2 font-medium">
                                Sebagai Guru 
                            </label>
                    </button>
                </div>

                {{-- FORM --}}

                
                <form action="{{ route('create.user') }}" method="POST" class="mt-8">
                    @csrf
                    <div class="space-y-5">

                        {{-- UNTUK INPUT NAMA --}}
                        <div>
                            <label for="" class="text-base font-normal text-dark">Nama</label>
                            <div class="mt-2 relative text-body focus-within:text-black">
                                <input type="text" name="nama" id="name" placeholder="Nama Lengkap" class="block w-full p-4 text-dark transition-all border border-body duration-200 rounded-md focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600 @error('nama') border-red-400 @else border-gray-300 @enderror" required>

                                {{-- untuk menampilkan error  --}}
                                @error('nama')
                                    <p class="text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- UNTUK INPUT EMAIL --}}
                        <div>
                            <label for="" class="text-base font-normal text-black"> E-mail</label>
                            <div class="mt-2 relative text-body focus-within:text-black">
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    value="{{ old('email') }}"
                                    placeholder="Masukan Alamat Email"
                                    class="block w-full p-4 text-black transition-all duration-200 border border-body rounded-md focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600 @error('email') border-red-400 @else border-gray-300 @enderror" required
                                />

                                {{-- untuk menampilkan error  --}}
                                @error('email')
                                    <p class="text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- UNTUK INPUT NO TELEPHONE --}}
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="Phone Number" class="text-base font-normal text-black">No. Telephone </label>
                            </div>
                            <div class="mt-2 relative text-body focus-within:text-black">
                                <input type="tel" pattern="[0]{1}[8]{1}[0-8]{1}[0-9]{3}[0-9]{3}[0-9]{3}" name="no_telepon" id="Phone Number" placeholder="Masukan Nomor WhatsApp" class="block w-full p-4 text-black transition-all duration-200 border border-body rounded-md focus:outline-none focus:border-blue-600 focus: bg-white caret-blue-600 @error('no_telepon') border-red-400 @else border-gray-300 @enderror" value="{{ old('no_telepon') }}" required>

                                {{-- untuk menampilkan error  --}}
                                @error('no_telepon')
                                    <p class="text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- UNTUK INPUT PASSWORD --}}
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="" class="text-base font-normal text-black"> Password </label>
                            </div>
                            <div class="mt-2 relative text-body focus-within:text-gray-600">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    placeholder="Type Password"
                                    class="block w-full p-4 text-black transition-all duration-200 border border-body rounded-md focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600 @error('password') border-red-400 @else border-gray-300 @enderror" required
                                />

                                {{-- untuk menampilkan error  --}}
                                @error('password')
                                    <p class="text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <input type="checkbox" name="agree" id="agree" class="w-5 h-5 text-blue-600 bg-transparent border border-primary rounded-lg" />
                            <label for="agree" class="ml-3 text-sm font-medium text-black mr-10">
                                Remember me
                            </label>
                        </div>

                        <div class="flex">
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-4 text-base font-semibold text-white transition-all duration-200 rounded-lg bg-primary">
                                Sign Up
                            </button>
                            <p class="flex text-sm font-normal text-body mt-5">Have an account? <a href="/login" class="text-primary hover:underline">Login here</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    @if(Session::has('failed'))
        toastr.error("{{ Session::get('failed') }}")
    @endif

    // on click registrasi 
    function change() {

        var img = document.getElementById('image');
        img.src = '/img/regis_guru.png';
    }

    function cange() {

        var img = document.getElementById('image');
        img.src = '/img/regis.png';
    }
</script>
@endsection