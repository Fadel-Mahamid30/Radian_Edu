
@extends('template.template')
@section('content')

<section class="w-full min-h-screen flex justify-center items-center">
    <div class="mx-auto flex-col flex items-center">
      <h1 class="text-3xl font-bold mb-3">
          Halaman Utama
      </h1>
      <p>{{ $auth }}</p>
      <div class="flex flex-row item-center justify-between w-[210px]">
        <form action="/logout" method="POST">
            @csrf
            <button class="px-5 py-2 rounded-lg bg-blue-500 text-2xl w-auto h-auto text-white">Log Out</button>
        </form>
      </div>
    </div>
</section>

@endsection


  