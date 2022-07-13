<?php include 'assets/setting.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
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
                  <h4 class="card-title">Welcome to GIS System Information</h4>
                  <h4>Hallo, <?= $profil->fname; ?> <?= $profil->lname; ?></h4>
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
  <!-- base:js -->
  <script src="../../vendor/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../vendor/js/off-canvas.js"></script>
  <script src="../../vendor/js/hoverable-collapse.js"></script>
  <script src="../../vendor/js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../../vendor/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../../vendor/js/chart.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
