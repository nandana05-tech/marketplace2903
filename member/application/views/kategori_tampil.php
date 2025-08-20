<section class="container marketing my-5">
    <h2 class="fw-bold text-center mb-4">Kategori Produk</h2>
    <div class="row">
        <?php foreach ($kategori as $key => $value): ?>
            <div class="col-6 col-sm-4 col-md-3 mb-4 text-center">
                <a href="<?= base_url("kategori/detail/" . $value["id_kategori"]) ?>" class="text-decoration-none text-dark">
                    <img src="<?= $this->config->item("url_kategori") . $value["foto_kategori"] ?>" class="rounded-circle mb-2" width="100" height="100" alt="<?= $value["nama_kategori"] ?>">
                    <p><?= $value["nama_kategori"] ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>