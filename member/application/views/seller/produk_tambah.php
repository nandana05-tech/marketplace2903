<div class="container py-4">
  <h5 class="fw-bold mb-4">➕ Tambah Produk</h5>

  <form method="post" enctype="multipart/form-data">
    <!-- Kategori -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Kategori</label>
      <select name="id_kategori" class="form-select">
        <option value="">Pilih Kategori</option>
        <?php foreach ($kategori as $key => $value): ?>
          <option value="<?php echo $value['id_kategori'] ?>"><?php echo $value['nama_kategori'] ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <!-- Nama Produk -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Nama Produk</label>
      <input type="text" name="nama_produk" class="form-control" placeholder="Contoh: Sepatu Kulit Premium">
    </div>

    <!-- Harga Produk -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Harga</label>
      <input type="number" name="harga_produk" class="form-control" placeholder="Contoh: 150000">
    </div>

    <!-- Berat Produk -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Berat</label>
      <div class="input-group">
        <input type="number" name="berat_produk" class="form-control" placeholder="Contoh: 300">
        <span class="input-group-text">gram</span>
      </div>
    </div>

    <!-- Upload Foto -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Foto Produk</label>
      <input type="file" name="foto_produk" class="form-control" accept="image/*" onchange="previewImage(event)">
      <div class="mt-3">
        <img id="imagePreview" src="#" alt="Preview Foto" style="display: none; max-width: 200px; border-radius: 6px; border: 1px solid #ccc;" />
      </div>
    </div>

    <!-- Deskripsi Produk -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Deskripsi Produk</label>
      <textarea name="deskripsi_produk" class="form-control" rows="4" placeholder="Tulis detail produk seperti bahan, ukuran, warna..."></textarea>
    </div>

    <!-- Tombol Simpan -->
    <div class="text-end">
      <button type="submit" class="btn btn-primary px-4">💾 Simpan</button>
    </div>
  </form>
</div>

<!-- JavaScript: Preview Foto Otomatis -->
<script>
  function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');
    const reader = new FileReader();
    
    reader.onload = function () {
      preview.src = reader.result;
      preview.style.display = 'block';
    }

    if (input.files && input.files[0]) {
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
