<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <h1 class="display-4">ini data mahasiswa</h1>

            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $mhs['nama']; ?>
                        <a class="badge badge-pill badge-dark" href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>">detail</a>
                    </li>


                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>