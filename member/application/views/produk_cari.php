<section class="bg-white py-5">
    <div class="container">
        <h4 class="text-center">Cari Produk</h4>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="get" action="<?php echo base_url("produk/cari") ?>">
                    <div class="input-group input-group-btn">
                        <input type="text" name="keyword" class="form-control" value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>" placeholder="Masukkan nama produk atau deskripsi">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="container my-5">
    <h3 class="fw-bold mb-4">Hasil Pencarian</h3>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-6 g-3">
        <?php foreach ($produk as $value): ?>
            <div class="col">
                <a href="<?= base_url("produk/detail/" . $value["id_produk"]) ?>" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="<?= $this->config->item("url_produk") . $value["foto_produk"] ?>"
                            alt="<?= $value["nama_produk"] ?>"
                            class="card-img-top"
                            style="height: 180px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="mb-1 text-truncate" title="<?= $value["nama_produk"] ?>"><?= $value["nama_produk"] ?></p>
                            <p class="fw-bold text-danger mb-0" style="font-size: 14px;">Rp <?= number_format($value["harga_produk"]) ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>