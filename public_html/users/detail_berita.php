<?php include 'assets/setting.php'; ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Detail Berita</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link rel="manifest" href="site.webmanifest"> -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
  <!-- Place favicon.ico in the root directory -->
  <?php include 'assets/css.php'; ?>
</head>

<body>
  <!--[if lte IE 9]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <?php include 'assets/header.php'; ?>

  <?php $query = $mysqli->query("SELECT * FROM tb_berita WHERE id_berita='$_GET[id]'"); ?>
  <?php $detail = $query->fetch_object(); ?>

  <!-- get data comentar -->
  <?php $row = $mysqli->query("SELECT COUNT(id_berita) as total FROM tb_komentar WHERE id_berita='$_GET[id]'"); ?>
  <?php $get_row = $row->fetch_object(); ?>

  <!-- bradcam_area  -->
  <div class="bradcam_area bradcam_bg_4">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="bradcam_text text-center">
            <h3>Detail Berita</h3>
            <p><?= $detail->judul_berita; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ bradcam_area  -->

  <!--================Blog Area =================-->
  <section class="blog_area single-post-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 posts-list">
          <div class="single-post">
            <div class="feature-img">
              <img class="img-fluid" src="../../vendor/berita_image/<?= $detail->image_berita; ?>" alt="">
            </div>
            <div class="blog_details">
              <h2>
                <?= $detail->judul_berita; ?>
              </h2>
              <ul class="blog-info-link mt-3 mb-4">
              <li><a href="#"><i class="fa fa-calendar"></i><?= date('d F Y', strtotime($detail->tanggal)); ?></a></li>
              <li><a href="#"><i class="fa fa-comments"></i> <?= $get_row->total ?> Comments</a></li>
            </ul>
            <p class="excert">
              <?= $detail->kontent_berita; ?>
            </p>
          </div>
        </div>

        <div class="comments-area">
          <?php $komentar = $mysqli->query("SELECT * FROM tb_komentar"); ?>
          <?php while ($koment = $komentar->fetch_object()) { ?>
          <div class="comment-list">
            <div class="single-comment justify-content-between d-flex">
              <div class="user justify-content-between d-flex">
                <div class="thumb">
                  <img src="../../vendor/asset_user/img/comment/user.jpg" alt="">
                </div>
                <div class="desc">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <h5>
                        <a href="#"><?= $koment->nama_user; ?></a>
                      </h5>
                      <p class="date"><?= date("d F Y", strtotime($koment->tanggal)); ?></p>
                    </div>
                  </div>
                  <p class="comment">
                    <?= $koment->komentar; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

        </div>
        <div class="comment-form">
          <h4>Leave a Reply</h4>
          <form action="backend/add_komentar.php" method="post">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" required
                  placeholder="Write Comment"></textarea>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <input class="form-control" name="nama" id="name" type="text" placeholder="Name anda" required>
                </div>
              </div>
            </div>
            <input type="hidden" name="id_berita" value="<?= $_GET['id']; ?>">
            <div class="form-group">
              <button type="submit" class="button button-contactForm btn_1 boxed-btn">Kirim Komentar</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="blog_right_sidebar">
          <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Category</h4>
            <ul class="list cat-list">
              <?php $category = $mysqli->query("SELECT * FROM tb_kategori"); ?>
              <?php while ($value = $category->fetch_object()) { ?>
                <li>
                  <a href="#" class="d-flex">
                    <a href="list_lokasi.php?id_category=<?= $value->id_kategori; ?>" class="d-flex">
                      <p><?= $value->jenis_kategori; ?></p>
                    </a>
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
<!--================ Blog Area end =================-->

<?php include 'assets/footer.php'; ?>

<?php include 'assets/js.php'; ?>
</body>

</html>
