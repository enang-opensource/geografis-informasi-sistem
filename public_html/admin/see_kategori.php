<?php include 'assets/setting.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>List Data Kategori</title>
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
                  <h4 class="card-title">List Data Kategori</h4>
                  <p class="card-description">
                    <a href="add_kategori.php" class="btn btn-primary">Tambah Data</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenis Kategori</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 0; ?>
                        <?php $query = $mysqli->query("SELECT * FROM tb_kategori"); ?>
                        <?php while ($value = $query->fetch_object()) { ?>
                          <tr>
                            <td><?= $no+=1; ?></td>
                            <td><?= $value->jenis_kategori; ?></td>
                            <td>
                              <a href="add_kategori.php?id=<?= $value->id_kategori; ?>" class="btn btn-info">Ubah&nbsp;&nbsp;</a>
                              <a href="backend/kategori/delete.php?id=<?= $value->id_kategori; ?>" class="btn btn-danger">Hapus</a>
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
