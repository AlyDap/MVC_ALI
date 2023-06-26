<div class="container mt-3">
    <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> -->
    <?= Flasher::flash(); ?>
    <div class="row">
        <div class="col-7">

            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Tambah Mahasiswa</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Mahasiswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">NIM</label>
                                    <input type="text" class="form-control" id="recipient-name" name="nim" placeholder="Masukan NIM mahasiwa" required>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" id="recipient-name" name="nama" placeholder="Masukan nama mahasiwa" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Program Studi</label>
                                    <select class="form-select" aria-label="Default select example" name="jurusan" id="select-prodi" required>
                                        <option selected>-- Pilih Prodi --</option>
                                        <option value="SI">Sistem Informasi</option>
                                        <option value="TI">Teknik Informatika</option>
                                        <option value="MI">Manajemen Informatika</option>
                                        <option value="KA">Komputerisasi Akuntasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <h1 class="display-4">ini data mahasiswa</h1>

        <ul class="list-group">
            <?php foreach ($data['mhs'] as $mhs) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <?= $mhs['nama']; ?>
                    </div>
                    <div>
                        <a class="badge rounded-pill text-bg-dark" style="text-decoration: none;" href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>">detail</a>
                        <a class="badge rounded-pill text-bg-danger" style="text-decoration: none;" href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" onclick="return confirm('Yakin Mau hapus data <?= $mhs['nama']; ?>?');">hapus</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php session_destroy(); ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var selectElement = document.getElementById('select-prodi');

        selectElement.addEventListener('change', function() {
            if (selectElement.value === "-- Pilih Prodi --") {
                selectElement.setCustomValidity('Silakan pilih program studi');
            } else {
                selectElement.setCustomValidity('');
            }
        });

        // Memastikan validasi tetap aktif saat halaman dimuat
        if (selectElement.value === "-- Pilih Prodi --") {
            selectElement.setCustomValidity('Silakan pilih program studi');
        }
    });
</script>