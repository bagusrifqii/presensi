<?= $this->extend('pegawai/layout.php') ?>
<?= $this->section('content') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<form method="post" action="<?= base_url('pegawai/presensi_keluar_aksi/'. $id_presensi) ?>" id="presensi-form">
    <?= csrf_field() ?>
    <input type="hidden" id="tanggal_keluar" name="tanggal_keluar" value="<?= $tanggal_keluar ?>">
    <input type="hidden" id="jam_keluar" name="jam_keluar" value="<?= $jam_keluar ?>">
    <input type="hidden" id="foto_keluar" name="foto_keluar">

    <div id="my_camera"></div>
    <button type="button" class="btn btn-danger mt-2" id="presensi-keluar">Keluar</button>
</form>

<script>
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    document.getElementById('presensi-keluar').addEventListener('click', function() {
        // Ambil foto dan kirim form
        Webcam.snap(function(data_uri) {
            document.getElementById('foto_keluar').value = data_uri;
            document.getElementById('presensi-form').submit();
        });
    });
</script>

<?= $this->endSection() ?>
