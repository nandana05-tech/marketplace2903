<!-- Carousel Slider -->
<div id="myCarousel" class="carousel slide mb-5" data-bs-ride="carousel">

    <!-- INDICATORS -->
    <div class="carousel-indicators">
        <?php foreach ($slider as $key => $value): ?>
            <button type="button"
                data-bs-target="#myCarousel"
                data-bs-slide-to="<?= $key ?>"
                class="<?= $key == 0 ? 'active' : '' ?>"
                aria-label="Slide <?= $key + 1 ?>">
            </button>
        <?php endforeach; ?>
    </div>

    <!-- SLIDES -->
    <div class="carousel-inner">
        <?php foreach ($slider as $key => $value): ?>
            <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                <img
                    src="<?= $this->config->item("url_slider") . $value["foto_slider"] ?>"
                    alt="Slider <?= $key ?>"
                    class="d-block w-100 img-fluid"
                    style="width: 100%; height: 450px; object-fit: cover; object-position: center center;">

                <div class="carousel-caption d-none d-md-block text-start">
                    <h5 class="text-black"><?= $value["caption_slider"] ?></h5>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- NAVIGATION -->
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Sebelumnya</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Berikutnya</span>
    </button>

</div>

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

<!-- Kategori Produk -->
<section class="container marketing mb-5">
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

<!-- Produk Terbaru -->
<section class="container mb-5">
    <h3 class="fw-bold mb-4">Produk Terbaru</h3>
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
<!-- Artikel Terbaru -->
<section class="container mb-5">
    <h3 class="fw-bold mb-4">Artikel Terbaru</h3>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-6 g-3">
        <?php foreach ($artikel as $value): ?>
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="<?= $this->config->item("url_artikel") . $value["foto_artikel"] ?>"
                        alt="Artikel"
                        class="card-img-top"
                        style="height: 180px; object-fit: cover;">
                    <div class="card-body p-2">
                        <p class="mb-0 text-truncate" title="<?= $value["judul_artikel"] ?>"><?= $value["judul_artikel"] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>