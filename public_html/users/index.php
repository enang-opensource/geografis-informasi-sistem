<?php include 'assets/setting.php'; ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Home</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link rel="manifest" href="site.webmanifest"> -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
  <!-- Place favicon.ico in the root directory -->

  <!-- CSS here -->
  <?php include 'assets/css.php'; ?>
  <!-- <link rel="stylesheet" href="css/responsive.css"> -->

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
  <style>
  #map {
    width: 100%;
    height: 400px;
  }
  </style>
</head>

<body>
  <!--[if lte IE 9]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- header-start -->
  <?php include 'assets/header.php'; ?>
  <!-- header-end -->

  <?php include 'assets/slidebar.php'; ?>

  <!-- popular_destination_area_start  -->
  <div class="popular_destination_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section_title text-center mb_70">
            <h3>Pilih Lokasi</h3>
            <p>Cari Lokasi yang anda inginkan dan lihat penjelasan alamat tentang lokasi pada titik-titik itu.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="single_destination">
            <div class="thumb">
              <img src="../../vendor/asset_user/img/details-img/3.png" style="height:350px;">
            </div>
            <div class="content">
              <p class="d-flex align-items-center">Lokasi <a href="list_lokasi.php?id=2"> Pendidikan</a> </p>

            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="single_destination">
            <div class="thumb">
              <img src="../../vendor/asset_user/img/details-img/2.png" style="height:350px;">
            </div>
            <div class="content">
              <p class="d-flex align-items-center">Fasilitas <a href="list_lokasi.php?id=1">  Rumah Sakit</a> </p>

            </div>
          </div>
        </div>

        <div id="map"></div>

      </div>
    </div>
  </div>
  <!-- popular_destination_area_end  -->

  <div class="popular_places_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section_title text-center mb_70">
            <h3>Berita Terkini</h3>
            <p>Dapatkan informasi berita terbaru dari kami terkait tempat-tempat populer.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <?php $query = $mysqli->query("SELECT * FROM tb_berita"); ?>
        <?php while ($value = $query->fetch_object()) { ?>
          <div class="col-lg-4 col-md-6">
            <div class="single_place">
              <div class="thumb">
                <img src="../../vendor/berita_image/<?= $value->image_berita; ?>" alt="">
              </div>
              <div class="place_info">
                <a href="destination_details.html"><h3><?= $value->judul_berita; ?></h3></a>
                <p><?= substr($value->kontent_berita, 0, 100); ?>... <a href="detail_berita.php?id=<?= $value->id_berita; ?>">Baca selengkapnya</a></p>
              </div>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>
  </div>

  <?php include 'assets/footer.php'; ?>

  <?php if (isset($_GET['alert'])) {
    echo "<script>alert('Gagal Login!');</script>";
  } ?>
  <!-- link that opens popup -->
  <?php include 'assets/js.php'; ?>

  <script type="text/javascript">
  var mymap = L.map('map', { zoomControl: false }).setView([-7.329168165358216, 110.96125695506598], 13);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data © OpenStreetMap contributors.',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
  }).addTo(mymap);

  <?php
  $maps_data = $mysqli->query("SELECT * FROM tb_lokasi");
  while($maps_tmp = $maps_data->fetch_object()) { ?>
    L.marker([<?= $maps_tmp->longtitude; ?>, <?= $maps_tmp->latitude; ?>]).bindPopup('<?= $maps_tmp->nama_lokasi; ?> <br><a href="detail_lokasi.php?id=<?= $maps_tmp->id_lokasi; ?>">Lihat Lokasi</a>').addTo(mymap);
    <?php } ?>

    </script>
  </body>

  </html>
