<?php include 'assets/setting.php'; ?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>interior</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link rel="manifest" href="site.webmanifest"> -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
  <!-- Place favicon.ico in the root directory -->

  <!-- CSS here -->
  <?php include 'assets/css.php'; ?>
  <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
  <!--[if lte IE 9]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
  <?php include 'assets/header.php'; ?>

  <!-- bradcam_area  -->
  <div class="bradcam_area bradcam_bg_4">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="bradcam_text text-center">
            <h3>Berita</h3>
            <p>List data berita</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ bradcam_area  -->


  <!--================Blog Area =================-->
  <section class="blog_area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0">
          <div class="blog_left_sidebar">

            <?php $query = $mysqli->query("SELECT * FROM tb_berita ORDER BY id_berita DESC"); ?>
            <?php while ($value = $query->fetch_object()) { ?>
              <article class="blog_item">
                <div class="blog_item_img">
                  <img class="card-img rounded-0" src="../../vendor/berita_image/<?= $value->image_berita; ?>" alt="">
                  <a href="#" class="blog_item_date">
                  <h3><?= date("d", strtotime($value->tanggal)) ?></h3>
                  <p><?= date("M", strtotime($value->tanggal)) ?></p>
                  <p><?= date("Y", strtotime($value->tanggal)) ?></p>
                </a>
              </div>

              <div class="blog_details">
                <a class="d-inline-block" href="detail_berita.php?id=<?= $value->id_berita; ?>">
                  <h2><?= $value->judul_berita; ?></h2>
                </a>
                <p><?= substr($value->kontent_berita, 0, 200); ?>... <a href="detail_berita.php?id=<?= $value->id_berita; ?>">Baca Selanjutnya</a></p>
              </div>
            </article>
          <?php } ?>

          <nav class="blog-pagination justify-content-center d-flex">
            <ul class="pagination">
              <li class="page-item">
                <a href="#" class="page-link" aria-label="Previous">
                  <i class="ti-angle-left"></i>
                </a>
              </li>
              <li class="page-item">
                <a href="#" class="page-link">1</a>
              </li>
              <li class="page-item active">
                <a href="#" class="page-link">2</a>
              </li>
              <li class="page-item">
                <a href="#" class="page-link" aria-label="Next">
                  <i class="ti-angle-right"></i>
                </a>
              </li>
            </ul>
          </nav>

        </div>
      </div>

      <div class="col-lg-4">
        <div class="blog_right_sidebar">
          <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Category Lokasi</h4>
            <ul class="list cat-list">
              <?php $category = $mysqli->query("SELECT * FROM tb_kategori"); ?>
              <?php while ($value = $category->fetch_object()) { ?>
                <li>
                  <a href="see_lokasi.php?id=<?= $value->id_kategori; ?>" class="d-flex">
                    <p><?= $value->jenis_kategori; ?></p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </aside>

        </div>
      </div>
    </div>
  </div>
</section>
<!--================Blog Area =================-->

<?php include 'assets/footer.php'; ?>

<?php include 'assets/js.php'; ?>
</body>
</html>
