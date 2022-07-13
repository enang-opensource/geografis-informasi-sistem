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
  <?php include 'assets/css.php'; ?>
</head>
<?php

if (isset($_GET['fillter'])) {
  $maps_data = $mysqli->query("SELECT * FROM tb_lokasi WHERE id_kategori='$_GET[id]' AND akreditas='$_GET[ak]' AND id_kelurahan='$_GET[kel]' AND jenis_lokasi='$_GET[jenis]'");
} else {
  $maps_data = $mysqli->query("SELECT * FROM tb_lokasi");
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
            <h3>Cari Daftar <?php if($_GET['id']==1){ echo "Rumah Sakit"; } elseif($_GET['id']==2) { echo "Sekolah"; } else { echo "Lokasi"; } ?></h3>
            <div class="filter_bordered">

              <form action="list_lokasi.php" method="get">
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
                    <div class="col-lg-12">
                      <label for="exampleFormControlSelect1">Kategori</label>
                      <div class="single_select">
                        <select class="form-control" name="id">
                          <option value="1" <?php if($_GET['id']=='1'){ echo "selected"; } ?>>Rumah Sakit</option>
                          <option value="2" <?php if($_GET['id']=='2'){ echo "selected"; } ?>>Sekolah</option>
                        </select>
                      </div>
                    </div>
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
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Status</th>
                        <th scope="col">Direktur</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Akreditas</th>
                        <th scope="col">Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($data = $maps_data->fetch_object()){?>
                        <tr>
                          <td><?= $data->nama_lokasi; ?></td>
                          <td><?= $data->jenis_lokasi; ?></td>
                          <td><?= $data->direktur; ?></td>
                          <td><?= $data->alamat; ?></td>
                          <td><?= $data->telephone; ?></td>
                          <td><?= $data->akreditas; ?></td>
                          <td><?= $data->keterangan; ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'assets/footer.php'; ?>
  <?php include 'assets/js.php'; ?>

</body>

</html>
