@extends('profile.layout.template')
@section('content')

<section class="text-gray-600 body-font font-poppins overflow-hidden bg-white">

    
<div class="container px-5 py-9 mx-auto max-w-[1120px] pt-12 8x75:pt-14 pb-12 8x75:pb-28">
        
    <div class="w-full h-[200px] 8x75:h-[350px] bg-primary absolute top-0 right-0 z-0 bg-cover bg-center" style="background-image: url({{ asset('/img/profile/profil_hero.png') }});"></div>

    <div class="my-8 flex flex-col notebook:block z-50 relative">
        <div class="w-full flex flex-col 8x75:flex-row justify-center items-center 8x75:justify-between z-50 8x75:mb-32 mb-24 relative">
            <div class="flex flex-col 8x75:flex-row items-center w-full ">
                
                {{-- profil guru  --}}
                <div class="image w-44 h-52 rounded-md mr-4 bg-cover bg-top" style="background-image: url({{ asset('storage/' . $guru->foto) }})"></div>
                <div class="w-fit flex flex-col h-full">
                    <h1 class="mt-4 8x75:mt-0 text-4xl 8x75:max-w-[500px] overflow-hidden 8x75:max-h-[80px] font-semibold text-black text-center 8x75:text-left 8x75:text-white mb-3">{{ $guru->nama }}</h1>
                    <p class="font-medium text-xl text-black text-center 8x75:text-left 8x75:text-white mb-3">Tutor {{ $guru->jurusan }} Lulusan {{ $guru->universitas }} </p>
                    <p class="font-medium text-black text-center 8x75:text-left 8x75:text-white mb-3">{{ $guru->kegiatan_mengajar }}</p>
                    
                    {{-- kabupaten  --}}
                    <div class="flex flex-row items-center justify-center 8x75:justify-start mb-3">
                        <div class="p-[10px] bg-primary rounded-md mr-4 hidden 8x75:block">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-white">
                                <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" />
                            </svg>                                                      
                        </div>
                        <p class="font-medium text-black text-center 8x75:text-white">{{ $guru->kabupaten }}</p>
                    </div>

                    {{-- harga  --}}
                    <div class="flex flex-row items-center justify-center 8x75:justify-start">
                        <div class="p-[10px] bg-primary rounded-md mr-4 hidden 8x75:block">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-white">
                                <path fill-rule="evenodd" d="M1 4a1 1 0 011-1h16a1 1 0 011 1v8a1 1 0 01-1 1H2a1 1 0 01-1-1V4zm12 4a3 3 0 11-6 0 3 3 0 016 0zM4 9a1 1 0 100-2 1 1 0 000 2zm13-1a1 1 0 11-2 0 1 1 0 012 0zM1.75 14.5a.75.75 0 000 1.5c4.417 0 8.693.603 12.749 1.73 1.111.309 2.251-.512 2.251-1.696v-.784a.75.75 0 00-1.5 0v.784a.272.272 0 01-.35.25A49.043 49.043 0 001.75 14.5z" clip-rule="evenodd" />
                            </svg>                                                                                 
                        </div>
                        <p class="font-medium text-black text-center 8x75:text-white">Rp. {{ number_format($guru->harga + ($guru->harga * ($keuntungan / 100)), 0, ",", ".") }} / Sesi</p>
                    </div>

                </div>
            </div>

            {{-- Pesan guru  --}}
            <div class="w-full 8x75:w-[200px] 8x75:flex-col flex justify-center 8x75:justify-between items-center 8x75:items-start mt-6 8x75:mt-0">
                <a href="#Pesan-Guru" class="justify-center rounded-md px-4 py-2 bg-primaryYellow  max-w-[200px] max-h-[50px] items-center">
                    <span class="text-black text-lg font-semibold">Pesan Guru</span>
                </a>
            </div>
        </div>

        {{-- data minat mengajar dan deskripsi guru  --}}
        <div class="flex flex-col-reverse notebook:flex-row md:flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
            <div class="flex-grow notebook:max-w-[48%]">
                <div class="w-full">
                    <p class="text-2xl font-medium mb-[22px] text-black">Bersedia Mengajar</p>
                    <hr class="h-[1px] bg-primaryInp w-full mb-[22px]">
                    <div class="w-full flex flex-wrap gap-3">
                        @isset($guru->minat_mengajar)
                            @foreach ($guru->minat_mengajar as $row)
                                <div class="block bg-primaryYellow rounded-full py-[10px] w-fit px-6">
                                    <p class="text-black text-sm">{{ $row->mata_pelajaran->tingkatan->tingkatan }} - {{ $row->mata_pelajaran->mata_pelajaran }}</p>
                                </div>
                            @endforeach
                        @endisset 
                    </div>
                </div>
            </div>
            <div class="flex-grow notebook:max-w-[48%]">
                <p class="text-2xl font-medium mb-[22px] text-black">Deskripsi Guru</p>
                <hr class="h-[1px] bg-primaryInp w-full mb-[22px]">
                <p class="text-base mb-[22px] text-bodyText">
                    {{ $guru->deskripsi_diri }}
                </p>
            </div>
        </div>

        {{-- data domisili mengajar dan rules guru  --}}
        <div class="flex flex-col-reverse notebook:flex-row md:flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
            <div class="flex-grow notebook:max-w-[48%]">
                <div class="w-full">
                    <p class="text-2xl font-medium mb-[22px] text-black">Avaliable Dari Domisili</p>
                    <hr class="h-[1px] bg-primaryInp w-full mb-[22px]">
                    <div class="w-full flex flex-wrap gap-3">
                    @isset ($guru->domisili_mengajar)
                        @foreach ($guru->domisili_mengajar as $row)
                            <div class="block bg-primaryYellow rounded-full py-[10px] w-fit px-6">
                                <p class="text-black text-sm">{{ $row->kecamatan->name }}</p>
                            </div>
                        @endforeach
                    @endisset
                    </div>
                </div>
            </div>
            <div class="flex-grow notebook:max-w-[48%]">
                <p class="text-2xl font-medium mb-[22px] text-black">Rules</p>
                <hr class="h-[1px] bg-primaryInp w-full mb-[22px]">
                <p class="text-base mb-[22px] text-bodyText">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Id repudiandae repellat quia error exercitationem 
                    in porro quos, eligendi impedit nobis esse cum aliquid fuga veniam? Rerum impedit iure magnam neque commodi, 
                    sequi doloremque voluptatem corrupti consectetur, deleniti nisi odit ullam?
                </p>
            </div>
        </div>
      
        <div id="Pesan-Guru" class="w-full">
            {{-- title  --}}
            <h1 class="text-black text-4xl sm:text-5xl text-center max-w-[700px] font-semibold mx-auto mb-8">PESAN DAN ATUR JADWAL SESUKAMU SEKARANG JUGA</h1>
            
            {{-- subtitle  --}}
            <p class="text-base text-bodyText text-center mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate ipsam minus voluptatem temporibus recusandae vel.</p>

            {{-- form  --}}
            <form action="{{ route('pesan.guru') }}" method="POST">
                @csrf

                {{-- nama  --}}
                <div class="mb-9">
                    <label class="block mb-2 text-xl font-medium" for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="h-12 sm:min-w-[523px] text-lg px-4 w-full outline-none @error('nama') border-primarySD @else border-primaryInp @enderror border rounded-md" placeholder="Nama lengkap" required>
                    @error('nama')
                        <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>  
                    @enderror
                </div>

                {{-- mata pelajaran  --}}
                <div class="mb-9">
                    <div class="mb-4">
                        <label for="mata_pelajaran" class="block mb-2 text-xl font-medium">Mata Pelajaran</label>
                        <div class="block relative">
                          <div class="rounded-r-md absolute bg-white border-t border-r border-b @error('mata_pelajaran') border-primarySD @else border-primaryInp @enderror pr-4 flex items-center justify-center right-0 h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                            </svg>                  
                          </div>
                          <select name="mata_pelajaran" id="mata_pelajaran" class="h-12 sm:min-w-[523px] text-lg px-4 w-full outline-none @error('mata_pelajaran') border-primarySD @else border-primaryInp @enderror border rounded-md" required>
                            <option value="" style="display: none;">Pilih mata pelajaran</option>
                            @isset($guru->minat_mengajar)
                                @foreach ($guru->minat_mengajar as $row)
                                    @php
                                        $mapel = $row->mata_pelajaran->tingkatan->tingkatan . " - " . $row->mata_pelajaran->mata_pelajaran;   
                                    @endphp
                                    <option @if(old("mata_pelajaran") == $mapel) selected @endif value="{{ $mapel }}">{{ $mapel }}</option>
                                @endforeach
                            @endisset
                          </select>
                        </div>
                        @error("mata_pelajaran")
                          <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                        @enderror
                      </div>
                </div>

                {{-- jumlah sesi  --}}
                <div class="mb-9">
                    <label class="block mb-2 text-xl font-medium" for="jumlah_sesi">Jumlah Sesi</label>
                    <input type="number" name="jumlah_sesi" id="jumlah_sesi" class="h-12 sm:min-w-[523px] text-lg px-4 w-full outline-none @error('jumlah_sesi') border-primarySD @else border-primaryInp @enderror border rounded-md" placeholder="Pilih jumlah sesi" required>
                    @error('jumlah_sesi')
                        <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                    @enderror
                </div>

                {{-- pengajuan tanggal  --}}
                <div class="mb-9">
                    <label class="block mb-2 text-xl font-medium" for="ajukan_tanggal">Ajukan Tanggal</label>
                    <input type="date" name="ajukan_tanggal" id="ajukan_tanggal" class="h-12 sm:min-w-[523px] text-lg px-4 w-full outline-none @error('ajukan_tanggal') border-primarySD @else border-primaryInp @enderror border rounded-md" required>
                    @error('ajukan_tanggal')
                        <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                    @enderror
                </div>

                {{-- nama guru  --}}
                <input type="hidden" name="nama_guru" value="{{ $guru->nama }}" required>

                {{-- key  --}}
                <input type="hidden" name="key" value="{{ encrypt($guru->id) }}" required>

                {{-- jumlah_bayar  --}}
                <input type="hidden" name="jumlah_bayar" value="{{ $guru->harga + ($guru->harga * ($keuntungan / 100)) }}" required>

                <button type="submit" name="submit" value="submit" class="bg-primary px-4 py-3 text-base font-medium text-white rounded-md">Pesan Guru Sekarang</button>
            </form>

        </div>

    </div>
</div>
</section>
@endsection