<?= $this->extend('pegawai/layout.php') ?>
<?= $this->section('content') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<form method="post" action="<?= base_url('pegawai/presensi_masuk_aksi') ?>" id="presensi-form">
    <?= csrf_field() ?>
    <input type="hidden" id="id_pegawai" name="id_pegawai" value="<?= $id_pegawai ?>">
    <input type="hidden" id="tanggal_masuk" name="tanggal_masuk" value="<?= $tanggal_masuk ?>">
    <input type="hidden" id="jam_masuk" name="jam_masuk" value="<?= $jam_masuk ?>">
    <input type="hidden" id="foto_masuk" name="foto_masuk">

    <div id="my_camera"></div>
    <button type="button" class="btn btn-primary mt-2" id="presensi-masuk">Presensi Masuk</button>
</form>

<script>
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    document.getElementById('presensi-masuk').addEventListener('click', function() {
        // Ambil foto dan kirim form
        Webcam.snap(function(data_uri) {
            document.getElementById('foto_masuk').value = data_uri;
            document.getElementById('presensi-form').submit();
        });
    });
</script>

<?= $this->endSection() ?>
