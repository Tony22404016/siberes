<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Produk</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-[#e9f0fb] text-gray-800 leading-relaxed">
  <div class="max-w-5xl mx-auto my-12 bg-white rounded-xl shadow-md overflow-hidden">

    <!-- Layout utama -->
    <div class="grid md:grid-cols-2 items-center">
      <!-- Gambar Produk -->
      <div class="bg-[#f8f9fb] flex justify-center items-center p-8">
        <img src="{{ asset('uploads/product/' . $services->service_image) }}" 
             alt="Gambar Produk" 
             class="w-full aspect-[4/3] object-cover rounded-lg">
      </div>

      <!-- Info Produk -->
      <div class="p-10 border-l border-gray-200">
        <h1 class="text-2xl md:text-3xl font-bold text-[#1e4a7b] mb-2 relative inline-block">
          {{ $services->service_name }}
          <span class="block w-12 h-[3px] bg-[tomato] mt-2 rounded"></span>
        </h1>

        <div class="text-2xl font-semibold text-[tomato] my-5">
          Rp {{ number_format($services->service_price, 0, ',', '.') }}
        </div>

        <div class="flex items-center text-yellow-400 mb-3">
          <span class="text-lg">★★★★★</span>
          <span class="text-gray-500 text-sm ml-2">(4.9/5 dari 1.245 ulasan)</span>
        </div>

        <p class="text-sm mb-2">
          teknisi tersedia: <span class="text-[#1e4a7b] font-semibold">{{ $services->stock }} Teknisi</span>
        </p>

        <p class="text-sm mb-5 text-gray-600">
          Lokasi: <span class="font-medium">{{ $services->location }}</span>
        </p>

        <a href="{{ route('checkout.form',  $services->service_id)}}">
          <button class="w-full max-w-xs bg-[#1e4a7b] text-white font-semibold py-3 rounded-md hover:bg-[#183d68] transition">
            Pesan Sekarang
          </button>
        </a>
      </div>
    </div>

    <!-- Deskripsi Produk -->
    <div class="border-t border-gray-200 p-8 md:p-12">
      <h2 class="text-xl font-semibold text-[#1e4a7b] mb-3 relative inline-block">
        Deskripsi Layanan
        <span class="block w-10 h-[3px] bg-[tomato] mt-1 rounded"></span>
      </h2>

      <div class="text-gray-700 text-justify text-[15px] leading-relaxed mt-4">
        <!-- biar cetakan layour mengikuti form input -->
        <p>{!! nl2br(e($services->service_description)) !!}</p>
        <p class="my-2">_____________________________</p>
        <p>Dapatkan garansi resmi 1 hari untuk pemesanan hari ini.</p>
      </div>
    </div>
  </div>
</body>
</html>
