@extends('home.layout.template')
@section('content')

<header class="bg-white top-0 left-0 w-full flex items-center z-0">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <div class="px-4">
                <a href="#" class="py-6">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                </a>
            </div>

            <div class="flex items-center px-4">
                <button id="hamburger" name="hamburger" type="button"
            class="block absolute right-4 lg:hidden">
                <span class="hamburger-line transition duration-300
                ease-in-out origin-top-left "></span>
                <span class="hamburger-line transition duration-300
                ease-in-out"></span>
                <span class="hamburger-line transition duration-300
                ease-in-out origin-bottom-left"></span>
                </button>

            <nav id="nav-menu" class="hidden absolute py-5 bg-white
                shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block
                lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                <ul class="block lg:flex">
                    <li class="group">
                        <a href="{{ route('home') }}" class="text-base text-body font-medium py-2 mx-8 flex group-hover:text-primary">Home</a>
                    </li>
                    <li class="group">
                        <a href="#testi" class="text-base text-body font-medium py-2 mx-8 flex group-hover:text-primary">Kedokteran</a>
                    </li>
                    <li class="group">
                        <a href="#unggul" class="text-base text-body font-medium py-2 mx-8 flex group-hover:text-primary">Kedinasan</a>
                    </li>
                    <li class="group">
                        <a href="#program" class="text-base text-body font-medium py-2 mx-8 flex group-hover:text-primary">PTN Favorit</a>
                    </li>
                    <li class="group">
                        <a href="#daftar" class="text-base text-body font-medium py-2 mx-8 flex group-hover:text-primary">Privat Camp Garansi</a>
                    </li>
                    <li class="group">
                        <button class="text-base text-white font-medium py-2 px-3 mx-8 border bg-primary rounded-lg">Konsultasi</button>
                    </li>
                </ul>
            </nav>
            </div>
        </div>
    </div>
</header>
<!-- navbar section end -->

<!-- header section start -->
<section id="#" class="pt-12 pb-16">
    <div class="container">
        <div class="mx-auto">
            <h5 class="text-lg font-semibold text-primary mb-2 text-center">DAFTAR TUTOR</h5>
            <h1 class="text-5xl font-semibold text-black mb-2 text-center">TUTOR TERBAIK PILIHAN ORANG TUA</h1>
            <p class="text-lg font-normal text-body mb-[46px] text-center">Ayo tulis tutor yang kamu inginkan, biar kami yang bantu carikan!</p>
            <div class="flex flex-wrap">
                <form action="{{ route('daftar.guru') }}" method="GET"  class="mx-auto flex items-center justify-center md:max-w-md">
                    <div class="w-full max-w-md items-center justify-center">
                        <div class="relative flex text-text border border-body rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute ml-3 self-center" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                            <input type="text" name="mata_pelajaran" placeholder="Mata Pelajaran" autocomplete="off" aria-label="Mata Pelajaran" class="w-full py-3 pl-10 font-normal rounded-lg" value="{{ $mata_pelajaran ? $mata_pelajaran : "" }}">
                        </div>
                    </div>
                    <div action="" class="w-full max-w-md ml-6 items-center justify-center">
                        <div class="relative flex text-text border border-body rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute ml-3 self-center" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                            <input type="text" name="domisili" placeholder="Daerah" autocomplete="off" aria-label="Daerah" class="w-full py-3 pl-10 font-normal rounded-lg" value="{{ $domisili ? $domisili : "" }}">
                        </div>
                    </div>
                    <button class="text-base font-normal text-white p-3 bg-primary rounded-lg ml-9 items-center justify-center" href="#">Cari</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- header section end -->

<!-- daftar guru section start -->
<section id="#" class="pb-7">
    <div class="container">
        <div class="flex flex-wrap">

            {{-- menampilkan data tutor (yang sudah microteaching) --}}
            @isset ($guru)
                @foreach ($guru as $row)
                <div class="w-full px-4 mb-10 lg:w-1/4">
                    <div class="bg-white card rounded-2xl overflow-hidden relative group w-[253px] h-[348px]">
                        <div class="h-[348px] transition-all transform bg-cover bg-top" style="background-image: url({{ asset('storage/'. $row->foto) }});">
                            <div class="bg-primaryYellow h-[98px] rounded-2xl absolute inset-x-0 bottom-0 text-center">
                                <h1 class="text-xl font-medium text-black mb-2">{{ $row->nama }}</h1>
                                
                                {{-- melakukan pemeriksaan jika data bernilai null  --}}
                                @isset($row->minat_mengajar)
                                @php
                                    $minat_mengajar = $row->minat_mengajar->first()->mata_pelajaran->mata_pelajaran; 
                                @endphp
                                @else
                                @php
                                    $minat_mengajar = "Mapel"; 
                                @endphp
                                @endisset
                                {{-- ---------  --}}

                                <h5 class="text-lg font-normal text-black mb-0">{{ ucwords(strtolower($minat_mengajar)) }} - {{ ucwords(strtolower($row->kabupaten)) }}</h5>
                                <h5 class="text-lg font-normal text-black mb-3">{{ $row->universitas }}</h5>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full"></div>
                        <div class="absolute z-0 inset-0 bg-primaryYellow opacity-0 group-hover:opacity-100 transition-all"></div>
                        <div class="group-hover:-translate-y-3 group-hover:bottom-0 transition-all absolute button-0 left-0 text-black p-4 justify-center content-center">
                            <h4 class="font-medium mb-1 text-xl text-center opacity-80">Angelina</h4>
                            <h3 class="font-normal mb-0 text-lg text-center">{{ ucwords(strtolower($minat_mengajar)) }} - {{ ucwords(strtolower($row->kabupaten)) }}</h3>
                            <h3 class="font-normal mb-3 text-lg text-center">{{ $row->universitas }}</h3>
                            <div class="justify-center mx-12">
                                
                                <a class="transition-all text-sm inline-flex rounded-xl mb-28 px-2 py-2 text-center justify-center border border-primary bg-primary text-semibold" href="{{ route('detail.guru', [encrypt($row->id)]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentcolor">
                                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                                </svg>

                                {{-- harga  --}}
                                Rp. {{ number_format($row->harga + ($row->harga * ($keuntungan / 100)), 0, ",", ".") }}
                            </a>
                            </div> 
                        </div>
                    </div>
                </div>
                @endforeach
            @endisset
            
        </div>

        <div class="w-full mx-auto mt-2 mb-4">
            {{ $guru->links() }}
        </div>

    </div>
</section>
<!-- daftar guru section end -->

<!-- footer section start -->
<section id="#" class="bg-footer pt-16 pb-12">
    <div class="container">
        <div class="flex flex-wrap">

            <div class="w-full px-4 md:w-1/4">
              <img src="{{ asset('img/logo.png') }}" alt="" class="mb-4">
              <p class="text-base font-normal text-text">Jl. Akses UI No. 99, Perkantoran Wisma Kencana Putri</p>
              <p class="text-base font-normal text-text">Kecamatan Tugu - Ciamnggis</p>
              <p class="text-base font-normal text-text">Kota Depok - 16451.</p>
            </div>
  
            <div class="w-full px-4 mb-12 md:w-1/4">
              <h3 class="font-semibold text-base text-text mb-6">COMPANY</h3>
              <ul class="text-black">
                <li>
                  <a href="#" class="inline-block text-base hover:text-primary mb-6">About</a>
                </li>
                <li>
                  <a href="#" class="inline-block text-base hover:text-primary mb-6">Supercamp</a>
                </li>
                <li>
                  <a href="#" class="inline-block text-base hover:text-primary mb-6">Daftar Tutor</a>
                </li>
                <li>
                  <a href="#" class="inline-block text-base hover:text-primary mb-6">Student Registration</a>
                </li>
                <li>
                  <a href="#" class="inline-block text-base hover:text-primary mb-6">Cari Tutor</a>
                </li>
              </ul>
            </div>
  
            <div class="w-full px-4 mb-12 md:w-1/4">
              <h3 class="font-semibold text-base text-text mb-6">HELP</h3>
              <ul class="text-black">
                <li>
                  <a href="#" class="inline-block text-base hover:text-primary mb-6">Customer Support</a>
                </li>
                <li>
                  <a href="#" class="inline-block text-base hover:text-primary mb-6">Delivery Details</a>
                </li>
                <li>
                  <a href="#" class="inline-block text-base hover:text-primary mb-6">Terms & Conditions</a>
                </li>
                <li>
                  <a href="#" class="inline-block text-base hover:text-primary mb-6">Privacy Policy</a>
                </li>
              </ul>
            </div>
  
            <div class="w-full px-4 mb-12 md:w-1/4">
              <h3 class="font-semibold text-base text-text mb-7">RADIAN NEWS</h3>
              <div class="w-full px-4 mb-8">
                <form action="" class="w-full max-w-md">
                  <div class="relative flex text-text">
                    <input type="email" name="email" placeholder="Enter Your Email Address" autocomplete="off" aria-label="Enter Your Email Address" class="w-full p-3 font-normal rounded-lg">
                  </div>
                </form>
              </div>
              <button class="text-base font-semibold border border-black bg-primary px-4 py-2 text-center text-white rounded-lg mb-16" href="#">Subscribe Now</button>
            </div>
  
            <div class="w-full pt-10 border-t border-text">
              <p class="font-normal text-sm text-center text-black">© Copyright 2023, All Rights Reserved by Yayasan Radian Solusi Indonesia</p>
            </div>
          </div>
    </div>
</section>
<script src="/js/daftarguru.js"></script>
    
@endsection