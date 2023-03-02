@extends('biodata.layout.template')
@section('content')

<section class="min-h-screen font-poppins flex justify-center items-center">
    <div class="max-w-[650px] flex flex-col items-center">
        <p class="text-base text-center mb-4">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore quibusdam rem fugit 
            perspiciatis quisquam quo, pariatur quaerat. Provident iure quaerat unde, impedit deserunt 
            delectus suscipit dignissimos? Blanditiis fugiat velit eligendi earum voluptates molestias, 
            voluptate, sequi obcaecati necessitatibus tempore nisi, dicta minima perspiciatis harum ut 
            rem esse facere fugit veritatis praesentium numquam rerum. Totam consequuntur corrupti ratione 
        </p>

        <a href="{{ route('profile') }}" class="py-4 px-6 bg-primary font-medium text-white rounded-md">
            Selesai
        </a>

        <form action="{{ route('micro.teaching') }}" method="post">
            @csrf
            <input type="submit" name="submit" value="Tes Micro Teaching" class="mt-4 py-4 px-6 bg-green-500 font-medium text-white rounded-md">
        </form>
    </div>
</section>
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>

@endsection