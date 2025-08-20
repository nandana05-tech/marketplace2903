<div class="container py-4">
  <h5 class="fw-bold mb-4">✏️ Edit Produk</h5>

  <form method="post" enctype="multipart/form-data">
    
    <!-- Kategori -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Kategori</label>
      <select name="id_kategori" class="form-select">
        <option value="">Pilih Kategori</option>
        <?php foreach ($kategori as $key => $value): ?>
          <option value="<?php echo $value['id_kategori'] ?>" <?php echo ($produk['id_kategori'] == $value['id_kategori']) ? 'selected' : '' ?>>
            <?php echo $value['nama_kategori'] ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>

    <!-- Nama Produk -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Nama Produk</label>
      <input type="text" name="nama_produk" class="form-control" value="<?php echo $produk['nama_produk'] ?>" placeholder="Masukkan nama produk...">
    </div>

    <!-- Harga -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Harga</label>
      <input type="number" name="harga_produk" class="form-control" value="<?php echo $produk['harga_produk'] ?>" placeholder="Contoh: 100000">
    </div>

    <!-- Berat -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Berat</label>
      <div class="input-group">
        <input type="number" name="berat_produk" class="form-control" value="<?php echo $produk['berat_produk'] ?>" placeholder="Gram">
        <span class="input-group-text">gram</span>
      </div>
    </div>

    <!-- Upload Foto -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Foto Baru (jika ingin mengganti)</label>
      <input type="file" name="foto_produk" class="form-control">
    </div>

    <!-- Foto Lama -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Foto Lama</label><br>
      <img src="<?php echo $this->config->item("url_produk").$produk["foto_produk"];  ?>" 
           alt="Foto Lama" 
           width="200" 
           class="rounded border shadow-sm mt-2" 
           style="object-fit: cover;">
    </div>

    <!-- Deskripsi -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Deskripsi</label>
      <textarea name="deskripsi_produk" class="form-control" rows="4" placeholder="Tulis deskripsi produk..."><?php echo $produk['deskripsi_produk'] ?></textarea>
    </div>

    <!-- Tombol Simpan -->
    <div class="text-end">
      <button type="submit" class="btn btn-primary px-4">💾 Simpan</button>
    </div>
  </form>
</div>
