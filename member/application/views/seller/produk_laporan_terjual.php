<div class="container">
    <h3>Laporan Produk Terjual</h3>

    <form method="POST" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="">Mulai</label>
                <input type="date" name="tglm" class="form-control" value="<?php echo $tglm; ?>">
            </div>
            <div class="col-md-3">
                <label for="">Sampai</label>
                <input type="date" name="tgls" class="form-control" value="<?php echo $tgls; ?>">
            </div>
            <div class="col-md-3">
                <label for="">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="lunas" <?php echo $status=='lunas' ? 'selected' : ''; ?>>Lunas</option>
                    <option value="pesan" <?php echo $status=='pesan' ? 'selected' : ''; ?>>Pesan</option>
                    <option value="batal" <?php echo $status=='batal' ? 'selected' : ''; ?>>Batal</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary">Tampilkan</button>
            </div>
        </div>
    </form>
    
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jumlah Terjual</th>
                <th>Nominal Terjual</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($laporan_terjual as $key => $value): ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value['nama_beli']; ?></td>
                    <td><?php echo number_format($value['jumlah_terjual']); ?></td>
                    <td><?php echo number_format($value['nominal_terjual']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<figure class="highcharts-figure">
    <div id="container" class="container"></div>

</figure>

<script>
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Laporan Produk Terjual'
        },
        xAxis: {
            categories: [
                <?php foreach ($laporan_terjual as $key => $value): ?> '<?php echo $value['nama_beli']; ?>',
                <?php endforeach; ?>
            ],
            crosshair: true,
            accessibility: {
                description: 'Produk'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: ' item'
            }
        },
        tooltip: {
            valueSuffix: ' item'
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Produk',
            data: [
                <?php foreach ($laporan_terjual as $key => $value): ?>
                    <?php echo $value['jumlah_terjual']; ?>,
                <?php endforeach; ?>
            ]
        }, ]
    });
</script>