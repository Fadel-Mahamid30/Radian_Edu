@extends('profile.layout.template')
@section('content')

<section class="text-gray-600 body-font font-poppins overflow-hidden bg-white">
<div class="container px-5 py-9 mx-auto max-w-[1120px] pt-12 8x75:pt-28 pb-12 8x75:pb-28">
    <div class="w-full h-[200px] 8x75:h-[300px] bg-primary absolute top-0 right-0 z-0 bg-cover bg-center" style="background-image: url({{ asset('/img/profile/profil_hero.png') }});"></div>
    <form action="/exp" method="POST" class="my-8 flex flex-col notebook:block z-50 relative">
        @csrf
        <div class="w-full flex flex-col 8x75:flex-row justify-center 8x75:justify-between z-50 8x75:mb-32 mb-24 relative">
            <div class="flex flex-col 8x75:flex-row items-center 8x75:items-start w-full 8x75:w-[70%]">
                <div class="bg-cover bg-top w-[200px] h-[200px] mr-0 8x75:mr-7 overflow-hidden justify-center rounded-full">
                    <img src="{{ asset('storage/' . $user->foto) }}" class="h-full w-full object-cover" alt="">
                </div>
    
                <div class="mt-4 8x75:mt-0 w-full 8x75:max-w-[350px]">
                    <h1 class="text-4xl 8x75:max-w-[350px] overflow-hidden 8x75:max-h-[80px] font-semibold text-black text-center 8x75:text-left 8x75:text-white mt-2">{{ $user->nama }}</h1>
                    <p class="text-base 8x75:max-w-[350px] overflow-hidden 8x75:max-h-[24px] font-medium text-black text-center 8x75:text-left 8x75:text-white mt-2">{{ $user->email }}</p>
                    <p class="text-base 8x75:max-w-[350px] overflow-hidden 8x75:max-h-[24px] font-medium text-black text-center 8x75:text-left 8x75:text-white mt-1">{{ $user->kegiatan_mengajar }}</p>
                </div>
            </div>

            <div class="w-full 8x75:w-fit 8x75:flex-col flex justify-center 8x75:justify-between items-center 8x75:items-start mt-6 8x75:mt-0">
                <a href="{{ route('profile.edit') }}" class="justify-center rounded-md px-4 py-2 bg-primaryYellow flex flex-row max-w-[200px] max-h-[50px] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[35px] h-[35px] fill-black mr-4">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                    </svg>
                    <span class="text-black text-base font-semibold">Edit Profil</span>
                </a>
            </div>
        </div>

        {{-- Profil guru  --}}
        <h1 class="text-[32px] mb-4 font-semibold text-black">Profil Guru</h1>
        <hr class="h-[1px] bg-primaryInp w-full mb-[22px]">
        <div class="flex flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
            <div class="flex-grow notebook:max-w-[48%]">
                
                {{-- deskripsi diri --}}
                <div class="mb-4 notebook:mb-0">
                    <p class="text-xl font-medium mb-[22px] text-black">Deskripsi Guru</p>
                    <textarea name="deskripsi_diri" id="deskripsi_diri" cols="40" rows="9" class="sm:min-w-[338px] text-sm px-4 py-4 w-full outline-none @error('deskripsi_diri') border-primarySD @else border-primaryInp @enderror border rounded-md" required>{{ old('deskripsi_diri') ? old('deskripsi_diri') : $user->deskripsi_diri }}</textarea>
                    @error("deskripsi_diri")
                    <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                    @enderror
                </div>
                
                
            </div>
            <div class="flex-grow notebook:max-w-[48%]">
                <p class="text-xl font-medium mb-[22px] text-black">Contact</p>
                <p class="text-base mb-[22px] text-bodyText">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iusto minima iure quisquam, eos quasi hic quod porro, quis eveniet 
                    odio nulla tenetur quia repellat distinctio ipsum animi eligendi consequatur veniam fugiat quo itaque. Architecto magnam saepe 
                    soluta delectus nihil, dolor, earum, recusandae provident illo quod facilis? Officia, accusantium dolorum.
                </p>
            </div>
        </div>

        {{-- Pendidikan --}}
        <h1 class="text-[32px] mb-4 font-semibold text-black">Pendidikan</h1>
        <hr class="h-[1px] bg-primaryInp w-full mb-[22px]">
        <div class="flex flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
            <div class="flex-grow hidden notebook:block notebook:max-w-[48%]"></div>
            <div class="flex-grow notebook:max-w-[48%]">
                <div class="flex flex-row w-full">
                    <div class="w-full">
            
                        {{-- tanggal masuk dan keluar universitas  --}}
                        <div class="mb-4 flex flex-row justify-between">
                            <div class="w-[48%]">
                                <label for="mulai" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Dari</label>
                                <input type="date" name="dari_pendidikan" id="mulai" class="h-12 text-sm px-4 w-full outline-none @error('dari_pendidikan') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('dari_pendidikan') ? old('dari_pendidikan') : $user->dari_pendidikan }}" required>
                                @error("dari_pendidikan")
                                  <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                                @enderror
                            </div>
            
                            <div class="w-[48%]">
                                <label for="sampai" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Sampai</label>
                                <input type="date" name="sampai_pendidikan" id="sampai_pendidikan" class="h-12 text-sm px-4 w-full outline-none @error('sampai_pendidikan') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('sampai_pendidikan') ? old('sampai_pendidikan') : $user->sampai_pendidikan }}" required>
                                @error("sampai_pendidikan")
                                  <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- nama univeristas --}}
                        <div class="mb-4">
                            <label for="universitas" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Universitas</label>
                            <input type="text" name="universitas" id="universitas" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('universitas') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('universitas') ? old('universitas') : $user->universitas  }}" required>
                            @error("universitas")
                              <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        {{-- deskripsi mengenai pendidikan --}}
                        <div class="mb-4">
                            <label for="deskripsi" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Deskripsi</label>
                            <textarea name="deskripsi_pendidikan" id="deskripsi" cols="40" rows="8" class="sm:min-w-[338px] text-sm px-4 py-4 w-full outline-none @error('deskripsi_pendidikan') border-primarySD @else border-primaryInp @enderror border rounded-md" required>{{ old('deskripsi_pendidikan') ? old('deskripsi_pendidikan') : $user->deskripsi_pendidikan }}</textarea>
                            @error("deskripsi_pendidikan")
                              <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>
      
        {{-- Pengalaman --}}
        <h1 class="text-[32px] mb-4 font-semibold text-black">Pengalaman</h1>
        <hr class="h-[1px] bg-primaryInp w-full mb-[22px]">
        <div class="flex flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
            <div class="flex-grow hidden notebook:block notebook:max-w-[48%]"></div>
            <div class="flex-grow notebook:max-w-[48%]">
                <div class="w-full divide-y divide-primaryInp">
                    <div class="w-full">
                        <input type="hidden" name="id_pengalaman[]" value="{{ $user->pengalaman[0]->id }}">
  
                        {{-- tanggal masuk dan keluar perusahaan  --}}
                        <div class="mb-4 flex flex-row justify-between">
                              <div class="w-[48%]">
                                  <label for="dari_pengalaman" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Dari</label>
                                  <input type="date" name="dari_pengalaman[]" id="dari_pengalaman" class="h-12 text-sm px-4 w-full outline-none @error('dari_pengalaman.0') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('dari_pengalaman.0') ? old('dari_pengalaman.0') : $user->pengalaman[0]->dari_pengalaman }}" required>
                                  @error("dari_pengalaman.0")
                                    <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                                  @enderror
                                </div>
              
                              <div class="w-[48%]">
                                  <label for="sampai_pengalaman" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Sampai</label>
                                  <input type="date" name="sampai_pengalaman[]" id="sampai_pengalaman" class="h-12 text-sm px-4 w-full outline-none @error('sampai_pengalaman.0') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('sampai_pengalaman.0') ? old('sampai_pengalaman.0') : $user->pengalaman[0]->sampai_pengalaman }}" required>
                                  @error("sampai_pengalaman.0")
                                    <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                                  @enderror
                              </div>
                        </div>
                          
                        {{-- nama perusahaan --}}
                        <div class="mb-4">
                          <label for="perusahaan" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Perusahaan</label>
                          <input type="text" name="perusahaan[]" id="perusahaan" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('perusahaan.0') border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('perusahaan.0') ? old('perusahaan.0') : $user->pengalaman[0]->perusahaan }}" required>
                          @error("perusahaan.0")
                            <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                          @enderror
                        </div>
                        
                        {{-- deskripsi mengenai perusahaan --}}
                        <div class="mb-0">
                            <label for="deskrips_plg" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Deskripsi</label>
                            <textarea name="deskripsi_pengalaman[]" id="deskripsi_plg" cols="40" rows="8" class="sm:min-w-[338px] text-sm px-4 py-4 w-full outline-none @error('deskripsi_pengalaman.0') border-primarySD @else border-primaryInp @enderror border rounded-md" required>{{ old('deskripsi_pengalaman.0') ? old('deskripsi_pengalaman.0') : $user->pengalaman[0]->deskripsi_pengalaman }}</textarea>
                            @error("deskripsi_pengalaman.0")
                              <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                            @enderror
                        </div> 
                    </div>

                    @isset($user->pengalaman)
                        @php $i = 1 @endphp
                        @foreach ($user->pengalaman->skip(1) as $row)
                            <div class="input-list w-full mt-4 pt-6 relative">
                                {{-- untuk menghapus input pengalaman --}}
                                <div class="remove-experience absolute top-0 right-0 mt-2 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-primarySD w-7 h-7">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                    </svg>                              
                                </div>
    
                                <input type="hidden" name="id_pengalaman[]" value="{{ old("id_pengalaman.". $i) ? old("id_pengalaman.". $i) : $row->id  }}">
    
                                {{-- tanggal masuk dan keluar perusahaan  --}}
                                <div class="mb-4 flex flex-row justify-between">
                                <div class="w-[48%]">
                                    <label for="dari_pengalaman.{{ $i }}" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Dari</label>
                                    <input type="date" name="dari_pengalaman[]" id="dari_pengalaman.{{ $i }}" class="h-12 text-sm px-4 w-full outline-none @error('dari_pengalaman.'.$i) border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('dari_pengalaman.'.$i) ? old('dari_pengalaman.'.$i) : $row->dari_pengalaman }}" required>
                                    @error("dari_pengalaman.".$i)
                                        <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                                    @enderror
                                    </div>
                
                                <div class="w-[48%]">
                                    <label for="sampai_pengalaman.{{ $i }}" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Sampai</label>
                                    <input type="date" name="sampai_pengalaman[]" id="sampai_pengalaman.{{ $i }}" class="h-12 text-sm px-4 w-full outline-none @error('sampai_pengalaman.'.$i) border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('sampai_pengalaman.'.$i) ? old('sampai_pengalaman.'.$i) : $row->sampai_pengalaman }}" required>
                                    @error("sampai_pengalaman.".$i)
                                        <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                                    @enderror
                                </div>
                                </div>
                                
                                {{-- nama perusahaan --}}
                                <div class="mb-4">
                                <label for="perusahaan.{{ $i }}" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Perusahaan</label>
                                <input type="text" name="perusahaan[]" id="perusahaan.{{ $i }}" class="h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none @error('perusahaan.'.$i) border-primarySD @else border-primaryInp @enderror border rounded-md" value="{{ old('perusahaan.'.$i) ? old('perusahaan.'.$i) : $row->perusahaan }}" required>
                                @error("perusahaan.".$i)
                                    <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                                @enderror
                                </div>
                                
                                {{-- deskripsi mengenai perusahaan --}}
                                <div class="mb-0">
                                    <label for="deskrips_plg" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Deskripsi</label>
                                    <textarea name="deskripsi_pengalaman[]" id="deskripsi_plg" cols="40" rows="8" class="sm:min-w-[338px] text-sm px-4 py-4 w-full outline-none @error('deskripsi_pengalaman.'.$i)) border-primarySD @else border-primaryInp @enderror border rounded-md" required>{{ old('deskripsi_pengalaman.'.$i) ? old('deskripsi_pengalaman.'.$i) : $row->deskripsi_pengalaman }}</textarea>
                                    @error("deskripsi_pengalaman.".$i)
                                    <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                                    @enderror
                                </div> 
                            </div>
                            @php $i++ @endphp
                        @endforeach
                    @endisset

                    {{-- berfungsi saat jika ada validasi yang error maka value inputan tidak akan hilang   --}}
                    @if(old("id_pengalaman"))
                      @for ($i = 1; $i < count(old("id_pengalaman")); $i++)
                        <div class="input-list w-full mt-4 pt-6 relative">
                            {{-- untuk menghapus input pengalaman --}}
                            <div class="remove-experience absolute top-0 right-0 mt-2 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-primarySD w-7 h-7">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                </svg>                              
                            </div>
  
                            <input type="hidden" name="id_pengalaman[]" value="{{ old("id_pengalaman.". $i) }}">
  
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
                                <textarea name="deskripsi_pengalaman[]" id="deskripsi_plg" cols="40" rows="8" class="sm:min-w-[338px] text-sm px-4 py-4 w-full outline-none @error('deskripsi_pengalaman.'.$i)) border-primarySD @else border-primaryInp @enderror border rounded-md" required>{{ old('deskripsi_pengalaman.'.$i) }}</textarea>
                                @error("deskripsi_pengalaman.".$i)
                                  <p class="text-sm font-normal mt-1 text-primarySD">{{ $message }}</p>
                                @enderror
                            </div> 
                        </div>
                      @endfor
                    @endif
  
                  <div id="put_inputs" class="hidden"></div>
                  </div>
            </div>
        </div>

        {{-- Minat Mengajar --}}
        <h1 class="text-[32px] mb-4 font-semibold text-black">Minat Mengajar</h1>
        <hr class="h-[1px] bg-primaryInp w-full mb-[22px]">
        <div class="flex flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
            <div class="flex-grow w-full notebook:max-w-[60%]">

                {{-- minat mengajar --}}
                <div class="mb-5">
                    <label class="block text-gray-700 text-md font-semibold mb-2" for="pair">
                        Minat Mengajar
                    </label>
                    <select
                        class="selectpicker h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md" style="width: 100%" 
                        data-placeholder=""
                        id = "minat_mengajar"
                        data-allow-clear="false"
                        title="Select city...">
                        <option value="" style="display: none;"></option>
                    </select>
                </div>

                <div class="w-full flex flex-wrap gap-3">
                    @if ($user->minat_mengajar)
                        @foreach ($user->minat_mengajar as $row)
                            <div class="block bg-primaryYellow rounded-full py-[10px] w-fit px-6">
                            <div class="hapus_minat_mengajar">
                                
                            </div> 
                                <p class="text-black text-sm">{{ $row->mata_pelajaran->tingkatan->tingkatan }} - {{ $row->mata_pelajaran->mata_pelajaran }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="flex-grow notebook:max-w-[40%]"></div>
        </div>
  
        {{-- Domisili Mengajar --}}
        <h1 class="text-[32px] mb-4 font-semibold text-black">Domisili Mengajar</h1>
        <hr class="h-[1px] bg-primaryInp w-full mb-[22px]">
        <div class="flex flex-wrap notebook:flex-nowrap justify-between mb-[90px]">
            <div class="flex-grow w-full notebook:max-w-[60%]">

                <div class="mb-5">
                    <label class="block text-gray-700 text-md font-semibold mb-2" for="pair">
                        Domisili Mengajar
                    </label>
                    <select
                        class="selectpicker" style="width: 100%" 
                        data-placeholder=""
                        data-allow-clear="false"
                        id="domisili_mengajar"
                        title="Pilih domisili mengajar">
                    </select>
                </div>

                <div class="w-full flex flex-wrap gap-3">
                    @if ($user->domisili_mengajar)
                        @foreach ($user->domisili_mengajar as $row)
                            <div class="block bg-primaryYellow rounded-full py-[10px] w-fit px-6 flex-row flex items-center">
                                <p class="text-black text-sm">{{ $row->kecamatan->name }}</p>
                                <input type="hidden" class="hapus-minat-mengajar" name="hapus-minat-mengajar[]" value="{{ $row->id }}" disabled>
                                <div class="icon-hapus-minat-mengajar cursor-pointer w-fit ml-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-black">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="flex-grow notebook:max-w-[40%]"></div>
        </div>

         {{-- logout --}}
         <div class="w-full flex justify-end">
            <button type="submit" class="justify-center rounded-md px-4 py-2 bg-primarySD flex flex-row max-w-[200px] max-h-[50px] items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[35px] h-[35px] stroke-white mr-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>
                <span class="text-white text-base font-semibold">Selesai</span>
            </button>
        </div>

    </form>
</div>
</section>

<script>

$(document).ready(function() {

    $.ajaxSetup({
        headers: {"X-CSRF-TOKEN" : $("meta[name='csrf-token']").attr("content")}
    });

    $('#domisili_mengajar').select2({
        placeholder : "Pilih domisili",
        ajax : {
            type : "post",
            url : "{{ route('get.domisili.mengajar') }}",
            processResults : function({data}){
                return {
                    results : $.map(data, function (item) {
                        return {
                            id : `${item.kecamatan_id}#-#${item.provinsi}#-#${item.kabupaten}#-#${item.kecamatan}`,
                            text : `${item.provinsi} - ${item.kabupaten} - ${item.kecamatan}`
                        }  
                    })
                }  
            }
        }
    });

    $(document).on("click", ".icon-hapus-minat-mengajar", function() {
        var inputElement = $(this).prev(".hapus-minat-mengajar");
        inputElement.prop("disabled", false);
    });


    $('#minat_mengajar').select2({
        ajax : {
            type : "post",
            url : "{{ route('get.minat.mengajar') }}",
            processResults : function({data}){
                return {
                    results : $.map(data, function (item) {
                        return {
                            id : `${item.mapel_id}#-#${item.tingkatan}#-#${item.mata_pelajaran}`,
                            text : `${item.tingkatan} - ${item.mata_pelajaran}`
                        }  
                    })
                }  
            }
        }
    });

    
});



</script>
@endsection