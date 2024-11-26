<?= $this->extend('admin/layout.php') ?>

<?= $this->section('content') ?>

<a href="<?= base_url('admin/lokasi_presensi/create') ?>"
 class="btn btn-primary"><i class="lni lni-circle-plus"></i> Tambah Data</a>

<table class="table table-striped" id ="datatables">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lokasi</th>
            <th>Alamat Lokasi</th>
            <th> Tipe Lokasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
 <tbody>
<?php $no = 1; foreach ($lokasi_presensi as $lok) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= esc($lok['nama_lokasi']) ?></td>
        <td><?= esc($lok['alamat_lokasi']) ?></td>
        <td><?= esc($lok['tipe_lokasi']) ?></td>
        <td>
            <!-- Edit, Delete, and Detail buttons -->
            <a href="<?= base_url('admin/lokasi_presensi/detail/' . $lok['id']) ?>" class="badge bg-success text-decoration-none mb-2">Detail</a>
            <a href="<?= base_url('admin/lokasi_presensi/edit/' . $lok['id']) ?>" class="badge bg-warning text-decoration-none mb-2">Edit</a>
            <a href="<?= base_url('admin/lokasi_presensi/delete/' . $lok['id']) ?>" class="badge bg-danger text-decoration-none mb-2 tombol-hapus">Hapus</a>
        </td>
    </tr>
<?php endforeach ?>
</tbody>
</table>


<?= $this->endSection() ?>