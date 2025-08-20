<div class="container py-4">
  <?php if (empty($produk)): ?>
    <div class="alert alert-info" role="alert">
      <strong>Belum ada produk yang Anda jual!</strong> Silakan tambahkan produk baru untuk mulai berjualan.
    </div>
  <?php endif; ?>

  <div class="card border-0 shadow-sm p-3">
    <div class="card-body">
      <h5 class="fw-bold mb-4">Produk Jual - <?php echo $this->session->userdata("nama_member"); ?></h5>
    </div>
    <div class="table-responsive">
      <table class="table align-middle table-hover table-bordered">
        <thead class="table-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Berat (gram)</th>
            <th scope="col">Foto</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($produk as $key => $value): ?>
            <tr>
              <td><?php echo $key + 1 ?></td>
              <td class="fw-semibold"><?php echo $value['nama_produk'] ?></td>
              <td class="text-danger">Rp <?php echo number_format($value['harga_produk']) ?></td>
              <td><?php echo $value['berat_produk'] ?></td>
              <td>
                <img src="<?php echo $this->config->item("url_produk") . $value["foto_produk"]; ?>"
                  alt="Foto Produk"
                  width="120"
                  style="object-fit: cover; border-radius: 6px; transition: transform 0.3s ease; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"
                  onmouseover="this.style.transform='scale(1.05)'"
                  onmouseout="this.style.transform='scale(1)'">
              </td>
              <td>
                <div class="d-flex flex-column flex-sm-row gap-2">
                  <a href="<?php echo base_url("seller/produk/edit/" . $value['id_produk']) ?>"
                    class="btn btn-sm btn-warning w-100">✏️ Edit</a>
                  <a href="<?php echo base_url("seller/produk/hapus/" . $value['id_produk']) ?>"
                    class="btn btn-sm btn-danger w-100"
                    onclick="return confirm('Yakin ingin menghapus produk ini?')">🗑️ Hapus</a>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>

    <div class="text-end mt-3">
      <a href="<?php echo base_url("seller/produk/tambah") ?>" class="btn btn-primary px-4">+ Tambah Produk</a>
    </div>
  </div>
</div>