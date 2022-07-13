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
    height: 630px;
    padding: 0px;
  }
</style>
<?php include 'assets/css.php'; ?>
</head>
<?php

$maps_data = $mysqli->query("SELECT * FROM tb_lokasi WHERE id_lokasi='$_GET[id]'");
$lokasi = $maps_data->fetch_object();

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
            <h3>Detail Lokasi</h3>
            <p><?= $lokasi->nama_lokasi; ?></p>
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
            <h3>Detail Lokasi <?php if($lokasi->id_kategori==1){ echo "Rumah Sakit"; } else { echo "Sekolah"; } ?></h3>
            <div class="filter_bordered">

              <form action="see_lokasi.php" method="get">
                <div class="filter_inner">
                  <div class="row">

                    <div class="col-lg-12">
                      <label for="exampleFormControlSelect1">Nama <?php if($lokasi->id_kategori==1){ echo "Rumah Sakit"; } else { echo "Sekolah"; } ?></label>
                      <div class="single_select">
                        <h6><?= $lokasi->nama_lokasi; ?></h6>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label for="exampleFormControlSelect1">Alamat</label>
                      <div class="single_select">
                        <h6><?= $lokasi->alamat; ?></h6>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label for="exampleFormControlSelect1">Direktur (Yang Ber-Wewenang)</label>
                      <div class="single_select">
                        <h6><?= $lokasi->direktur; ?></h6>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label for="exampleFormControlSelect1">No. Telp</label>
                      <div class="single_select">
                        <h6><?= $lokasi->telephone; ?></h6>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label for="exampleFormControlSelect1">Status</label>
                      <div class="single_select">
                        <h6><?= $lokasi->jenis_lokasi; ?></h6>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label for="exampleFormControlSelect1">Akreditas</label>
                      <div class="single_select">
                        <h6><?= $lokasi->akreditas; ?></h6>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label for="exampleFormControlSelect1">Akreditas</label>
                      <div class="single_select">
                        <h6><?= $lokasi->keterangan; ?></h6>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label for="exampleFormControlSelect1">Gambar</label>
                      <div class="single_select">
                        <!-- Button trigger modal -->
                        <a data-toggle="modal" data-target="#exampleModal">
                          <img src="../../vendor/lokasi_image/<?= $lokasi->image_lokasi; ?>" width="200">
                        </a>

                      </div>
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

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?= $lokasi->nama_lokasi; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <img class="col-12" src="../../vendor/lokasi_image/<?= $lokasi->image_lokasi; ?>">
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

  L.marker([<?= $lokasi->longtitude; ?>, <?= $lokasi->latitude; ?>]).bindPopup('<?= $lokasi->nama_lokasi; ?> <br><img src="../../vendor/lokasi_image/<?= $lokasi->image_lokasi; ?>" width="100"><br><a class="btn" href="https://www.google.com/maps/search/?api=1&query=<?= $lokasi->longtitude; ?>,<?= $lokasi->latitude; ?>" target="_blank">Pergi Kelokasi</a>').addTo(mymap);

  </script>
  <?php include 'assets/js.php'; ?>

</body>

</html>
