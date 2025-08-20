<div class="container py-4">
  <div class="row align-items-center">
    <!-- Gambar Produk -->
    <div class="col-md-6 mb-4 mb-md-0">
      <div style="overflow: hidden; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s ease;"
        onmouseover="this.style.transform='scale(1.02)'"
        onmouseout="this.style.transform='scale(1)'">
        <img src="<?php echo $this->config->item("url_produk") . $produk["foto_produk"] ?>"
          class="w-100"
          alt="<?php echo $produk["nama_produk"] ?>"
          style="object-fit: cover; max-height: 450px;">
      </div>
    </div>

    <!-- Detail Produk -->
    <div class="col-md-6">
      <h1 class="fw-bold mb-2"><?php echo $produk["nama_produk"] ?></h1>
      <span class="badge bg-secondary px-3 py-2 mb-3" style="font-size: 0.9rem;"><?php echo $produk["nama_kategori"] ?></span>

      <p class="h4 text-danger fw-semibold mb-4">Rp <?php echo number_format($produk["harga_produk"]) ?></p>

      <?php if ($produk["id_member"] !== $this->session->userdata("id_member")): ?>
        <form method="post" class="mb-4">
          <label class="form-label fw-semibold">Jumlah:</label>
          <div class="input-group" style="max-width: 300px;">
            <input type="number" name="jumlah" class="form-control" min="1" value="1" required
              style="transition: border-color 0.3s ease;"
              onfocus="this.style.borderColor='#0d6efd'"
              onblur="this.style.borderColor='#ced4da'">
            <button class="btn btn-primary px-4">🛒 Beli</button>
          </div>
        </form>
      <?php endif ?>

      <hr class="my-4">

      <h6 class="fw-bold mb-2">Deskripsi Produk</h6>
      <div class="text-muted" style="line-height: 1.15; font-size: 15px;">
        <?= nl2br($produk["deskripsi_produk"]) ?>
      </div>

    </div>
  </div>
</div>