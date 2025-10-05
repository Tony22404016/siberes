<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Elegan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans">

  <div class="flex min-h-screen">
    
    <!-- Slide 1: Ilustrasi / Info -->
    <div class="w-1/2 bg-[#0b1f3f] text-white flex flex-col justify-center items-center p-10 hidden md:flex">
      <div class="flex flex-col items-center space-y-6">
        <div class="bg-[#ff6347] p-6 rounded-full shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.2 6H18M7 13l.6 3M10 21h4"/>
          </svg>
        </div>
        <h2 class="text-3xl font-semibold tracking-wide text-center">Proses Checkout</h2>
        <p class="text-gray-300 text-center max-w-sm leading-relaxed">
          Pastikan data pengiriman dan pembayaran kamu benar agar proses pembelian berjalan lancar.
        </p>
      </div>
    </div>

    <!-- Slide 2: Form Checkout -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-white p-8">
      <form action="{{ route('checkout.store')}}" method="POST" class="w-full max-w-md bg-[#f9fafc] shadow-xl rounded-2xl p-8 border border-gray-100">
        @csrf

        @if (session('success'))
          <!-- Suara notifikasi -->
          <audio id="notif-sound" autoplay>
              <source src="{{ asset('sound/chort_notif.mp3') }}" type="audio/mpeg">
          </audio>

          <!-- Overlay popup -->
          <div 
              id="success-overlay" 
              class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-sm z-50 animate-fadeIn"
          >
              <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-sm w-full text-center animate-scaleIn">
                  <div class="text-5xl mb-3">✅</div>
                  <h3 class="text-xl font-semibold text-green-700 mb-2">Pesanan Berhasil!</h3>
                  <p class="text-gray-600 mb-4 leading-relaxed">
                      {{ session('success') }}<br>
                      Silakan tunggu notifikasi dari <span class="font-semibold">WhatsApp kami</span>.
                  </p>
                  <a href="/" 
                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-2 rounded-lg shadow transition duration-200">
                    ← Kembali ke Beranda
                  </a>
              </div>
          </div>

          <script>
              // Auto hilang setelah 5 detik (optional)
              setTimeout(() => {
                  document.getElementById('success-overlay')?.classList.add('opacity-0');
                  setTimeout(() => {
                      document.getElementById('success-overlay')?.remove();
                  }, 500);
              }, 5000);
          </script>

          <style>
              @keyframes fadeIn {
                  from { opacity: 0; }
                  to { opacity: 1; }
              }
              @keyframes scaleIn {
                  from { transform: scale(0.9); opacity: 0; }
                  to { transform: scale(1); opacity: 1; }
              }
              .animate-fadeIn {
                  animation: fadeIn 0.4s ease-out;
              }
              .animate-scaleIn {
                  animation: scaleIn 0.4s ease-out;
              }
          </style>
      @endif

        <h2 class="text-2xl font-semibold text-[#0b1f3f] mb-6 text-center">Form Checkout</h2>
        <div class="space-y-4">
          <div>
            <label class="block text-gray-700 font-medium mb-1">Jenis Layanan</label>
            <input type="text" name="product_name" value="{{ $service->service_name ?? '' }}" placeholder="Masukkan nama kamu" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#ff6347]" readonly>
            <input type="hidden" name="service_id" value="{{ $service->service_id ?? '' }}">
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-1">Alamat Pengiriman</label>
            <textarea name="home_address" placeholder="Masukkan alamat lengkap" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#ff6347]" rows="3"></textarea>
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-1">Nomor WhatsApp</label>
            <input type="text" name="whatsapp_number" placeholder="contoh: 08xx-xxxx-xxxx" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#ff6347]">
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-1">Tanggal Pengiriman</label>
            <input type="date" name="date" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#ff6347]">
          </div>

          <button type="submit" class="w-full mt-6 bg-[#ff6347] hover:bg-[#e5533d] text-white font-semibold py-3 rounded-lg shadow-md transition duration-200">
            Konfirmasi Pesanan
          </button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
