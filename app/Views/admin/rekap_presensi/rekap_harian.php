<?= $this->extend('admin/layout.php') ?>

<?= $this->section('content') ?>

<form class="row g-3">
  <div class="col-auto">
    <input type="date" class="form-control" name="filter_tanggal">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Tampilkan</button>
  </div>
  <div class="col-auto">
    <button type="submit" name="excel" class="btn btn-success mb-3">Export Excel </button>
  </div>
</form>
<!-- Info Tanggal -->
<span>Menampilkan Data: 
    <?php if ($tanggal) : ?>
        <?= date('d F Y', strtotime($tanggal)) ?>
    <?php else : ?>
        <?= date('d F Y') ?>
    <?php endif; ?>
</span>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Jam Masuk</th>
            <th class="text-center">Jam Keluar</th>
            <th class="text-center">Total Jam Kerja</th>
            <th class="text-center">Total Keterlambatan</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rekap_harian): ?>
            <?php $no = 1; ?>
            <?php foreach ($rekap_harian as $rekap): ?>
            <?php 
                // Menghitung total jam kerja
                $timestamp_jam_masuk = strtotime($rekap['tanggal_masuk'] . ' ' . $rekap['jam_masuk']);
                $timestamp_jam_keluar = strtotime($rekap['tanggal_keluar'] . ' ' . $rekap['jam_keluar']);
                $selisih = $timestamp_jam_keluar - $timestamp_jam_masuk; // Perbaikan logika untuk menghitung selisih
                $jam = floor($selisih / 3600);
                $selisih -= $jam * 3600;
                $menit = floor($selisih / 60);

                // Menghitung total jam keterlambatan
                $jam_masuk_real = strtotime($rekap['jam_masuk']);
                $jam_masuk_kantor = strtotime($rekap['jam_masuk_kantor']);
                $selisih_terlambat = $jam_masuk_real - $jam_masuk_kantor;
                $jam_terlambat = floor($selisih_terlambat / 3600);
                $selisih_terlambat -= $jam_terlambat * 3600;
                $menit_terlambat = floor($selisih_terlambat / 60);
            ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td><?= esc($rekap['nama']) ?></td>
                <td class="text-center"><?= date('d F Y', strtotime($rekap['tanggal_masuk'])) ?></td>
                <td class="text-center"><?= esc($rekap['jam_masuk']) ?></td>
                <td class="text-center"><?= esc($rekap['jam_keluar']) ?></td>
                <td class="text-center">
                    <?php if ($rekap['jam_keluar'] == '00:00:00'): ?>
                        0 Jam 0 Menit
                    <?php else: ?>
                        <?= $jam . ' Jam ' . $menit . ' Menit' ?>
                    <?php endif; ?>
                </td>
                <td class="text-center">
                    <?php if ($selisih_terlambat < 0): // On time condition ?>
                        <span class="badge bg-success text-decoration-none mb-2">On Time</span>
                    <?php else: ?>
                        <?= $jam_terlambat . ' Jam ' . $menit_terlambat . ' Menit' ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">Data tidak tersedia</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


<?= $this->endSection() ?>