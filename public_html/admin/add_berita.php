<?php include 'assets/setting.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tambah Berita</title>
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

        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Data Berita</h4>
                  <p class="card-description">
                    Silakan mengisi form berikut untuk memasukan data!
                  </p>
                  <?php if (isset($_GET['alert'])): ?>
                    <?php if ($_GET['alert']=='1'): ?>
                      <div class="alert alert-success" role="alert">
                        Berhasil memasukan data!
                      </div>
                    <?php else: ?>
                      <div class="alert alert-danger" role="alert">
                        Gagal memasukan data!
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>

                  <?php if (isset($_GET['id'])): ?>
                    <?php $query_lokasi = $mysqli->query("SELECT * FROM tb_berita WHERE id_berita='$_GET[id]'"); ?>
                    <?php $data = $query_lokasi->fetch_object(); ?>
                    <form class="forms-sample" action="backend/berita/edit.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="id_user" value="<?= $myprofil ?>">
                      <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Judul Berita</label>
                        <input type="text" class="form-control" name="j_berita" placeholder="Judul Berita" value="<?= $data->judul_berita; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Kontent Berita</label>
                        <textarea name="keterangan" class="form-control" rows="25" cols="80" placeholder="Kontent Berita" value="<?= $data->kontent_berita; ?>" required><?= $data->kontent_berita; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Gambar Lama</label>
                        <br>
                        <img alt="Gambar Lama" src="../../vendor/berita_image/<?= $data->image_berita; ?>" width="300">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Upload Gambar</label>
                        <input type="file" class="form-control" name="u_image">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  <?php else: ?>
                    <form class="forms-sample" action="backend/berita/add.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="id_user" value="<?= $myprofil ?>">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Judul Berita</label>
                        <input type="text" class="form-control" name="j_berita" placeholder="Judul Berita" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Kontent Berita</label>
                        <textarea name="keterangan" class="form-control" rows="25" cols="80" placeholder="Kontent Berita" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Upload Gambar</label>
                        <input type="file" class="form-control" name="u_image" required>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
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
