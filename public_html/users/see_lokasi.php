<?php include 'assets/setting.php'; ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Lokasi</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link rel="manifest" href="site.webmanifest"> -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
  <!-- Place favicon.ico in the root directory -->
  <style type="text/css">
  #map {
    width: 100%;
    height: 800px;
    padding: 0px;
  }
</style>
<?php include 'assets/css.php'; ?>
</head>
<?php

if (isset($_GET['fillter'])) {
  $maps_data = $mysqli->query("SELECT * FROM tb_lokasi WHERE id_kategori='$_GET[id]' AND akreditas='$_GET[ak]' AND id_kelurahan='$_GET[kel]' AND jenis_lokasi='$_GET[jenis]'");
} else {
  $maps_data = $mysqli->query("SELECT * FROM tb_lokasi WHERE id_kategori='$_GET[id]'");
}

?>
<body>
  <!--[if lte IE 9]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
  <?php include 'assets/header.php'; ?>

  <!-- bradcam_area  -->
  <div class="bradcam_area bradcam_bg_2">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="bradcam_text text-center">
            <h3>Destinasi Lokasi</h3>
            <p>Cari Lokasi yang anda inginkan!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ bradcam_area  -->

  <div class="popular_places_area">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="filter_result_wrap">
            <h3>Cari Lokasi <?php if($_GET['id']==1){ echo "Rumah Sakit"; } else { echo "Sekolah"; } ?></h3>
            <div class="filter_bordered">

              <form action="see_lokasi.php" method="get">
                <div class="filter_inner">
                  <div class="row">

                    <div class="col-lg-12">
                      <div class="single_select">
                        <label for="exampleFormControlSelect1">Kelurahan</label>
                        <select class="form-control" name="kel">
                          <?php $kelurahan = $mysqli->query("SELECT * FROM tb_kelurahan"); ?>
                          <?php while($kel = $kelurahan->fetch_object()){ ?>
                            <option value="<?= $kel->id_kelurahan; ?>" <?php if($_GET['kel']==$kel->id_kelurahan){  echo "selected"; }?>><?= $kel->nama_kelurahan; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label for="exampleFormControlSelect1">Kategori <?php if($_GET['id']==1){ echo "Rumah Sakit"; } else { echo "Sekolah"; } ?></label>
                      <div class="single_select">
                        <?php if ($_GET['id']==2): ?>
                          <select class="form-control" name="jenis">
                            <option value="SD" <?php if($_GET['jenis']=='SD'){ echo "selected"; } ?>>SD</option>
                            <option value="SMP" <?php if($_GET['jenis']=='SMP'){ echo "selected"; } ?>>SMP</option>
                            <option value="SMA" <?php if($_GET['jenis']=='SMA'){ echo "selected"; } ?>>SMA</option>
                            <option value="TK" <?php if($_GET['jenis']=='TK'){ echo "selected"; } ?>>TK</option>
                          </select>
                        <?php else: ?>
                          <select class="form-control" name="jenis">
                            <option value="Pemerintah" <?php if($_GET['jenis']=='Pemerintah'){ echo "selected"; } ?>>Pemerintah</option>
                            <option value="Swasta" <?php if($_GET['jenis']=='Swasta'){ echo "selected"; } ?>>Swasta</option>
                          </select>
                        <?php endif; ?>
                      </div>
                    </div>
                    <input type="hidden" name="fillter" value="1">
                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                    <div class="col-lg-12">
                      <label for="exampleFormControlSelect1">Akreditas</label>
                      <div class="single_select">
                        <select class="form-control" name="ak">
                          <option value="A" <?php if($_GET['ak']=='A'){ echo "selected"; } ?>>A</option>
                          <option value="B" <?php if($_GET['ak']=='B'){ echo "selected"; } ?>>B</option>
                          <option value="C" <?php if($_GET['ak']=='C'){ echo "selected"; } ?>>C</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <button type="submit" class="btn btn-info">Cari Lokasi</button>
                    </div>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="row">

            <div class="col-lg-12 col-md-12">
              <div class="single_place">
                <div class="thumb">
                  <div id="map"></div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'assets/footer.php'; ?>

  <script type="text/javascript">
  var mymap = L.map('map', { zoomControl: false }).setView([-7.329168165358216, 110.96125695506598], 11);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data © OpenStreetMap contributors.',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
  }).addTo(mymap);

  <?php
  while($maps_tmp = $maps_data->fetch_object()) { ?>
    L.marker([<?= $maps_tmp->longtitude; ?>, <?= $maps_tmp->latitude; ?>]).bindPopup('<?= $maps_tmp->nama_lokasi; ?> <br><a href="detail_lokasi.php?id=<?= $maps_tmp->id_lokasi; ?>">Lihat Lokasi</a>').addTo(mymap);
    <?php } ?>

    </script>
    <?php include 'assets/js.php'; ?>

  </body>

  </html>
