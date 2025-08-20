<div class="container py-4">
    <div class="mb-4">
        <h4 class="fw-semibold">Selamat datang, <?= $this->session->userdata("nama_member"); ?> 👋</h4>
        <p class="lead text-muted">
            Melalui panel ini Anda dapat mengelola produk yang Anda jual maupun beli dengan mudah.
        </p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <i class="bi bi-box-seam fs-2 text-primary"></i>
                    </div>
                    <h6 class="text-muted">Total Produk</h6>
                    <h4 class="fw-bold mb-0"><?= count($produk); ?></h4>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <i class="bi bi-cart-check fs-2 text-success"></i>
                    </div>
                    <h6 class="text-muted">Total Pembelian</h6>
                    <h4 class="fw-bold mb-0"><?= count($beli); ?></h4>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <i class="bi bi-currency-dollar fs-2 text-warning"></i>
                    </div>
                    <h6 class="text-muted">Total Penjualan</h6>
                    <h4 class="fw-bold mb-0"><?= count($jual); ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>
