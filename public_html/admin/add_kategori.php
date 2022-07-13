<?php include 'assets/setting.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tambah Kategori</title>
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
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Kategori Lokasi</h4>
                  <p class="card-description">
                    Masukan data kategori untuk lokasi (Tempat wisata, Sekolah, Temapat Makan, dll)
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
                    <?php $query = $mysqli->query("SELECT * FROM tb_kategori WHERE id_kategori='$_GET[id]'"); ?>
                    <?php $data = $query->fetch_object(); ?>
                    <form action="backend/kategori/edit.php" method="post">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Jenis Kategori</label>
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <input type="text" class="form-control" name="j_kategori" placeholder="Jenis Kategori" value="<?= $data->jenis_kategori; ?>" required>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                    <?php else: ?>
                      <form action="backend/kategori/add.php" method="post">
                        <div class="form-group">
                          <label for="exampleInputUsername1">Jenis Kategori</label>
                          <input type="text" class="form-control" name="j_kategori" placeholder="Jenis Kategori" required>
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
