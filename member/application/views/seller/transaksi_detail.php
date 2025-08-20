<div class="container py-4">
  <div class="row mb-5 g-4">
    <!-- Info Transaksi -->
    <div class="col-md-3">
      <h5 class="fw-bold">🧾 Transaksi</h5>
      <p class="mb-1 text-muted">ID: <?php echo $transaksi['id_transaksi'] ?></p>
      <p class="mb-1"><?php echo date('d M Y H:i', strtotime($transaksi['tanggal_transaksi'])) ?></p>
      <?php
        $status = strtolower($transaksi['status_transaksi']);
        $warna = $status == 'lunas' ? 'success' : ($status == 'pesan' ? 'warning' : 'secondary');
      ?>
      <span class="badge bg-<?php echo $warna; ?>"><?php echo ucfirst($transaksi['status_transaksi']) ?></span>
    </div>

    <!-- Pengirim -->
    <div class="col-md-3">
      <h5 class="fw-bold">📤 Pengirim</h5>
      <p class="mb-1"><?php echo $transaksi['nama_pengirim'] ?> <br><small><?php echo $transaksi['wa_pengirim'] ?></small></p>
      <p class="small text-muted"><?php echo $transaksi['alamat_pengirim'] ?>, <?php echo $transaksi['distrik_pengirim'] ?></p>
    </div>

    <!-- Penerima -->
    <div class="col-md-3">
      <h5 class="fw-bold">📥 Penerima</h5>
      <p class="mb-1"><?php echo $transaksi['nama_penerima'] ?> <br><small><?php echo $transaksi['wa_penerima'] ?></small></p>
      <p class="small text-muted"><?php echo $transaksi['alamat_penerima'] ?>, <?php echo $transaksi['distrik_penerima'] ?></p>
    </div>

    <!-- Ekspedisi & Resi -->
    <div class="col-md-3">
      <h5 class="fw-bold">🚚 Ekspedisi</h5>
      <p class="mb-1"><?php echo $transaksi['nama_ekspedisi'] ?> (<?php echo $transaksi['layanan_ekspedisi'] ?>)</p>
      <p class="small text-muted">Estimasi: <?php echo $transaksi['estimasi_ekspedisi'] ?>, Berat: <?php echo $transaksi['berat_ekspedisi'] ?> gram</p>
      
      <!-- Form Resi -->
      <form method="post">
        <div class="input-group">
          <input 
            type="text" 
            name="resi_ekspedisi" 
            class="form-control" 
            value="<?php echo $transaksi['resi_ekspedisi'] ?>" 
            placeholder="<?php echo $transaksi['status_transaksi'] == 'lunas' ? 'Nomor Resi Ekspedisi' : 'Nomor Resi belum bisa diisi' ?>" 
            <?php echo $transaksi['status_transaksi'] != 'lunas' ? 'disabled' : '' ?>>
          <button class="btn btn-primary" <?php echo $transaksi['status_transaksi'] != 'lunas' ? 'disabled' : '' ?>>Kirim</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Produk -->
  <h5 class="fw-bold mb-3">🛒 Produk</h5>
  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($transaksi_detail as $key => $value): ?>
          <tr>
            <td><?php echo $value['nama_beli'] ?></td>
            <td>Rp <?php echo number_format($value['harga_beli']) ?></td>
            <td><?php echo number_format($value['jumlah_beli']) ?></td>
            <td class="fw-semibold text-danger">Rp <?php echo number_format($value['harga_beli'] * $value['jumlah_beli'])?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
      <tfoot class="table-light">
        <tr>
          <td colspan="3" class="text-end fw-semibold">Total Belanja</td>
          <td class="fw-bold">Rp <?php echo number_format($transaksi['belanja_transaksi']) ?></td>
        </tr>
        <tr>
          <td colspan="3" class="text-end fw-semibold">Ongkos Kirim</td>
          <td class="fw-bold">Rp <?php echo number_format($transaksi['ongkir_transaksi']) ?></td>
        </tr>
        <tr>
          <td colspan="3" class="text-end fw-bold text-uppercase bg-light">Total Dibayar</td>
          <td class="fw-bold bg-light text-success">Rp <?php echo number_format($transaksi['total_transaksi']) ?></td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
