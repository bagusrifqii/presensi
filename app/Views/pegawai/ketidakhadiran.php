<?= $this->extend('pegawai/layout.php') ?>

<?= $this->section('content') ?>

<a href="<?= base_url('pegawai/ketidakhadiran/create') ?>" class="btn btn-primary mb-2">
    <i class="lni lni-circle-plus"></i> Ajukan </a>


    <table class="table" id="datatables">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Deskripsi</th>
                <th>File</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php if ($ketidakhadiran) : ?>
        <tbody>
            <?php $no = 1; foreach ($ketidakhadiran as $ketidakhadiran) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($ketidakhadiran['tanggal']) ?></td>
                    <td><?= esc($ketidakhadiran['keterangan']) ?></td>
                    <td><?= esc($ketidakhadiran['deskripsi']) ?></td>
                    
                    <td>
                        <a class="badge bg-success" href="<?= base_url('file_ketidakhadiran/' . $ketidakhadiran['file']) ?>">Download</a>
                    </td>
                    <td><?= esc($ketidakhadiran['status']) ?></td>
                    <td>
                        <a href="<?= base_url('pegawai/ketidakhadiran/edit/' . $ketidakhadiran['id']) ?>" class="badge bg-primary text-decoration-none mb-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= base_url('pegawai/ketidakhadiran/delete/' . $ketidakhadiran['id']) ?>" class="badge bg-danger text-decoration-none mb-2 tombol-hapus">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
            <?php else : ?>
                <tbody>
                    <tr>
                        <td colspan="7">Data masih kosong</td>
                    </tr>
                </tbody>
            <?php endif ; ?>
    </table>

<?= $this->endSection() ?>