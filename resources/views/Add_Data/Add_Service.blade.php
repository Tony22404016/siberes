<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Produk</title>
    <link rel="stylesheet" href="Add_Service.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Tambah Produk Baru</h1>
        </div>
        
        <div class="form-container">
            <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="productImage">Gambar Produk</label>
                    <input type="file" name="service_image" id="serviceImage" class="form-control" accept="image/*">
                    <p class="input-hint">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                </div>
                
                <div class="form-group">
                    <label for="productName">Nama Produk</label>
                    <input type="text" name="service_name" id="productName" class="form-control" placeholder="Masukkan nama produk" value="{{ old('service_name') }}" required>
                </div>

                <div class="form-group">
                    <label for="productName">Deskripsi Produk</label>
                    <textarea type="text" name="service_description" id="productDescription" class="form-control" placeholder="Masukkan deskripsi produk" value="{{ old('service_description') }}" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="productPrice">Harga Produk</label>
                    <input type="number" name="service_price" id="productPrice" class="form-control" placeholder="Masukkan harga produk" min="0" step="0.01" value="{{ old('service_price') }}" required>
                </div>

                <div class="form-group">
                    <label for="productStock">Stok Produk</label>
                    <input type="number" name="stock" id="productStock" class="form-control" placeholder="Masukkan stok produk" min="0" value="{{ old('stock') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="city">Kota</label>
                    <select name="location" id="city" class="form-control" required>
                        <option value="">Pilih kota</option>
                        <option value="Banjarmasin">Banjarmasin</option>
                        <option value="Banjarbaru">Banjarbaru</option>
                        <option value="Barito Kuala">Barito Kuala</option>
                        <option value="Marabahan">Marabahan</option>
                        <option value="Kapuas">Kapuas</option>
                        <option value="Pulang Pisau">Pulang Pisau</option>
                        <option value="Palangkaraya">Palangkaraya</option>
                    </select>
                </div>
                <button type="submit" class="btn">Simpan Produk</button>
            </form>
        </div>
    </div>
</body>
</html>