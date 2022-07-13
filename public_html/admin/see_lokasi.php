<?php include 'assets/setting.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>List Data Lokasi</title>
  <?php include 'assets/css.php'; ?>
</head>

<body>
  <div class="container-scroller">
    <?php include 'assets/navbar.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <!-- partial:../../partials/_sidebar.html -->
      <?php include 'assets/sidebar.php'; ?>

      <!-- partial -->
      <div class="main-panel">

        <!-- content start -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List Data Lokasi</h4>
                  <div class="row">
                    <div class="col-1">
                      <p class="card-description">
                        <a href="add_rs.php" class="btn btn-info">Tambah RS</a>
                      </p>
                    </div>
                    <div class="col-1">
                      <p class="card-description">
                        <a href="add_lokasi.php" class="btn btn-primary">Tambah Sekolah</a>
                      </p>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Lokasi</th>
                          <th>Penambah</th>
                          <th>Longtitude</th>
                          <th>Latitude</th>
                          <th>Alamat</th>
                          <th>Gambar</th>
                          <?php if ($profil->status=='0'): ?>
                            <th>Aksi</th>
                          <?php endif; ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 0; ?>
                        <?php $query = $mysqli->query("SELECT * FROM tb_lokasi as tbl JOIN tb_user as tbu ON tbu.id_user=tbl.id_user"); ?>
                        <?php while ($value = $query->fetch_object()) { ?>
                          <tr>
                            <td><?= $no+=1; ?></td>
                            <td><?= $value->nama_lokasi; ?></td>
                            <td><?= $value->fname; ?> <?= $value->lname; ?></td>
                            <td><?= $value->longtitude; ?></td>
                            <td><?= $value->latitude; ?></td>
                            <td><?= $value->alamat; ?></td>
                            <td>
                              <a target="_blank" href="../../vendor/lokasi_image/<?= $value->image_lokasi; ?>">
                                <img src="../../vendor/lokasi_image/<?= $value->image_lokasi; ?>" width="1000">
                              </a>
                            </td>
                            <td>
                              <?php if ($profil->status=='0'): ?>
                                <a href="add_lokasi.php?id=<?= $value->id_lokasi; ?>" class="btn btn-info">Ubah&nbsp;&nbsp;</a>
                                <a href="backend/lokasi/delete.php?id=<?= $value->id_lokasi; ?>" style="margin-top:2px;" class="btn btn-danger">Hapus</a>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php  } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->

          <?php include 'assets/footer.php'; ?>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php include 'assets/js.php'; ?>
  </body>

  </html>
