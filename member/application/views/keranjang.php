<div class="container py-4">
  <?php if (empty($keranjang)): ?>
    <div class="alert alert-info d-flex align-items-center justify-content-between flex-wrap shadow-sm border-0 p-4 rounded-3">
      <div class="d-flex align-items-center">
        <i class="bi bi-cart-x-fill fs-3 me-3 text-primary"></i>
        <div>
          <h5 class="mb-1 fw-bold">Keranjang belanja Anda kosong!</h5>
          <p class="mb-0">Silakan tambahkan produk ke keranjang untuk melanjutkan.</p>
        </div>
      </div>
      <div class="mt-3 mt-md-0">
        <a href="<?php echo base_url("produk") ?>" class="btn btn-primary btn-sm px-4">
          Belanja Sekarang
        </a>
      </div>
    </div>

  <?php endif; ?>

  <?php foreach ($keranjang as $key => $per_penjual): ?>
    <div class="card mb-4 shadow-sm border-0" style="border-radius: 10px;">
      <div class="card-header bg-white fw-bold fs-5" style="border-bottom: 1px solid #eee;">
        🏬 <?php echo $per_penjual["nama_member"] ?>
      </div>

      <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0" style="border-radius: 10px;">
          <thead class="table-light">
            <tr>
              <th style="width: 40%">Produk</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($per_penjual['produk'] as $key => $per_produk): ?>
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="<?php echo $this->config->item("url_produk") . $per_produk["foto_produk"] ?>"
                      alt="Produk"
                      width="70"
                      class="rounded me-3"
                      style="object-fit: cover; transition: transform 0.3s;"
                      onmouseover="this.style.transform='scale(1.1)'"
                      onmouseout="this.style.transform='scale(1)'">
                    <span class="fw-semibold"><?php echo $per_produk["nama_produk"] ?></span>
                  </div>
                </td>
                <td class="text-danger fw-bold">Rp <?php echo number_format($per_produk['harga_produk']) ?></td>
                <td><?php echo $per_produk['jumlah'] ?></td>
                <td>
                  <a href="<?php echo base_url("keranjang/hapus/" . $per_produk["id_keranjang"]) ?>"
                    class="btn btn-sm btn-outline-danger"
                    onclick="return confirm('Yakin ingin menghapus item ini?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>

      <div class="card-footer bg-white py-3">
        <div class="d-flex justify-content-between flex-wrap">
          <!-- Kiri -->
          <a href="<?php echo base_url("produk") ?>" class="btn btn-outline-secondary px-4 mb-2">
            Belanja Lagi
          </a>

          <!-- Kanan -->
          <a href="<?php echo base_url("keranjang/checkout/" . $per_penjual["id_member"]) ?>" class="btn btn-primary px-4 mb-2">
            Checkout
          </a>
        </div>
      </div>

    </div>
  <?php endforeach ?>
</div>