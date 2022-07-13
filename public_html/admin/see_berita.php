<?php include 'assets/setting.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>List Data Berita</title>
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
                  <h4 class="card-title">List Data Berita</h4>
                  <p class="card-description">
                    <a href="add_berita.php" class="btn btn-primary">Tambah Data</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul Berita</th>
                          <th>Penulis</th>
                          <th>Kontent</th>
                          <th>Gambar</th>
                          <?php if ($profil->status=='0'): ?>
                            <th>Aksi</th>
                          <?php endif; ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 0; ?>
                        <?php $query = $mysqli->query("SELECT * FROM tb_berita as tbb JOIN tb_user as tbu ON tbu.id_user=tbb.id_user"); ?>
                        <?php while ($value = $query->fetch_object()) { ?>
                          <tr>
                            <td><?= $no+=1; ?></td>
                            <td><?= $value->judul_berita; ?></td>
                            <td><?= $value->fname; ?> <?= $value->lname; ?></td>
                            <td><?=  substr($value->kontent_berita, 0, 200); ?>...</td>
                            <td>
                              <a href="../../vendor/berita_image/<?= $value->image_berita; ?>" target="_blank">
                                <img src="../../vendor/berita_image/<?= $value->image_berita; ?>" alt=""></a>
                              </td>
                              <td>
                                <?php if ($profil->status=='0'): ?>
                                  <a href="add_berita.php?id=<?= $value->id_berita; ?>" class="btn btn-info">Ubah&nbsp;&nbsp;</a>
                                  <a href="backend/berita/delete.php?id=<?= $value->id_berita; ?>" style="margin-top:2px;" class="btn btn-danger">Hapus</a>
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
