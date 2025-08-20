<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mt-5 offset-md-2 bg-white shadow p-5 rounded">
            <h5 class="text-center">Ubah Akun Member</h5>
            <form method="post">
                <div class="mb-3">
                    <label for="">Email Anda</label>
                    <input type="text" name="email_member" class="form-control" value="<?php echo set_value("email_member", $this->session->userdata("email_member")); ?>">
                    <span class="text-danger small">
                        <?php echo form_error('email_member'); ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="text" name="password_member" class="form-control">
                    <p class="text-muted">Kosongkan jika password tidak diubah</p>
                </div>
                <div class="mb-3">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama_member" class="form-control" value="<?php echo set_value("nama_member", $this->session->userdata("nama_member")); ?>">
                    <span class="text-danger small">
                        <?php echo form_error('nama_member'); ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="">Alamat Lengkap</label>
                    <input type="text" name="alamat_member" class="form-control" value="<?php echo set_value("alamat_member", $this->session->userdata("alamat_member")); ?>">
                    <span class="text-danger small">
                        <?php echo form_error('alamat_member'); ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="">Nomor WA</label>
                    <input type="text" name="wa_member" class="form-control" value="<?php echo set_value("wa_member", $this->session->userdata("wa_member")); ?>">
                    <span class="text-danger small">
                        <?php echo form_error('wa_member'); ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="">Kota/Kabupaten</label>
                    <select class="form-control form-select" name="kode_distrik_member" id="citySelect">
                        <option value="">
                            Pilih
                        </option>
                        <?php foreach ($distrik as $key => $value): ?>
                            <option value="<?php echo $value['city_id'] ?>" <?php echo $value['city_id'] == set_value("city_id", $this->session->userdata("kode_distrik_member")) ? "selected" : "" ?>>
                                <?php echo $value['type'] ?>
                                <?php echo $value['city_name'] ?>
                                <?php echo $value['province'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <span class="text-muted"><?php echo form_error("city_id") ?></span>
                </div>
                <button class="btn btn-primary">Ubah Akun</button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const select = document.getElementById("citySelect");

    // Sembunyikan select asli
    select.style.display = "none";

    // Buat container input + clear button
    const container = document.createElement("div");
    container.style.position = "relative";
    container.style.display = "flex";
    container.style.alignItems = "center";

    // Buat input search
    const input = document.createElement("input");
    input.type = "text";
    input.placeholder = "Cari kota...";
    input.className = "form-control mb-2";

    // Buat tombol silang (clear)
    const clearBtn = document.createElement("span");
    clearBtn.innerHTML = "&times;";
    clearBtn.style.cursor = "pointer";
    clearBtn.style.position = "absolute";
    clearBtn.style.right = "10px";
    clearBtn.style.top = "50%";
    clearBtn.style.transform = "translateY(-50%)";
    clearBtn.style.fontSize = "18px";
    clearBtn.style.color = "#888";
    clearBtn.style.display = "none"; // disembunyikan dulu

    // Buat dropdown hasil filter
    const results = document.createElement("div");
    results.style.border = "1px solid #ccc";
    results.style.maxHeight = "150px";
    results.style.overflowY = "auto";
    results.style.display = "none";
    results.style.position = "absolute";
    results.style.backgroundColor = "white";
    results.style.zIndex = "1000";
    results.className = "form-control";
    results.style.top = "38px";
    results.style.left = "0";
    results.style.right = "0";

    // Sisipkan ke DOM
    select.parentNode.insertBefore(container, select);
    container.appendChild(input);
    container.appendChild(clearBtn);
    container.appendChild(results);
    container.appendChild(select);

    // Ambil semua opsi dari select
    const options = Array.from(select.options).filter(opt => opt.value !== "");

    function filterOptions(keyword) {
        results.innerHTML = "";
        const filtered = options.filter(opt =>
            opt.textContent.toLowerCase().includes(keyword.toLowerCase())
        );

        filtered.forEach(opt => {
            const div = document.createElement("div");
            div.textContent = opt.textContent;
            div.style.padding = "5px";
            div.style.cursor = "pointer";
            div.addEventListener("click", () => {
                input.value = opt.textContent;
                select.value = opt.value;
                results.style.display = "none";
                clearBtn.style.display = "block";
            });
            results.appendChild(div);
        });

        results.style.display = filtered.length ? "block" : "none";
    }

    input.addEventListener("input", () => {
        const keyword = input.value;
        clearBtn.style.display = keyword ? "block" : "none";
        if (keyword.trim() === "") {
            results.style.display = "none";
            return;
        }
        filterOptions(keyword);
    });

    // Clear input dan reset <select>
    clearBtn.addEventListener("click", () => {
        input.value = "";
        select.value = "";
        results.style.display = "none";
        clearBtn.style.display = "none";
    });

    // Tutup dropdown jika klik di luar
    document.addEventListener("click", function (e) {
        if (!container.contains(e.target)) {
            results.style.display = "none";
        }
    });

    // Tampilkan value terpilih jika ada saat load
    const selected = select.options[select.selectedIndex];
    if (selected && selected.value !== "") {
        input.value = selected.textContent.trim();
        clearBtn.style.display = "block";
    }
});
</script>
