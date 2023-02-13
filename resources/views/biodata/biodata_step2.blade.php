@extends('template.template')
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
      <form action="/biodata/step2" method="POST" enctype="multipart/form-data" class="max-w-[650px] mx-auto notebook:max-w-[1120px]">
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
              <input type="file" name="foto" id="foto" class="outline-none text-sm file:text-white file:bg-primary file:text-lg file:h-full file:border-none placeholder:text-placeholder file:rounded-md file:w-[155px] h-12 w-full text-gray-900 border @error('foto') border-primarySD @else border-primaryInp @enderror bg-white rounded-md cursor-pointer" >
              @error("foto")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
            {{-- upload cv --}}
            <div class="mb-4">
              <label for="cv" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Upload CV/Resume</label>
              <input type="file" name="cv" id="cv" class="outline-none text-sm file:text-white file:bg-primary file:text-lg file:h-full file:border-none placeholder:text-placeholder file:rounded-md file:w-[155px] h-12 w-full text-gray-900 border @error('cv') border-primarySD @else border-primaryInp @enderror bg-white rounded-md cursor-pointer" >
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
              <input type="text" name="" id="nama" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md" value="{{{ $biodata ? $biodata->provinsi : '' }}}">
            </div>
            
            {{-- tanggal lahir --}}
            <div class="mb-4">
              <label for="tanggal_lahir" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('tanggal_lahir') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('tanggal_lahir') }}" >
              @error("tanggal_lahir")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
            {{-- email --}}
            <div class="mb-4">
              <label for="email" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">E-mail</label>
              <input type="email" name="" id="email" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md">
            </div>
  
            {{-- no_telepon --}}
            <div class="mb-4">
              <label for="no_telepon" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Nomor Telepon</label>
              <input type="text" name="no_telepon" id="no_telepon" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md" pattern="[0]{1}[8]{1}[0-8]{1}[0-9]{3}[0-9]{3}[0-9]{3}" value="" >
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
            
            {{-- asal ptn  --}}
            <div class="mb-4">
              <label for="asal_ptn" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Asal PTN</label>
              <input type="text" name="asal_ptn" id="asal_ptn" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('asal_ptn') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('asal_ptn') }}" >
              @error("asal_ptn")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
            {{-- jurusan --}}
            <div class="mb-4">
              <label for="jurusan" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Jurusan</label>
              <input type="text" name="jurusan" id="jurusan" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('jurusan') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('jurusan') }}" >
              @error("jurusan")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
  
            {{-- ipk --}}
            <div class="mb-4">
              <label for="ipk" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">IPK</label>
              <input type="text" name="ipk" id="ipk" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('ipk') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('ipk') }}" >
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
                <div class="rounded-r-md absolute bg-white border-t border-r border-b border-primaryInp pr-4 flex items-center justify-center right-0 h-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                  </svg>                  
                </div>
                <select name="provinsi" id="provinsi" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('provinsi') border-primarySD @else border-primaryInp @enderror border rounded-md" >
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
                <div class="rounded-r-md absolute bg-white border-t border-r border-b border-primaryInp pr-4 flex items-center justify-center right-0 h-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                  </svg>                  
                </div>
                <select name="kabupaten" id="kabupaten" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('kabupaten') border-primarySD @else border-primaryInp @enderror border rounded-md" >
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
                <div class="rounded-r-md absolute bg-white border-t border-r border-b border-primaryInp pr-4 flex items-center justify-center right-0 h-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                  </svg>                  
                </div>
                <select name="kecamatan" id="kecamatan" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('kecamatan') border-primarySD @else border-primaryInp @enderror border rounded-md" >
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
              <textarea name="alamat" id="alamat" cols="40" rows="5" class="sm:min-w-[338px] text-sm px-4 py-4 w-full outline-none @error('alamat') border-primarySD @else border-primaryInp @enderror border rounded-md" >{{ old("alamat") }}</textarea>
              @error("alamat")
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
                          
                  @if(old("aktivitas"))
                    @php 
                      $data = old("aktivitas");
                      array_unshift($data, "data");
                    @endphp
                  @endif

                  <div class="flex items-center">
                      <input id="undergraduate" name="aktivitas[]" 
                      @if(isset($data))
                        @if(array_search("Undergraduate", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Undergraduate" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="undergraduate" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">Undergraduate</label>
                  </div>

                  <div class="flex items-center">
                      <input id="organisasi" name="aktivitas[]" 
                      @if(isset($data)) 
                        @if(array_search("Organisasi", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Organisasi" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="organisasi" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">Organisasi</label>
                  </div>

                  <div class="flex items-center">
                      <input id="pengejar" name="aktivitas[]"  
                      @if(isset($data)) 
                        @if(array_search("Pengajar Les/Bimbel", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Pengajar Les/Bimbel" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="pengejar" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">Pengajar Les/Bimbel</label>
                  </div>

                  <div class="flex items-center">
                      <input id="freshgraduate" name="aktivitas[]" 
                      @if(isset($data)) 
                        @if(array_search("Freshgraduate", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Freshgraduate" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="freshgraduate" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">Freshgraduate</label>
                  </div>

                  <div class="flex items-center">
                      <input id="guru" name="aktivitas[]" 
                      @if(isset($data)) 
                        @if(array_search("Guru", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Guru" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="guru" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">Guru</label>
                  </div>

                  <div class="flex items-center">
                      <input id="wiraswasta" name="aktivitas[]" 
                      @if(isset($data)) 
                        @if(array_search("Wiraswasta", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Wiraswasta" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="wiraswasta" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">Wiraswasta</label>
                  </div>

                  <div class="flex items-center">
                      <input id="wirausaha" name="aktivitas[]" 
                      @if(isset($data)) 
                        @if(array_search("Wirausaha", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Wirausaha" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="wirausaha" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">Wirausaha</label>
                  </div>

                  <div class="flex items-center">
                      <input id="asn" name="aktivitas[]" 
                      @if(isset($data)) 
                        @if(array_search("ASN", $data)) checked @endif 
                      @endif
                      type="checkbox" value="ASN" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="asn" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">ASN</label>
                  </div>

                  <div class="flex items-center">
                      <input id="pegawai_swasta" name="aktivitas[]" 
                      @if(isset($data)) 
                        @if(array_search("Pegawai Swasta", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Pegawai Swasta" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="pegawai_swasta" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">Pegawai Swasta</label>
                  </div>

                  <div class="flex items-center">
                      <input id="pensiunan" name="aktivitas[]" 
                      @if(isset($data)) 
                        @if(array_search("Pensiunan", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Pensiunan" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="pensiunan" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">Pensiunan</label>
                  </div>

                  <div class="flex items-center">
                      <input id="ibu_rmh_tangga" name="aktivitas[]"  
                      @if(isset($data)) 
                        @if(array_search("Ibu Rumah Tangga", $data)) checked @endif 
                      @endif
                      type="checkbox" value="Ibu Rumah Tangga" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="ibu_rmh_tangga" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">Ibu Rumah Tangga</label>
                  </div>

                  <div class="flex items-center">
                      <input id="lainnya" name="lainnya" @if(old("lainnya")) checked @endif type="checkbox" value="xxxxx" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-primarySD focus:ring-blue-500">
                      <label for="lainnya" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">Lainnya:</label>
                  </div>
              </div>
              @error("empty_activity")
                <p class="text-sm font-normal mt-4 text-primarySD">{{ $message }}</p>
              @enderror
          </div>

            
            {{-- lainya --}}
            <div class="mb-4">
              <label for="kegiatan_lainnya" class="block mb-2 text-base font-semibold text-gray-900">Kegiatan Lainnya</label>
              <input type="text" name="aktivitas_lainnya" id="kegiatan_lainnya" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('aktivitas_lainnya') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old("aktivitas_lainnya") }}">
              @error("aktivitas_lainnya")
                <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
              @enderror
            </div>
            
            {{-- apply --}}
            <div class="mb-8">
              <label for="apply" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Posisi Lamar</label>
              <input type="text" name="apply" id="apply" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('apply') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('apply') }}" >
              @error("apply")
                <p class="text-sm font-normal mt-4 text-primarySD">{{ $message }}</p>
              @enderror
            </div>

            <button type="submit" id="save" class="w-[160px] h-[55px] text-white bg-primary font-semibold rounded-md text-base text-center">Selanjutnya</button>
        </div>

      </form>
    </div>
  </div>

</section>
<footer class="w-full h-[222px] bg-black py-10 font-poppins">
  <h1 class="text-3xl text-white mx-auto w-fit">INI FOOTER</h1>
</footer>


{{-- javascript  --}}
<script>

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
                url : "/getkabupaten",
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
                url : "/getkecamatan",
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
            var cek = $('input[id=lainnya]:checked');
            if(cek.length == 0){
                $("#kegiatan_lainnya").attr("disabled", "disabled");
                $("#kegiatan_lainnya").val("");
            }else{
                $("#kegiatan_lainnya").removeAttr("disabled");
            }
        }

        
        $("input[type=checkbox]").on("change", function(evt) {
            var cek = $('input[id=lainnya]:checked');
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
});

  
</script>
@endsection