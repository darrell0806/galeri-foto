<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3><?=$title?></h3>
          <p class="text-subtitle text-muted">Anda dapat melihat <?=$title?> di bawah</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
      <div class="card">
        <div class="card-header">
          <a href="<?=base_url('/blok/tambah_blok/')?>">
            <button class="btn btn-primary"><i class="fa-solid fa-plus"></i>
            Tambah</button>
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Blok</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               <?php 
               $no=1;
               foreach ($a as $b) {
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $b->nama_b?> </td>
                  <td><?php echo $b->statuss?> </td>
                  <td>
                    <a href="<?=base_url('/blok/edit_blok/'.$b->id_blok)?>"><button class="btn btn-primary">Edit</button></a>
                    <a href="<?=base_url('/blok/delete_blok/'.$b->id_blok)?>"><button class="btn btn-danger">Delete</button></a>
                    <form method="post" action="<?= base_url('/blok/aksi/'.$b->id_blok) ?>">
                      <?php if ($b->statuss === 'Aktif'): ?>
                        <button class="btn btn-dark" type="submit">
                          Tidak-Aktif Status
                        </button>
                      <?php elseif (!$isAktifExist): ?>
                        <button class="btn btn-dark" type="submit">
                          Aktif Status
                        </button>
                      <?php else: ?>
                        <button class="btn btn-dark" type="submit" disabled>
                          Aktif Status
                        </button>
                      <?php endif; ?>
                    </form>



                  </td>

                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- Basic Tables end -->
</div>