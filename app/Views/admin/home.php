<?= $this->extend('admin/layout.php') ?>

<?= $this->section('content') ?>  

<div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon purple">
                <i class="lni lni-users"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Total Pegawai</h6>
                  <h3 class="text-bold mb-10"><?= $total_pegawai ?></h3>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon success">
                <i class="lni lni-checkmark-circle"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Hadir</h6>
                  <h3 class="text-bold mb-10"><?= $total_hadir ?></h3>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon primary">
                  <i class="lni lni-cross-circle"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Alpha</h6>
                  <h3 class="text-bold mb-10"><?=  $total_pegawai - $ketidakhadiran  ?></h3>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon orange">
                  <i class="lni lni-sad"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Cuti/Izin/Sakit</h6>
                  <h3 class="text-bold mb-10"><?= $ketidakhadiran ?></h3>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
</div>


<?= $this->endSection() ?>