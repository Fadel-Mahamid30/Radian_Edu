@extends('biodata.layout.template')
@section('content')


<section class="text-gray-600 body-font font-poppins overflow-hidden bg-light_blue">

  <div class="container px-5 py-9 mx-auto max-w-[1120px]">

    <div class="overflow-hidden bg-white max-w-[411px] max-h-[82px] px-[27px] py-[14px] items-center flex flex-row justify-center rounded-full mx-auto mb-[90px]">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[54px] h-[54px] mr-3 stroke-bodyText">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[54px] h-[54px] mr-3 stroke-primarySD">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      
      
      <div class="flex flex-col justify-between h-full">
        <p class="font-medium text-lg text-primarySD">
          Biodata Guru
        </p>
        <p class="text-xs text-bodyText">
          Harap untuk membaca informasi
        </p>
      </div>
      
    </div>

    <div class="-my-8 flex flex-col notebook:block">
      {{-- form  --}}
      <form action="{{ route('biodata.create') }}" method="POST" enctype="multipart/form-data" class="max-w-[650px] mx-auto notebook:max-w-[1120px]">
        @csrf
        {{-- upload file  --}}
        <div class="flex flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
          <div class="w-full notebook:w-fit notebook:mb-0 mb-6 flex flex-col">
            <h1 class="mb-0 notebook:mb-4 text-black font-semibold text-[42px]">Upload File</h1>
            <p class="font-normal text-bodyText notebook:max-w-[350px] text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <div class="flex-grow notebook:max-w-[550px]">
            
            {{-- upload foto  --}}
            <div class="mb-4">
              <label for="foto" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Upload Foto</label>
              <input type="file" name="foto" id="foto" class="outline-none text-sm file:text-white file:bg-primary file:text-lg file:h-full file:border-none placeholder:text-placeholder file:rounded-md file:w-[155px] h-12 w-full text-gray-900 border @error('foto') border-primarySD @else border-primaryInp @enderror bg-white rounded-md cursor-pointer" required>
              @error("foto")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
            {{-- upload cv --}}
            <div class="mb-4">
              <label for="cv" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Upload CV/Resume</label>
              <input type="file" name="cv" id="cv" class="outline-none text-sm file:text-white file:bg-primary file:text-lg file:h-full file:border-none placeholder:text-placeholder file:rounded-md file:w-[155px] h-12 w-full text-gray-900 border @error('cv') border-primarySD @else border-primaryInp @enderror bg-white rounded-md cursor-pointer" required>
              @error("cv")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
          </div>
        </div>
  
        {{-- personal info  --}}
        <div class="flex flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
          <div class="notebook:w-fit notebook:mb-0 mb-6 flex flex-col">
            <h1 class="mb-0 notebook:mb-4 text-black font-semibold text-[42px]">Personal Info</h1>
            <p class="font-normal text-bodyText w-full notebook:max-w-[350px] text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <div class="flex-grow notebook:max-w-[550px]">
            
            {{-- nama  --}}
            <div class="mb-4">
              <label for="nama" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Nama</label>
              <input type="text" name="nama" id="nama" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('nama') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('nama') ? old('nama') : $user->nama }}">
              @error("nama")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
            {{-- tanggal lahir --}}
            <div class="mb-4">
              <label for="tanggal_lahir" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('tanggal_lahir') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('tanggal_lahir') }}" required>
              @error("tanggal_lahir")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>

            <div class="mb-4">
              <label for="jenis_kelamin" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Jenis Kelamin</label>
              <div class="block relative">
                <div class="rounded-r-md absolute bg-white border-t border-r border-b @error('jenis_kelamin') border-primarySD @else border-primaryInp @enderror pr-4 flex items-center justify-center right-0 h-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                  </svg>                  
                </div>
                <select name="jenis_kelamin" id="jenis_kelamin" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('jenis_kelamin') border-primarySD @else border-primaryInp @enderror border rounded-md" required>
                  <option value="" style="display: none;"></option>
                  <option @if(old("jenis_kelamin") == "Pria") selected @endif value="Pria">Pria</option>
                  <option @if(old("jenis_kelamin") == "Wanita") selected @endif value="Wanita">Wanita</option>
                </select>
              </div>
              @error("jenis_kelamin")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
            {{-- email --}}
            <div class="mb-4">
              <label for="email" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">E-mail</label>
              <input type="email" name="" id="email" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md" value="{{ $user->email }}" readonly>
            </div>
  
            {{-- no_telepon --}}
            <div class="mb-4">
              <label for="no_telepon" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Nomor Telepon</label>
              <input type="text" name="no_telepon" id="no_telepon" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('no_telepon') border-primarySD @else border-primaryInp @enderror border rounded-md" pattern="[0]{1}[1-9]{1}[0-9]{9,10}" value="{{ old('no_telepon') ? old('no_telepon') : $user->no_telepon }}" required>
              @error("no_telepon")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>

             {{-- deskripsi mengenai diri sendiri --}}
            <div class="mb-4">
                <label for="deskripsi_diri" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Deskripsi Diri</label>
                <textarea name="deskripsi_diri" id="deskripsi_diri" cols="40" rows="5" class="sm:min-w-[338px] text-sm px-4 py-4 w-full outline-none @error('deskripsi_diri') border-primarySD @else border-primaryInp @enderror border rounded-md" required>{{ old('deskripsi_diri') }}</textarea>
                @error("deskripsi_diri")
                  <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                @enderror
            </div>
            
          </div>
        </div>
  
        {{-- education info  --}}
        <div class="flex flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
          <div class="notebook:w-fit notebook:mb-0 mb-6 flex flex-col">
            <h1 class="mb-0 notebook:mb-4 text-black font-semibold text-[42px]">Education Info</h1>
            <p class="font-normal text-bodyText w-full notebook:max-w-[350px] text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <div class="flex-grow notebook:max-w-[550px]">

            {{-- tanggal masuk dan keluar universitas  --}}
            <div class="mb-4 flex flex-row justify-between">
                <div class="w-[48%]">
                    <label for="mulai" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Dari</label>
                    <input type="date" name="dari_pendidikan" id="mulai" class="h-12 text-sm px-4 w-full outline-none @error('dari_pendidikan') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('dari_pendidikan') }}" required>
                    @error("dari_pendidikan")
                      <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-[48%]">
                    <label for="sampai" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Sampai</label>
                    <input type="date" name="sampai_pendidikan" id="sampai_pendidikan" class="h-12 text-sm px-4 w-full outline-none @error('sampai_pendidikan') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('sampai_pendidikan') }}" required>
                    @error("sampai_pendidikan")
                      <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            
            {{-- nama univeristas --}}
            <div class="mb-4">
                <label for="universitas" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Universitas</label>
                <input type="text" name="universitas" id="universitas" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('universitas') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('universitas') }}" required>
                @error("universitas")
                  <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- deskripsi mengenai pendidikan --}}
            <div class="mb-4">
                <label for="deskripsi" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Deskripsi</label>
                <textarea name="deskripsi_pendidikan" id="deskripsi" cols="40" rows="5" class="sm:min-w-[338px] text-sm px-4 py-4 w-full outline-none @error('deskripsi_pendidikan') border-primarySD @else border-primaryInp @enderror border rounded-md" required>{{ old('deskripsi_pendidikan') }}</textarea>
                @error("deskripsi_pendidikan")
                  <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- asal ptn  --}}
            <div class="mb-4">
              <label for="asal_ptn" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Asal PTN</label>
              <input type="text" name="asal_ptn" id="asal_ptn" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('asal_ptn') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('asal_ptn') }}" required>
              @error("asal_ptn")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
            {{-- jurusan --}}
            <div class="mb-4">
              <label for="jurusan" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Jurusan</label>
              <input type="text" name="jurusan" id="jurusan" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('jurusan') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('jurusan') }}" required>
              @error("jurusan")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
  
            {{-- ipk --}}
            <div class="mb-4">
              <label for="ipk" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">IPK</label>
              <input type="number" step="0.01" name="ipk" id="ipk" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('ipk') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('ipk') }}" required>
              @error("ipk")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
          </div>
        </div>
  
        {{-- domicile info  --}}
        <div class="flex flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
          <div class="notebook:w-fit notebook:mb-0 mb-6 flex flex-col">
            <h1 class="mb-0 notebook:mb-4 text-black font-semibold text-[42px]">Domicile Info</h1>
            <p class="font-normal text-bodyText w-full notebook:max-w-[350px] text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <div class="flex-grow notebook:max-w-[550px]">
            
            {{-- provinsi  --}}
            <div class="mb-4">
              <label for="provinsi" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Provinsi</label>
              <div class="block relative">
                <div class="rounded-r-md absolute bg-white border-t border-r border-b @error('provinsi') border-primarySD @else border-primaryInp @enderror pr-4 flex items-center justify-center right-0 h-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                  </svg>                  
                </div>
                <select name="provinsi" id="provinsi" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('provinsi') border-primarySD @else border-primaryInp @enderror border rounded-md" required>
                  <option value=""></option>
                  @foreach ($provinsi as $row)
                    <option @if(old("provinsi")) selected @endif value="{{ $row->name }}">{{ $row->name }}</option>
                  @endforeach
                </select>
              </div>
              @error("provinsi")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
            {{-- kabupaten --}}
            <div class="mb-4">
              <label for="kabupaten" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Kabupaten</label>
              <div class="block relative">
                <div class="rounded-r-md absolute bg-white border-t border-r border-b @error('kabupaten') border-primarySD @else border-primaryInp @enderror pr-4 flex items-center justify-center right-0 h-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                  </svg>                  
                </div>
                <select name="kabupaten" id="kabupaten" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('kabupaten') border-primarySD @else border-primaryInp @enderror border rounded-md" required>
                  @if(old("kabupaten"))
                    <option value="{{ old('kabupaten') }}" selected>{{ old('kabupaten') }}</option>
                  @else
                    <option value=""></option>
                  @endif
                </select>
              </div>
              @error("kabupaten")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
            {{-- kecamatan --}}
            <div class="mb-4">
              <label for="kecamatan" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Kecamatan</label>
              <div class="block relative">
                <div class="rounded-r-md absolute bg-white border-t border-r border-b @error('kecamatan') border-primarySD @else border-primaryInp @enderror pr-4 flex items-center justify-center right-0 h-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                  </svg>                  
                </div>
                <select name="kecamatan" id="kecamatan" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('kecamatan') border-primarySD @else border-primaryInp @enderror border rounded-md" required>
                  @if(old("kecamatan"))
                    <option value="{{ old('kecamatan') }}" selected>{{ old('kecamatan') }}</option>
                  @else
                    <option value=""></option>
                  @endif
                </select>
              </div>
              @error("kecamatan")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
  
            {{-- alamat --}}
            <div class="mb-4">
              <label for="alamat" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Alamat</label>
              <textarea name="alamat" id="alamat" cols="40" rows="5" class="sm:min-w-[338px] text-sm px-4 py-4 w-full outline-none @error('alamat') border-primarySD @else border-primaryInp @enderror border rounded-md" required>{{ old("alamat") }}</textarea>
              @error("alamat")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
          </div>
        </div>

        {{-- experience  --}}
        <div class="flex flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
            <div class="notebook:w-fit notebook:mb-0 mb-6 flex flex-col">
              <h1 class="mb-0 notebook:mb-4 w-fit notebook:max-w-[350px] text-black font-semibold text-[42px]">Experience</h1>
              <p class="font-normal text-bodyText w-full notebook:max-w-[350px] text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="flex-grow notebook:max-w-[550px]">
                <div class="w-full divide-y divide-primaryInp">
                  <div class="w-full">
                      <input type="hidden" name="exp_input[]" value="xxxxx">

                      {{-- tanggal masuk dan keluar perusahaan  --}}
                      <div class="mb-4 flex flex-row justify-between">
                            <div class="w-[48%]">
                                <label for="dari_pengalaman" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Dari</label>
                                <input type="date" name="dari_pengalaman[]" id="dari_pengalaman" class="h-12 text-sm px-4 w-full outline-none @error('dari_pengalaman.0') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('dari_pengalaman.0') }}" required>
                                @error("dari_pengalaman.0")
                                  <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                                @enderror
                              </div>
            
                            <div class="w-[48%]">
                                <label for="sampai_pengalaman" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Sampai</label>
                                <input type="date" name="sampai_pengalaman[]" id="sampai_pengalaman" class="h-12 text-sm px-4 w-full outline-none @error('sampai_pengalaman.0') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('sampai_pengalaman.0') }}" required>
                                @error("sampai_pengalaman.0")
                                  <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                                @enderror
                            </div>
                      </div>
                        
                      {{-- nama perusahaan --}}
                      <div class="mb-4">
                        <label for="perusahaan" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Perusahaan</label>
                        <input type="text" name="perusahaan[]" id="perusahaan" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('perusahaan.0') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('perusahaan.0') }}" required>
                        @error("perusahaan.0")
                          <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                        @enderror
                      </div>
                      
                      {{-- deskripsi mengenai perusahaan --}}
                      <div class="mb-0">
                          <label for="deskrips_plg" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Deskripsi</label>
                          <textarea name="deskripsi_pengalaman[]" id="deskripsi_plg" cols="40" rows="5" class="sm:min-w-[338px] text-sm px-4 py-4 w-full outline-none @error('deskripsi_pengalaman.0') border-primarySD @else border-primaryInp @enderror border rounded-md" required>{{ old('deskripsi_pengalaman.0') }}</textarea>
                          @error("deskripsi_pengalaman.0")
                            <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                          @enderror
                      </div> 
                  </div>

                  {{-- berfungsi saat jika ada validasi yang error maka value inputan tidak akan hilang   --}}
                  @if(old("exp_input"))
                    @for ($i = 1; $i < count(old("exp_input")); $i++)
                      <div class="input-list w-full mt-4 pt-6 relative">
                          {{-- untuk menghapus input pengalaman --}}
                          <div class="remove-experience absolute top-0 right-0 mt-2 cursor-pointer">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-primarySD w-7 h-7">
                                  <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                              </svg>                              
                          </div>

                          <input type="hidden" name="exp_input[]" value="{{ old("exp_input.". $i) }}">

                          {{-- tanggal masuk dan keluar perusahaan  --}}
                          <div class="mb-4 flex flex-row justify-between">
                            <div class="w-[48%]">
                                <label for="dari_pengalaman.{{ $i }}" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Dari</label>
                                <input type="date" name="dari_pengalaman[]" id="dari_pengalaman.{{ $i }}" class="h-12 text-sm px-4 w-full outline-none @error('dari_pengalaman.'.$i) border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('dari_pengalaman.'.$i) }}" required>
                                @error("dari_pengalaman.".$i)
                                  <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                                @enderror
                              </div>
            
                            <div class="w-[48%]">
                                <label for="sampai_pengalaman.{{ $i }}" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Sampai</label>
                                <input type="date" name="sampai_pengalaman[]" id="sampai_pengalaman.{{ $i }}" class="h-12 text-sm px-4 w-full outline-none @error('sampai_pengalaman.'.$i) border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('sampai_pengalaman.'.$i) }}" required>
                                @error("sampai_pengalaman.".$i)
                                  <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                                @enderror
                            </div>
                          </div>
                          
                          {{-- nama perusahaan --}}
                          <div class="mb-4">
                            <label for="perusahaan.{{ $i }}" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Perusahaan</label>
                            <input type="text" name="perusahaan[]" id="perusahaan.{{ $i }}" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('perusahaan.'.$i) border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('perusahaan.'.$i) }}" required>
                            @error("perusahaan.".$i)
                              <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                            @enderror
                          </div>
                          
                          {{-- deskripsi mengenai perusahaan --}}
                          <div class="mb-0">
                              <label for="deskrips_plg" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Deskripsi</label>
                              <textarea name="deskripsi_pengalaman[]" id="deskripsi_plg" cols="40" rows="5" class="sm:min-w-[338px] text-sm px-4 py-4 w-full outline-none @error('deskripsi_pengalaman.'.$i)) border-primarySD @else border-primaryInp @enderror border rounded-md" required>{{ old('deskripsi_pengalaman.'.$i) }}</textarea>
                              @error("deskripsi_pengalaman.".$i)
                                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                              @enderror
                          </div> 
                      </div>
                    @endfor
                  @endif

                <div id="put_inputs" class="hidden"></div>
                </div>

                <div id="add-experience" class="cursor-pointer w-full flex flex-row items-center mt-4">
                    <hr class="h-[3px] w-full bg-primaryInp">
                    <div class="py-4 px-6 bg-primary w-fit ml-4 text-white rounded-md font-medium text-base flex flex-row items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>                                                
                        Tambah
                    </div>
                </div>

            </div>
        </div>

        {{-- domicile mengajar  --}}
        <div class="flex flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
          <div class="notebook:w-fit notebook:mb-0 mb-6 flex flex-col">
            <h1 class="mb-0 notebook:mb-4 w-fit notebook:max-w-[350px] text-black font-semibold text-[42px]">Domicile Mengajar</h1>
            <p class="font-normal text-bodyText w-full notebook:max-w-[350px] text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <div class="flex-grow notebook:max-w-[550px]">
            
              {{-- provinsi  --}}
              <div class="mb-4">
                <label for="provinsi" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Provinsi</label>
                <div class="block relative">
                  <div class="rounded-r-md absolute bg-white border-t border-r border-b border-primaryInp pr-4 flex items-center justify-center right-0 h-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                    </svg>                  
                  </div>
                  <select name="" id="provinsi_mengajar" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md">
                    <option style="display: none;" value=""></option>
                    @foreach ($provinsi as $row)
                      <option value="{{ $row->name }}">{{ $row->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              {{-- kabupaten --}}
              <div class="mb-4">
                <label for="kabupaten" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Kabupaten</label>
                <div class="block relative">
                  <div class="rounded-r-md absolute bg-white border-t border-r border-b border-primaryInp pr-4 flex items-center justify-center right-0 h-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                    </svg>                  
                  </div>
                  <select name="" id="kabupaten_mengajar" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md">
                    <option value=""></option>
                  </select>
                </div>
              </div>
              
              {{-- kecamatan --}}
              <div class="mb-4">
                <label for="kecamatan" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Kecamatan</label>
                <div class="block relative">
                  <div class="rounded-r-md absolute bg-white border-t border-r border-b border-primaryInp pr-4 flex items-center justify-center right-0 h-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                    </svg>                  
                  </div>
                  <select name="" id="kecamatan_mengajar" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md">
                    <option value=""></option>
                  </select>
                </div>
              </div>

            {{-- list domisili mengajar --}}
            <div  class="mb-4">
              <label for="alamat" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">List Domisili Mengajar</label>
              <div id="list-domicle" class="w-full border @error('list_domisili_mengajar') border-primarySD @else border-primaryInp @enderror rounded-md p-4">

                <div class="list-data-domicile flex items-start">
                  <div class="w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm0 8.625a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM15.375 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                    </svg>                  
                  </div>
                  <input checked type="checkbox" value="" class="hidden w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" readonly>
                  <label for="" class="ml-2 text-[16px] font-[500] text-gray-700">Pilih salah satu domisili mengajar kalian</label>
                </div>
                
                @if(old("domisili_mengajar"))
                  @for ($i = 0; $i < count(old("domisili_mengajar")); $i++)
                    @php
                      $data_domisili_mengajar = explode("#-#", old("domisili_mengajar.".$i));   
                    @endphp
                    <div class="list-data-mapel flex items-start mt-2">
                      <div class="w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                          <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                      </div>
                      <input checked name="domisili_mengajar[]" type="checkbox" value="{{ old('domisili_mengajar.'.$i) }}" class="hidden w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" readonly>
                      <h1 class="ml-2 text-[16px] font-[500] text-gray-700">{{ $data_domisili_mengajar[1] }} - {{ $data_domisili_mengajar[2] }} - {{ $data_domisili_mengajar[3] }}</h1>
                      <div class="remove-list-domicile ml-2 w-fit cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-primarySD w-6 h-6">
                          <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                        </svg>                                                  
                      </div>
                    </div>
                  @endfor
                @endif

              </div>
              @error("list_domisili_mengajar")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
          </div>
        </div>

        {{-- minat mengajar  --}}
        <div class="flex flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
          <div class="notebook:w-fit notebook:mb-0 mb-6 flex flex-col">
            <h1 class="mb-0 notebook:mb-4 w-fit notebook:max-w-[350px] text-black font-semibold text-[42px]">Minat Mengajar</h1>
            <p class="font-normal text-bodyText w-full notebook:max-w-[350px] text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <div class="flex-grow notebook:max-w-[550px]">
            
            {{-- tingkatan  --}}
            <div class="mb-4">
              <label for="tingkatan" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Tingkatan</label>
              <div class="block relative">
                <div class="rounded-r-md absolute bg-white border-t border-r border-b border-primaryInp pr-4 flex items-center justify-center right-0 h-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                  </svg>                  
                </div>
                <select name="" id="tingkatan" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md">
                    <option style="display: none;" value=""></option>
                    @foreach ($tingkatan as $row)
                      <option value="{{ $row->id }}#-#{{ $row->tingkatan }}">{{ $row->tingkatan }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            
            {{-- mapel --}}
            <div class="mb-4">
              <label for="mapel" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Mata Pelajaran</label>
              <div class="block relative">
                <div class="rounded-r-md absolute bg-white border-t border-r border-b border-primaryInp pr-4 flex items-center justify-center right-0 h-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                  </svg>                  
                </div>
                <select name="" id="mapel" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md">
                  <option value=""></option>
                </select>
              </div>
            </div>
            
            {{-- list minat mengajar --}}
            <div  class="mb-4">
              <label for="alamat" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">List Minat Mengajar</label>
              <div id="list-mapel" class="w-full border @error('list_minat_mengajar') border-primarySD @else border-primaryInp @enderror rounded-md p-4">

                <div class="list-data-mapel flex items-start">
                  <div class="w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm0 8.625a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM15.375 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                    </svg>                  
                  </div>
                  <input checked type="checkbox" value="Wirausaha" class="hidden w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" readonly>
                  <label for="" class="ml-2 text-[16px] font-[500] text-gray-700">Pilih salah satu minat mengajar kalian</label>
                </div>
                
                @if(old("minat_mengajar"))
                  @for ($i = 0; $i < count(old("minat_mengajar")); $i++)
                    @php
                      $data_minat_mengajar = explode("#-#", old("minat_mengajar.".$i));   
                    @endphp
                    <div class="list-data-mapel flex items-start mt-2">
                      <div class="w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                          <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                      </div>
                      <input checked name="minat_mengajar[]" type="checkbox" value="{{ old('minat_mengajar.'.$i) }}" class="hidden w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" readonly>
                      <h1 class="ml-2 text-[16px] font-[500] text-gray-700">{{ $data_minat_mengajar[1] }} - {{ $data_minat_mengajar[2] }}</h1>
                      <div class="remove-list-mapel ml-2 w-fit cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-primarySD w-6 h-6">
                          <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                        </svg>                                                  
                      </div>
                    </div>
                  @endfor
                @endif
                

              </div>
              @error("list_minat_mengajar")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
          </div>
        </div>
  
        {{-- other info  --}}
        <div class="flex flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
          <div class="notebook:w-fit notebook:mb-0 mb-6 flex flex-col">
            <h1 class="mb-0 notebook:mb-4 text-black font-semibold text-[42px]">Other Info</h1>
            <p class="font-normal text-bodyText w-full notebook:max-w-[350px] text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <div class="flex-grow notebook:max-w-[550px]">
            
            {{-- kegiatan  --}}
            <div class="mb-4">
              <span class="block text-base text-gray-900 font-semibold mb-2 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Kegiatan saat ini</span>
              <span class="block text-xs text-bodyText dark:text-white font-medium mb-[21px]">Checklist kegiatan saat ini anda bisa memilih lebih dari dua</span>
  
              <div class="grid grid-rows-12 small:grid-rows-6 sm:grid-rows-4 grid-flow-col gap-4">
                          
                  @if(old("kegiatan"))
                    @php 
                      $data = old("kegiatan");
                      array_unshift($data, "data");
                    @endphp
                  @endif

                  <div class="flex items-center">
                      <input id="undergraduate" name="kegiatan[]" 
                      @if(isset($data))
                        @if(array_search("Undergraduate", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Undergraduate" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="undergraduate" class="ml-2 text-[16px] font-[500] text-gray-700">Undergraduate</label>
                  </div>

                  <div class="flex items-center">
                      <input id="organisasi" name="kegiatan[]" 
                      @if(isset($data)) 
                        @if(array_search("Organisasi", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Organisasi" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="organisasi" class="ml-2 text-[16px] font-[500] text-gray-700">Organisasi</label>
                  </div>

                  <div class="flex items-center">
                      <input id="pengejar" name="kegiatan[]"  
                      @if(isset($data)) 
                        @if(array_search("Pengajar Les/Bimbel", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Pengajar Les/Bimbel" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="pengejar" class="ml-2 text-[16px] font-[500] text-gray-700">Pengajar Les/Bimbel</label>
                  </div>

                  <div class="flex items-center">
                      <input id="freshgraduate" name="kegiatan[]" 
                      @if(isset($data)) 
                        @if(array_search("Freshgraduate", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Freshgraduate" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="freshgraduate" class="ml-2 text-[16px] font-[500] text-gray-700">Freshgraduate</label>
                  </div>

                  <div class="flex items-center">
                      <input id="guru" name="kegiatan[]" 
                      @if(isset($data)) 
                        @if(array_search("Guru", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Guru" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="guru" class="ml-2 text-[16px] font-[500] text-gray-700">Guru</label>
                  </div>

                  <div class="flex items-center">
                      <input id="wiraswasta" name="kegiatan[]" 
                      @if(isset($data)) 
                        @if(array_search("Wiraswasta", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Wiraswasta" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="wiraswasta" class="ml-2 text-[16px] font-[500] text-gray-700">Wiraswasta</label>
                  </div>

                  <div class="flex items-center">
                      <input id="wirausaha" name="kegiatan[]" 
                      @if(isset($data)) 
                        @if(array_search("Wirausaha", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Wirausaha" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="wirausaha" class="ml-2 text-[16px] font-[500] text-gray-700">Wirausaha</label>
                  </div>

                  <div class="flex items-center">
                      <input id="asn" name="kegiatan[]" 
                      @if(isset($data)) 
                        @if(array_search("ASN", $data)) checked @endif 
                      @endif
                      type="checkbox" value="ASN" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="asn" class="ml-2 text-[16px] font-[500] text-gray-700">ASN</label>
                  </div>

                  <div class="flex items-center">
                      <input id="pegawai_swasta" name="kegiatan[]" 
                      @if(isset($data)) 
                        @if(array_search("Pegawai Swasta", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Pegawai Swasta" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="pegawai_swasta" class="ml-2 text-[16px] font-[500] text-gray-700">Pegawai Swasta</label>
                  </div>

                  <div class="flex items-center">
                      <input id="pensiunan" name="kegiatan[]" 
                      @if(isset($data)) 
                        @if(array_search("Pensiunan", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Pensiunan" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="pensiunan" class="ml-2 text-[16px] font-[500] text-gray-700">Pensiunan</label>
                  </div>

                  <div class="flex items-center">
                      <input id="ibu_rmh_tangga" name="kegiatan[]"  
                      @if(isset($data)) 
                        @if(array_search("Ibu Rumah Tangga", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Ibu Rumah Tangga" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="ibu_rmh_tangga" class="ml-2 text-[16px] font-[500] text-gray-700">Ibu Rumah Tangga</label>
                  </div>

                  <div class="flex items-center">
                      <input id="checkbox_kegiatan_lainnya" name="checkbox_kegiatan_lainnya" @if(old("checkbox_kegiatan_lainnya")) checked @endif type="checkbox" value="xxxxx" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="checkbox_kegiatan_lainnya" class="ml-2 text-[16px] font-[500] text-gray-700">Lainnya:</label>
                  </div>
              </div>
              @error("empty_activity")
                <p class="text-sm font-normal mt-4 text-primarySD">{{ $message }}</p>
              @enderror
            </div>

            {{-- lainya --}}
            <div class="mb-4">
              <label for="kegiatan_lainnya" class="block mb-2 text-base font-semibold text-gray-900">Kegiatan Lainnya</label>
              <input type="text" name="kegiatan_lainnya" id="kegiatan_lainnya" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('kegiatan_lainnya') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old("kegiatan_lainnya") }}" required>
              @error("kegiatan_lainnya")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
            {{-- posisi yang dilamar --}}
            <div class="mb-4">
              <label for="posisi_dilamar" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Posisi yang dilamar</label>
              <input type="text" name="posisi_dilamar" id="posisi_dilamar" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('posisi_dilamar') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('posisi_dilamar') }}" required>
              @error("posisi_dilamar")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>

            {{-- kegiatan mengajar --}}
            <div class="mb-4">
                <label for="kgt_mengajar" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Kegiatan Mengajar</label>
                <div class="block relative">
                  <div class="rounded-r-md absolute bg-white border-t border-r border-b @error('kegiatan_mengajar') border-primarySD @else border-primaryInp @enderror pr-4 flex items-center justify-center right-0 h-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                    </svg>                  
                  </div>
                  <select name="kegiatan_mengajar" id="kgt_mengajar" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('kegiatan_mengajar') border-primarySD @else border-primaryInp @enderror  border rounded-md" required>
                    <option style="display: none;" value=""></option>
                    <option @if(old("kegiatan_mengajar") == "Online" ) selected @endif value="Online">Online</option>
                    <option @if(old("kegiatan_mengajar") == "Offline" ) selected @endif value="Offline">Offline</option>
                    <option @if(old("kegiatan_mengajar") == "Online dan Offline" ) selected @endif value="Online dan Offline">Online dan Offline</option>
                  </select>
                </div>
                @error("kegiatan_mengajar")
                  <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- pengajuan harga --}}
            <div class="mb-8">
              <label for="apply" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Pengajuan Harga</label>
              <input type="number" name="harga" id="apply" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('harga') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('harga') }}" required>
              @error("harga")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @else
                <p class="text-sm font-normal mt-1 text-bodyText">Pengajuan harga dari {{ $harga["min_harga"] }} sampai {{ $harga["max_harga"] }}.</p>
              @enderror
            </div>

            <button type="submit" id="save" class="w-[160px] h-[55px] text-white bg-primary font-semibold rounded-md text-base text-center">Selanjutnya</button>
        </div>

      </form>
    </div>
  </div>

    {{-- elemen ini digunakan sebagai template untuk input pengalaman  --}}
    <div id="input-experience" class="hidden">
        <div class="input-list w-full mt-4 pt-6 relative">

        {{-- untuk menghapus input pengalaman --}}
        <div class="remove-experience absolute top-0 right-0 mt-2 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-primarySD w-7 h-7">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>                              
        </div>

        <input type="hidden" name="exp_input[]" value="xxxxx">

        {{-- tanggal masuk dan keluar perusahaan  --}}
        <div class="mb-4 flex flex-row justify-between">
                <div class="w-[48%]">
                    <label for="" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Dari</label>
                    <input type="date" name="dari_pengalaman[]" id="dari_pengalaman" class="h-12 text-sm px-4 w-full outline-none border-primaryInp border rounded-md" required>
                </div>

                <div class="w-[48%]">
                    <label for="" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Sampai</label>
                    <input type="date" name="sampai_pengalaman[]" id="sampai_pengalaman" class="h-12 text-sm px-4 w-full outline-none border-primaryInp border rounded-md" required>
                </div>
        </div>
            
        {{-- nama perusahaan --}}
        <div class="mb-4">
            <label for="" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Perusahaan</label>
            <input type="text" name="perusahaan[]" id="perusahaan" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md" required>
        </div>
        
        {{-- deskripsi mengenai perusahaan --}}
        <div class="mb-0">
            <label for="" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Deskripsi</label>
            <textarea name="deskripsi_pengalaman[]" id="deskripsi_plg" cols="40" rows="5" class="sm:min-w-[338px] text-sm px-4 py-4 w-full outline-none border-primaryInp border rounded-md" required></textarea>
        </div> 
        </div>
    </div>
    {{-- <------------------------------------------------------------> --}}

</section>

<footer class="w-full h-[222px] bg-black py-10 font-poppins">
  <h1 class="text-3xl text-white mx-auto w-fit">INI FOOTER</h1>
</footer>


{{-- javascript  --}}
<script>

// untuk menampilkan pesan gagal(Failed)
@if(Session::has('failed'))
        toastr.error("{{ Session::get('failed') }}")
@endif

$(function (){
    $.ajaxSetup({
        headers: {"X-CSRF-TOKEN" : $("meta[name='csrf-token']").attr("content")}
    });


    $(function(){

        // untuk input select kabupaten
        $("#provinsi").on("change", function(){
            let provinsi = $("#provinsi").val();

            $.ajax({
                type : "POST",
                url : "{{ route('get.kabupaten') }}",
                data : {provinsi : provinsi},
                cache : false,
                success: function (data) {
                $("#kabupaten").html(`<option style="display: none;" value="">Pilih Kabupaten</option>`);
                $("#kecamatan").html(`<option style="display: none;" value=""></option>`);
                
                data.forEach(function(item, index){
                  $("#kabupaten").append(
                    `<option value="${item.name}">${item.name}</option>`
                  );
                });
              },
              error:function(err){
                console.log(err)
              }
            });
        });
        
        // untuk input select kecamatan
        $("#kabupaten").on("change", function(){
            let kabupaten = $("#kabupaten").val();

            if(kabupaten == ""){
              $("#kecamatan").attr("disabled", "disabled");
            }else{
              $("#kecamatan").removeAttr("disabled");
            }

            $.ajax({
              type : "POST",
                url : "{{ route('get.kecamatan') }}",
                data : {kabupaten : kabupaten},
                cache : false,
                success: function (data) {
                
                $("#kecamatan").html(`<option style="display: none;" value="">Pilih Kecamatan</option>`);
                data.forEach(function(item, index){
                  $("#kecamatan").append(
                    `<option value="${item.name}">${item.name}</option>`
                  );
                });
              },
              error:function(err){
                console.log(err)
              }
            });
        });

        // <--- untuk membuka input kegiatan lainnya --->
        function checkbox(){
            var cek = $('input[id=checkbox_kegiatan_lainnya]:checked');
            if(cek.length == 0){
                $("#kegiatan_lainnya").attr("disabled", "disabled");
                $("#kegiatan_lainnya").val("");
            }else{
                $("#kegiatan_lainnya").removeAttr("disabled");
            }
        }

        $("input[type=checkbox]").on("change", function(evt) {
            var cek = $('input[id=checkbox_kegiatan_lainnya]:checked');
            if(cek.length == 0){
                $("#kegiatan_lainnya").attr("disabled", "disabled");
                $("#kegiatan_lainnya").val("");
            }else{
                $("#kegiatan_lainnya").removeAttr("disabled");
            }
            checkbox();
        });

        checkbox();

        // < ------------------------------------------------------->
    });

    // <-- script sistem input domisili mengajar -->
      // untuk input select kabupaten
      $("#provinsi_mengajar").on("change", function(){
          let provinsi = $("#provinsi_mengajar").val();

          $.ajax({
              type : "POST",
              url : "{{ route('get.kabupaten.mengajar') }}",
              data : {provinsi : provinsi},
              cache : false,
              success: function (data) {
              $("#kabupaten_mengajar").html(`<option style="display: none;" value="">Pilih Kabupaten</option>`);
              $("#kecamatan_mengajar").html(`<option style="display: none;" value=""></option>`);
              
              data.forEach(function(item, index){
                $("#kabupaten_mengajar").append(
                  `<option value="${item.name}">${item.name}</option>`
                );
              });
            },
            error:function(err){
              console.log(err)
            }
          });
      });
      
      // untuk input select kecamatan
      $("#kabupaten_mengajar").on("change", function(){
          let kabupaten = $("#kabupaten_mengajar").val();

          $.ajax({
            type : "POST",
              url : "{{ route('get.all.domicile') }}",
              data : {kabupaten : kabupaten},
              cache : false,
              success: function (data) {
              
              $("#kecamatan_mengajar").html(`<option style="display: none;" value="">Pilih Kecamatan</option>`);
              data.forEach(function(item, index){
                $("#kecamatan_mengajar").append(
                  `<option value="${item.id}#-#${item.kecamatan}">${item.kecamatan}</option>`
                );
              });
            },
            error:function(err){
              console.log(err)
            }
          });
      });

      // menambakan list domisili mengajar
      $("#kecamatan_mengajar").on("change", function(){
          let province = $("#provinsi_mengajar").val();
          let regency = $("#kabupaten_mengajar").val();
          let districts = $("#kecamatan_mengajar").val();

          let district = districts.split("#-#");

            $("#list-domicle").append(
                `<div class="list-data-mapel flex items-start mt-2">
                  <div class="w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <input checked name="domisili_mengajar[]" type="checkbox" value="${district[0]}#-#${province}#-#${regency}#-#${district[1]}" class="hidden w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" readonly>
                  <h1 class="ml-2 text-[16px] font-[500] text-gray-700">${province} - ${regency} - ${district[1]}</h1>
                  <div class="remove-list-domicile ml-2 w-fit cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-primarySD w-6 h-6">
                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                    </svg>                                                  
                  </div>
                </div>`
            );
      });

      // untuk menghapus list domisili mengajar
      $("body").on("click", ".remove-list-domicile", function(){
          new swal({
              title: "Anda yakin?",
              text: "Anda yakin ingin menghapus data domisili ?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {
                  $(this).parents(".list-data-mapel").remove()
                  swal({
                  icon: "success",
                  title: "Success",
                  text: "Berhasil menghapus domisili"
                  })
              }else {
              swal("Data batal untuk di hapus.");
              }
          });
      });
      
      // <------------------------------------------------------>

      // <-- script sistem input minat mengajar -->
      // untuk input select mapel
      $("#tingkatan").on("change", function(){
          let tingkatan = $("#tingkatan").val();

          $.ajax({
            type : "POST",
              url : "{{ route('get.mepel') }}",
              data : {tingkatan : tingkatan},
              cache : false,
              success: function (data) {
              
              $("#mapel").html(`<option style="display: none;" value="">Pilih Mata Pelajaran</option>`);
              data.forEach(function(item, index){
                $("#mapel").append(
                  `<option class="list-mapel" value="${item.id}#-#${item.mata_pelajaran}">${item.mata_pelajaran}</option>`
                );
              });
            },
            error:function(err){
              console.log(err)
            }
          });
      });

      // untuk menambahkan list minat mengajar
      $("#mapel").on("change", function(){
          let mapels = $("#mapel").val();
          let tingkatans = $("#tingkatan").val();

          let tingkatan = tingkatans.split("#-#");
          let mapel = mapels.split("#-#");

            $("#list-mapel").append(
                `<div class="list-data-mapel flex items-start mt-2">
                  <div class="w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <input checked name="minat_mengajar[]" type="checkbox" value="${mapel[0]}#-#${tingkatan[1]}#-#${mapel[1]}" class="hidden w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" readonly>
                  <h1 class="ml-2 text-[16px] font-[500] text-gray-700">${tingkatan[1]} - ${mapel[1]}</h1>
                  <div class="remove-list-mapel ml-2 w-fit cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-primarySD w-6 h-6">
                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                    </svg>                                                  
                  </div>
                </div>`
            );
      });

      // untuk menghapus list minat mengajar
      $("body").on("click", ".remove-list-mapel", function(){
          new swal({
              title: "Anda yakin?",
              text: "Anda yakin ingin menghapus data mata pelajaran ?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {
                  $(this).parents(".list-data-mapel").remove()
                  //show success message
                  swal({
                  icon: "success",
                  title: "Success",
                  text: "Berhasil menghapus mata pelajaran"
                  })
              }else {
              swal("Data batal untuk di hapus.");
              }
          });
      });

      // <------------------------------------------------------>

      // sistem input pengalaman
        // untuk manambahkan input pengalaman
        $("#add-experience").click(function(){
            let input = $("#input-experience").html()
            $("#put_inputs").before(input)
        })

        // untuk menghapus input pengalaman
        $("body").on("click", ".remove-experience", function(){
            new swal({
                title: "Anda yakin?",
                text: "Anda yakin ingin menghapus input pengalaman ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $(this).parents(".input-list").remove()
                    //show success message
                    swal({
                    icon: "success",
                    title: "Success",
                    text: "Berhasil menghapus input pengalaman"
                    })
                }else {
                swal("Data batal untuk di hapus.");
                }
            });
        });

        // <------------------------------------------------------>
});

  
</script>
@endsection