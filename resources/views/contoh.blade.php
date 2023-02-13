@extends('template.template')
@section('content')
<section id="#" class="pt-9">
    <div class="px-[360px] pt-14 pb-7">
        <div class="grid grid-cols-1 bg-white shadow-lg rounded-lg justify-center items-center w-[715px] h-[1030px]">
            <div class="absolute flex justify-center items-center self-start">
                <img src="img/keluarga.png" alt="" class="w-full h-[181px]">
            </div>
            <div class="relative">
                <div class="w-full max-w-xl xl:w-full xl:mx-auto xl:pr-24 xl:max-w-xl">
                    <h3 class="text-5xl font-semibold text-white mb-4">Biodata Keluarga</h3>
                    <p class="text-lg font-normal text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Arcu quis mauris dignissim volutpat.</p>
                </div>
            </div>
            <div class="flex items-center justify-center px-[72px] pt-8 pb-16">
                <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
                    <form action="#" method="POST">
                        <div class="space-y-5">
                            <div>
                                <label for="" class="text-xl font-normal text-black">Nama Lengkap</label>
                                <div class="mt-2 relative text-body focus-within:text-black">
                                    <input type="text" name="" id="" placeholder="nama lengkap" class="block w-full p-4 text-black transition-all border border-body duration-100 rounded focus:outline-none focus:border-primary focus:bg-white">
                                </div>
                            </div>

                            <div>
                                <label for="" class="text-xl font-normal text-black">Tempat, Tanggal Lahir</label>
                                <div class=" mt-2 relative text-body focus-within:text-black">
                                    <input type="date" name="" id="" placeholder="Placeholder text" class="block w-full p-4 text-black transition-all duration-100 border border-body rounded focus:outline-none focus:border-primary focus:bg-white">
                                </div>
                            </div>

                            <div>
                                <label for="" class="text-xl font-normal text-black">Jenis Kelamin</label>
                                <div class="mt-2 relative text-body focus-within:text-black">
                                    <select class="block w-full p-4 text-black transition-all duration-100 border border-body rounded focus:outline-none focus:border-primary focus:bg-white">
                                        <option value="0">Select</option>
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="" class="text-xl font-normal text-black">Asal Sekolah</label>
                                <div class="mt-2 relative text-body focus-within:text-black">
                                    <input type="text" name="" id="" placeholder="Placeholder text" class="block w-full p-4 text-black transition-all border border-body duration-100 rounded focus:outline-none focus:border-primary focus:bg-white">
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="" class="text-base font-normal text-black">No. Telephone </label>
                                </div>
                                <div class="mt-2 relative text-body focus-within:text-black">
                                    <input type="tel" pattern="[0]{1}[8]{1}[0-8]{1}[0-9]{3}[0-9]{3}[0-9]{3}" name="" id="" placeholder="Type Number" class="block w-full p-4 text-black transition-all duration-200 border border-body rounded-md focus:outline-none focus:border-blue-600 focus: bg-white caret-blue-600">
                                </div>
                            </div>

                            <div>
                                <label for="" class="text-xl font-normal text-black">Alamat Lengkap</label>
                                <div class="mt-2 relative text-body focus-within:text-black">
                                    <input type="text" name="" id="" placeholder="Placeholder text" class="block w-full p-4 text-black transition-all border border-body duration-100 rounded focus:outline-none focus:border-primary focus:bg-white">
                                </div>
                            </div>

                            <div>
                                <input type="checkbox" name="agree" id="agree" class="w-5 h-5 text-blue-600 bg-transparent border border-primary rounded-lg" />
                                <label for="agree" class="ml-3 text-sm font-medium text-black mr-10">
                                    Data yang kirim sudah benar
                                </label>
                            </div>

                            <div>
                                <button type="submit" class="block w-full p-4 text-white transition-all bg-primary duration-100 rounded focus:outline-none focus:border-primary">
                                    Selanjutnya
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</section>
@endsection