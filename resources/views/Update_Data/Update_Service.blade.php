<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Layanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-900 to-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-2 mb-4 md:mb-0">
                    <i class="fas fa-tools text-2xl"></i>
                    <h1 class="text-2xl font-bold">Update Services</h1>
                </div>
                <nav class="w-full md:w-auto">
                    <ul class="flex flex-wrap justify-center space-x-4 md:space-x-6">
                        <li><a href="#" class="hover:text-blue-200 transition duration-200">Dashboard</a></li>
                        <li><a href="#" class="font-semibold text-blue-200">Layanan</a></li>
                        <li><a href="#" class="hover:text-blue-200 transition duration-200">Pelanggan</a></li>
                        <li><a href="#" class="hover:text-blue-200 transition duration-200">Laporan</a></li>
                        <li><a href="#" class="hover:text-blue-200 transition duration-200">Pengaturan</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Page Title -->
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-blue-900 mb-2">Update Data Layanan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Perbarui informasi layanan Anda dengan formulir di bawah ini. Pastikan semua data yang dimasukkan sudah benar.</p>
        </div>

        <!-- Form Container -->
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6 md:p-8">
                <form id="serviceForm" action="{{ route('service.update' ,$service->service_id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Service Name -->
                        <div class="md:col-span-2">
                            <label for="service_name" class="block text-sm font-medium text-blue-800 mb-1">Nama Layanan</label>
                            <input type="text" id="service_name" name="service_name" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                value="{{ old('service_name', $service->service_name) }}" required>
                        </div>

                        <!-- Service Price -->
                        <div>
                            <label for="service_price" class="block text-sm font-medium text-blue-800 mb-1">Harga Layanan (Rp)</label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-500">Rp</span>
                                <input type="number" id="service_price" name="service_price" 
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    value="{{ old('service_price', $service->service_price) }}" min="0" required>
                            </div>
                        </div>

                        <!-- Stock -->
                        <div>
                            <label for="stock" class="block text-sm font-medium text-blue-800 mb-1">Partner Quantity</label>
                            <input type="number" id="stock" name="stock" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                value="{{ old('stock', $service->stock) }}" min="0" required>
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-blue-800 mb-1">Lokasi</label>
                            <select id="location" name="location" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                                <option value="" selected>Pilih Lokasi</option>
                                <option value="Banjarmasin">Banjarmasin</option>
                                <option value="Banjarbaru">Banjarbaru</option>
                                <option value="Barito Kuala">Barito Kuala</option>
                                <option value="Marabahan">Marabahan</option>
                                <option value="Pulang Pisau">Pulang Pisau</option>
                                <option value="Palangka Raya">Palangka Raya</option>
                            </select>
                        </div>

                        <!-- Service Description -->
                        <div class="md:col-span-2">
                            <label for="service_description" class="block text-sm font-medium text-blue-800 mb-1">Deskripsi Layanan</label>
                            <textarea id="service_description" name="service_description" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>{{ old('service_description', $service->service_description)}}</textarea>
                        </div>

                        <!-- Service Image -->
                        <div class="md:col-span-2">
                            <label for="service_image" class="block text-sm font-medium text-blue-800 mb-1">Gambar Layanan</label>
                            <div class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-6">
                                <div class="flex-1">
                                    <input type="file" id="service_image" name="service_image" accept="image/*"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                </div>
                                <div class="flex flex-col items-center">
                                    <div class="w-40 h-32 border border-gray-300 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img id="preview" src="https://images.unsplash.com/photo-1587202372634-32705e3bf49c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                                            alt="Preview Gambar Layanan" class="w-full h-full object-cover">
                                    </div>
                                    <p class="text-sm text-gray-500 mt-2">Gambar saat ini</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('service.index')}}"><button type="submit" class="px-6 py-3 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition duration-200 font-medium">
                            <i class="fas fa-times mr-2"></i>Batal
                        </button></a>
                        <button type="submit" class="px-6 py-3 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition duration-200 font-medium">
                            <i class="fas fa-save mr-2"></i>Perbarui Layanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white mt-12">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p class="text-blue-200">&copy; 2023 DeepSeek Services. Semua hak dilindungi.</p>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-blue-200 hover:text-white transition duration-200">Kebijakan Privasi</a>
                    <a href="#" class="text-blue-200 hover:text-white transition duration-200">Syarat & Ketentuan</a>
                    <a href="#" class="text-blue-200 hover:text-white transition duration-200">Bantuan</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Preview image functionality
        document.getElementById('service_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>