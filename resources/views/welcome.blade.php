<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  <section class="w-full min-h-screen flex justify-center items-center">
    <div class="mx-auto flex-col flex items-center">
      <h1 class="text-3xl font-bold mb-3">
          Halaman Utama
      </h1>
      <div class="flex flex-row item-center justify-between w-[210px]">
        <a href="/login" class="px-5 py-2 rounded-lg bg-blue-500 text-2xl w-auto h-auto text-white">Login</a>
        <a href="/register" class="px-5 py-2 rounded-lg bg-blue-500 text-2xl w-auto h-auto text-white">Daftar</a>
      </div>
    </div>
  </section>
</body>
</html>