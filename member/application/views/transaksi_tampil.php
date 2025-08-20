<div class="container py-4">
  <h5 class="fw-bold mb-4">🛍️ Data Transaksi Beli - <?php echo $this->session->userdata("nama_member"); ?></h5>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle" id="tabelku">
      <thead class="table-light">
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Total</th>
          <th>Status & Resi</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($transaksi as $key => $value): ?>
          <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo date('d M Y H:i', strtotime($value['tanggal_transaksi'])); ?></td>
            <td class="text-danger fw-semibold">Rp <?php echo number_format($value['total_transaksi']); ?></td>
            <td>
              <?php
                $status = strtolower($value['status_transaksi']);
                $warna_status = $status == 'lunas' ? 'success' : ($status == 'pesan' ? 'warning' : 'secondary');
              ?>
              <span class="badge bg-<?php echo $warna_status; ?>">
                <?php echo $value['status_transaksi']; ?>
              </span>
              <div class="text-muted small mt-1">Resi: <strong><?php echo $value['resi_ekspedisi'] ?: 'Belum tersedia'; ?></strong></div>
            </td>
            <td>
              <a href="<?php echo base_url("transaksi/detail/" . $value["id_transaksi"]) ?>" 
                 class="btn btn-sm btn-info text-white d-inline-flex align-items-center gap-1"
                 style="transition: background-color 0.3s ease;">
                <i class="bi bi-eye-fill"></i> Detail
              </a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
