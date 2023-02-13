@extends('template.template')
@section('content')

<section class="min-h-screen pt-[30px] py-11">

    <div class="max-w-[550px] mx-auto">

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
                  <option value=""></option>
                  @foreach ($tingkatan as $row)
                    <option value="{{ $row->id }}-{{ $row->tingkatan }}">{{ $row->tingkatan }}</option>
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
            <div id="list-mapel" class="w-full border border-primaryInp rounded-md p-4">

              <div class="list-data-mapel flex items-start">
                <div class="w-fit">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm0 8.625a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM15.375 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                  </svg>                  
                </div>
                <input checked type="checkbox" value="Wirausaha" class="hidden w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" readonly>
                <label for="" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">Pilih salah satu minat mengajar kalian</label>
              </div>
              
            </div>
          </div>

          {{-- provinsi  --}}
          <div class="mb-4">
            <label for="provinsi" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">Provinsi</label>
            <div class="block relative">
              <div class="rounded-r-md absolute bg-white border-t border-r border-b border-primaryInp pr-4 flex items-center justify-center right-0 h-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                </svg>                  
              </div>
              <select name="" id="provinsi" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md">
                <option value=""></option>
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
              <select name="" id="kabupaten" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md">
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
              <select name="" id="kecamatan" class="appearance-none h-12 sm:min-w-[523px] text-sm px-4 w-full outline-none border-primaryInp border rounded-md">
                <option value=""></option>
              </select>
            </div>
          </div>

        {{-- list domisili mengajar --}}
        <div  class="mb-4">
          <label for="alamat" class="block mb-2 text-base font-semibold text-gray-900 after:content-['*'] after:text-red-600 after:ml-1 after:text-sm">List Domisili Mengajar</label>
          <div id="list-domicle" class="w-full border border-primaryInp rounded-md p-4">

            <div class="list-data-domicile flex items-start">
              <div class="w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                  <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm0 8.625a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM15.375 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                </svg>                  
              </div>
              <input checked type="checkbox" value="Wirausaha" class="hidden w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" readonly>
              <label for="" class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">Pilih salah satu domisili mengajar kalian</label>
            </div>
            
          </div>
        </div>
    </div>

</section>
<script>
    $(function (){
    $.ajaxSetup({
        headers: {"X-CSRF-TOKEN" : $("meta[name='csrf-token']").attr("content")}
    });


    $(function(){


      // <-- script sistem input minat mengajar -->

      // untuk input select mapel
      $("#tingkatan").on("change", function(){
          let tingkatan = $("#tingkatan").val();

          $.ajax({
            type : "POST",
              url : "/getmapel",
              data : {tingkatan : tingkatan},
              cache : false,
              success: function (data) {
              
              $("#mapel").html(`<option style="display: none;" value="">Pilih Mata Pelajaran</option>`);
              data.forEach(function(item, index){
                $("#mapel").append(
                  `<option class="list-mapel" value="${item.id}-${item.mapel}">${item.mapel}</option>`
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

          let mapel = mapels.split("-");
          let tingkatan = tingkatans.split("-");

            $("#list-mapel").append(
                `<div class="list-data-mapel flex items-start mt-2">
                  <div class="w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <input checked type="checkbox" value="${mapel[0]}-${tingkatan[1]}-${mapel[1]}" class="hidden w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" readonly>
                  <h1 class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">${tingkatan[1]} - ${mapel[1]}</h1>
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
                  text: "Berhasil menghapus mata pelajaran",
                  })
              }else {
              swal("Data batal untuk di hapus.");
              }
          });
      });

      // <------------------------------------------------------>

      // <-- script sistem input domisili mengajar -->

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
              $("#kecamatan").html(`<option style="display: none;" value="">Pilih Kecamatan</option>`);
              
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

          $.ajax({
            type : "POST",
              url : "/getkecamatan",
              data : {kabupaten : kabupaten},
              cache : false,
              success: function (data) {
              
              $("#kecamatan").html(`<option style="display: none;" value="">Pilih Kecamatan</option>`);
              data.forEach(function(item, index){
                $("#kecamatan").append(
                  `<option value="${item.id}-${item.name}">${item.name}</option>`
                );
              });
            },
            error:function(err){
              console.log(err)
            }
          });
      });

      // menambakan list domisili mengajar
      $("#kecamatan").on("change", function(){
          let province = $("#provinsi").val();
          let regency = $("#kabupaten").val();
          let districts = $("#kecamatan").val();

          let district = districts.split("-");

            $("#list-domicle").append(
                `<div class="list-data-mapel flex items-start mt-2">
                  <div class="w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <input checked type="checkbox" value="${district[0]}-${province}-${regency}-${district[1]}" class="hidden w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" readonly>
                  <h1 class="ml-2 text-[16px] font-[500] text-gray-700 dark:text-gray-300">${province} - ${regency} - ${district[1]}</h1>
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
                  //show success message
                  swal({
                  icon: "success",
                  title: "Success",
                  text: "Berhasil menghapus domisili",
                  })
              }else {
              swal("Data batal untuk di hapus.");
              }
          });
      });
      
      // <------------------------------------------------------>

    });
});

</script>
@endsection