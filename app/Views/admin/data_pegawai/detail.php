<?= $this->extend('admin/layout.php') ?>

<?= $this->section('content') ?>


<div class="card col-md-8" style="padding-top: 20px;">
<img class="profile-image" src="<?= base_url('profile/' . $pegawai['foto']) ?>" alt="">
    <div class="card-body">
        <table class="table">
            <tr>
                <td><strong>NIP</strong></td>
                <td>:</td>
                <td><?= $pegawai['nip'] ?></td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td>:</td>
                <td><?= $pegawai['nama'] ?></td>
            </tr>
            <tr>
                <td><strong>Username</strong></td>
                <td>:</td>
                <td><?= $pegawai['username'] ?></td>
            </tr>
            <tr>
                <td><strong>jenis kelamin</strong></td>
                <td>:</td>
                <td><?= $pegawai['jenis_kelamin'] ?></td>
            </tr>
            <tr>
                <td><strong>Alamat</strong></td>
                <td>:</td>
                <td><?= $pegawai['alamat'] ?></td>
            </tr>
            <tr>
                <td><strong>No Handphone</strong></td>
                <td>:</td>
                <td><?= $pegawai['no_handphone'] ?></td>
            </tr>
            <tr>
                <td><strong>Jabatan</strong></td>
                <td>:</td>
                <td><?= $pegawai['jabatan'] ?></td>
            </tr>
            <tr>
                <td><strong>Lokasi Presensi</strong></td>
                <td>:</td>
                <td><?= $pegawai['lokasi_presensi'] ?></td>
            </tr>
            <tr>
                <td><strong>Role</strong></td>
                <td>:</td>
                <td><?= $pegawai['role'] ?></td>
            </tr>
        </table>
    </div>
</div>
<style>
    .profile-image {
    width: 120px;
    margin-bottom: 20px;
    margin-left: 20px;
    border-radius: 5px;
}
</style>
<?= $this->endSection() ?>