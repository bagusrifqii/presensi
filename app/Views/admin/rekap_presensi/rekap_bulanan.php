<?= $this->extend('admin/layout.php') ?>

<?= $this->section('content') ?>

<form class="row g-3">
  <div class="col-auto">
  <select name="filter_bulan" class="form-control">
            <option value="">--Pilih Bulan--</option>
            <?php 
            // Array nama bulan
            $bulan_list = [
                '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', 
                '04' => 'April', '05' => 'Mei', '06' => 'Juni', 
                '07' => 'Juli', '08' => 'Agustus', '09' => 'September', 
                '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
            ]; 
            foreach ($bulan_list as $key => $value) : ?>
                <option value="<?= $key ?>"><?= $value ?></option>
            <?php endforeach; ?>
        </select>
  </div>

  <div class="col-auto">
        <select name="filter_tahun" class="form-control">
            <?php 
            // Daftar tahun
            $tahun_list = [2024, 2025, 2026];
            foreach ($tahun_list as $tahun_option) : ?>
                <option value="<?= $tahun_option ?>"><?= $tahun_option ?></option>
            <?php endforeach; ?>
        </select>
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
    <?php if ($bulan) : ?>
        <?= date('F Y', strtotime($tahun . '-' . $bulan)) ?>
    <?php else : ?>
        <?= date('F Y') ?>
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
        <?php if ($rekap_bulanan): ?>
            <?php $no = 1; ?>
            <?php foreach ($rekap_bulanan as $rekap): ?>
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