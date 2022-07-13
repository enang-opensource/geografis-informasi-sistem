<?php include 'assets/setting.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tambah Users</title>
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
                  <h4 class="card-title">Tambah User</h4>
                  <p class="card-description">
                    Masukan data user untuk menambahkan data!
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
                    <?php $query = $mysqli->query("SELECT * FROM tb_user WHERE id_user='$_GET[id]'"); ?>
                    <?php $data = $query->fetch_object(); ?>
                    <form action="backend/user/edit.php" method="post">
                      <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nama Depan</label>
                        <input type="text" class="form-control" name="fname" value="<?= $data->fname; ?>" placeholder="Nama Depan" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nama Belakang</label>
                        <input type="text" class="form-control" name="lname" value="<?= $data->lname; ?>" placeholder="Nama Belakang" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $data->email; ?>" placeholder="Email" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Password</label>
                        <input type="password" class="form-control" name="pass" value="<?= $data->password; ?>" placeholder="Password" required>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  <?php else: ?>
                    <form action="backend/user/add.php" method="post">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nama Depan</label>
                        <input type="text" class="form-control" name="fname" placeholder="Nama Depan" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nama Belakang</label>
                        <input type="text" class="form-control" name="lname" placeholder="Nama Belakang" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Password" required>
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
