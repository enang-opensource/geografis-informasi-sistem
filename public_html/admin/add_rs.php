<?php include 'assets/setting.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tambah Data Rumah Sakit</title>
  <?php include 'assets/css.php'; ?>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
  <style type="text/css">
  #map {
    width: 100%;
    height: 400px;
    padding: 0px;
  }
</style>
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
                  <h4 class="card-title">Tambah Data Rumah Sakit</h4>
                  <p class="card-description">
                    Silakan mengisi form berikut untuk memasukan data!
                  </p>

                  <!-- ############################################################################################ -->
                  <div class="col-lg-12 col-md-5">
                    <div class="form-group">
                      <div id="map"></div>
                    </div>
                    <div class="form-group">
                      <b>Cari Alamat</b>
                      <div id="search">
                        <div class="input-group mb-3">
                          <input type="text" name="addr" id="addr" style="height:50px" class="form-control" placeholder="Ketikan alamat yang dicari..." aria-describedby="basic-addon2"/>
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="button" onclick="addr_search();">Cari</button>
                          </div>
                        </div>

                        <!-- get result -->
                        <ul class="list-group" id="results">

                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- ############################################################################################ -->
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
                    <?php $query_lokasi = $mysqli->query("SELECT * FROM tb_lokasi WHERE id_lokasi='$_GET[id]'"); ?>
                    <?php $data = $query_lokasi->fetch_object(); ?>
                    <form class="forms-sample" action="backend/lokasi/edit.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Wewenang (Direktur)</label>
                        <input type="text" class="form-control" name="direktur" placeholder="direktur" value="<?= $data->direktur; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Kategori</label>
                        <select class="form-control" name="id_kategori">
                          <?php $query = $mysqli->query("SELECT * FROM tb_kategori WHERE id_kategori=1"); ?>
                          <?php while ($value = $query->fetch_object()) { ?>
                            <option value="<?= $value->id_kategori; ?>" <?php if($value->id_kategori==$data->id_kategori){ echo "selected"; }?> ><?= $value->jenis_kategori; ?></option>
                          <?php  } ?>
                        </select>
                      </div>
                      <input type="hidden" name="id_user" value="<?= $myprofil ?>">
                      <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lokasi</label>
                        <input type="text" class="form-control" name="n_lokasi" value="<?= $data->nama_lokasi; ?>" placeholder="Nama Lokasi" required>
                      </div>

                      <div class="row">
                        <div class="col">
                          <label for="exampleInputPassword1">Longtitude</label>
                          <input type="text" name="long" class="form-control" id="lat" size=12 value="<?= $data->longtitude; ?>" placeholder="Latitude" value="-7.59280787">
                        </div>
                        <div class="col">
                          <label for="exampleInputPassword1">Latitude</label>
                          <input type="text" name="lat" class="form-control" id="lon" size=12 value="<?= $data->latitude; ?>" placeholder="Longtitude" value="110.21955371">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputUsername1">Kelurahan</label>
                        <select class="form-control" name="id_kelurahan">
                          <?php $query = $mysqli->query("SELECT * FROM tb_kelurahan"); ?>
                          <?php while ($value = $query->fetch_object()) { ?>
                            <option value="<?= $value->id_kelurahan; ?>" <?php if($value->id_kelurahan==$data->id_kelurahan){ echo "selected"; }?> ><?= $value->nama_kelurahan; ?></option>
                          <?php  } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="address" size="12" placeholder="Alamat" value="<?= $data->alamat; ?>">
                      </div>

                      <div class="row">
                        <div class="col">
                          <label for="exampleInputUsername1">Kategori</label>
                          <select class="form-control" name="id_kategori">
                            <?php $query = $mysqli->query("SELECT * FROM tb_kategori WHERE id_kategori=1"); ?>
                            <?php while ($value = $query->fetch_object()) { ?>
                              <option value="<?= $value->id_kategori; ?>"><?= $value->jenis_kategori; ?></option>
                            <?php  } ?>
                          </select>
                        </div>
                        <div class="col">
                          <label for="exampleFormControlSelect2">Akreditas</label>
                          <select name="akreditas" class="form-control">
                            <option value="A" <?php if($data->akreditas=='A'){ echo "selected"; }?> >A</option>
                            <option value="B" <?php if($data->akreditas=='B'){ echo "selected"; }?> >B</option>
                            <option value="C" <?php if($data->akreditas=='C'){ echo "selected"; }?> >C</option>
                          </select>
                        </div>
                        <div class="col">
                          <label for="exampleFormControlSelect2">Jenis Rumah Sakit</label>
                          <select class="form-control" name="jenis_lokasi">
                            <option value="Swasta" <?php if($data->jenis_lokasi=='Swasta'){ echo "selected"; }?>>Swasta</option>
                            <option value="Pemerintah" <?php if($data->jenis_lokasi=='Pemerintah'){ echo "selected"; }?>>Pemerintah</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Telephone</label>
                        <input type="number" name="telp" class="form-control" id="address" size="12" value="<?= $data->telephone; ?>" placeholder="Telephone" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="8" cols="80" required value="<?= $data->keterangan; ?>"><?= $data->keterangan; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Gambar Lama</label>
                        <br>
                        <img src="../../vendor/lokasi_image/<?= $data->image_lokasi; ?>" width="300">
                      </div>
                      <input type="hidden" id="status" value="1">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Upload Gambar Baru</label>
                        <input type="file" class="form-control" name="u_image">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  <?php else: ?>
                    <form class="forms-sample" action="backend/lokasi/add.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lokasi</label>
                        <input type="text" class="form-control" name="n_lokasi" placeholder="Nama Lokasi" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Wewenang (Direktur)</label>
                        <input type="text" class="form-control" name="direktur" placeholder="direktur" required>
                      </div>
                      <input type="hidden" name="id_user" value="<?= $myprofil ?>">

                      <div class="row">
                        <div class="col">
                          <label for="exampleInputPassword1">Longtitude</label>
                          <input type="text" name="long" class="form-control" id="lat" size="12" placeholder="Latitude" value="-7.59280787" required>
                        </div>
                        <div class="col">
                          <label for="exampleInputPassword1">Latitude</label>
                          <input type="text" name="lat" class="form-control" id="lon" size="12" placeholder="Longtitude" value="110.21955371" required>
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="exampleInputUsername1">Kelurahan</label>
                        <select class="form-control" name="id_kelurahan">
                          <?php $query = $mysqli->query("SELECT * FROM tb_kelurahan"); ?>
                          <?php while ($value = $query->fetch_object()) { ?>
                            <option value="<?= $value->id_kelurahan; ?>"><?= $value->nama_kelurahan; ?></option>
                          <?php  } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="address" size="12" placeholder="Alamat" value="Jl. Soekarno Hatta No.59" required>
                      </div>


                      <div class="row">
                        <div class="col">
                          <label for="exampleInputUsername1">Kategori</label>
                          <select class="form-control" name="id_kategori">
                            <?php $query = $mysqli->query("SELECT * FROM tb_kategori WHERE id_kategori=1"); ?>
                            <?php while ($value = $query->fetch_object()) { ?>
                              <option value="<?= $value->id_kategori; ?>"><?= $value->jenis_kategori; ?></option>
                            <?php  } ?>
                          </select>
                        </div>
                        <div class="col">
                          <label for="exampleFormControlSelect2">Akreditas</label>
                          <select name="akreditas" class="form-control">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                          </select>
                        </div>
                        <div class="col">
                          <label for="exampleFormControlSelect2">Jenis Rumah Sakit</label>
                          <select class="form-control" name="jenis_lokasi">
                            <option value="Swasta">Swasta</option>
                            <option value="Pemerintah">Pemerintah</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Telephone</label>
                        <input type="number" name="telp" class="form-control" id="address" size="12" placeholder="Telephone" required>
                      </div>
                      <input type="hidden" id="status" value="null">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="5" cols="80" required></textarea>
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
  <script type="text/javascript">
  window.cb = function cb(json) {
    //do what you want with the json
    console.log(json.address);
    document.getElementById('address').value = json.address.village + ',' + json.address.county;
    myMarker.bindPopup("Latitude: " + json.lat + "<br />Longtitude: " + json.lon + "<br />Alamat : "+ json.address.village).openPopup();
  }

  var section = document.getElementById('status').value;

  if(section=='null'){
    var startlon = 110.96125695506598;
    var startlat = -7.329168165358216;

    document.getElementById('lat').value = startlat;
    document.getElementById('lon').value = startlon;

  } else {
    var startlon = document.getElementById('lon').value;
    var startlat = document.getElementById('lat').value;
  }

  var options = {
    center: [startlat, startlon],
    zoom: 20
  }

  var map = L.map('map', options);
  var nzoom = 15;

  L.tileLayer('https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=04adc8bfec4f4ebcac57b9fedffb5842').addTo(map);

  // L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
  //   maxZoom: 15,
  //   subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
  // }).addTo(map);

  setTimeout(function(){ map.invalidateSize()}, 150);


  var myMarker = L.marker([startlat, startlon], {title: "Coordinates", alt: "Coordinates", draggable: true}).addTo(map).on('dragend', function() {
    var s = document.createElement('script');
    var lat = myMarker.getLatLng().lat.toFixed(8);
    var lon = myMarker.getLatLng().lng.toFixed(8);
    var czoom = map.getZoom();
    if(czoom < 18) { nzoom = czoom + 2; }
    if(nzoom > 18) { nzoom = 18; }
    if(czoom != 18) { map.setView([lat,lon], nzoom); } else { map.setView([lat,lon]); }
    document.getElementById('lat').value = lat;
    document.getElementById('lon').value = lon;
    //get addres
    s.src = "http://nominatim.openstreetmap.org/reverse?json_callback=cb&format=json&lat="+lat+"&lon="+lon+"";
    document.getElementsByTagName('head')[0].appendChild(s);
  });

  function chooseAddr(lat1, lng1, address1)
  {
    myMarker.closePopup();
    map.setView([lat1, lng1],18);
    myMarker.setLatLng([lat1, lng1]);
    lat = lat1.toFixed(8);
    lon = lng1.toFixed(8);
    address = address1;

    document.getElementById('lat').value = lat;
    document.getElementById('lon').value = lon;
    document.getElementById('address').value = address;

    myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon + "<br />" + address).openPopup();
  }

  function myFunction(arr)
  {
    var out = "<br />";
    var i;

    if(arr.length > 0)
    {
      for(i = 0; i < arr.length; i++)
      {
        var lat = arr[i].lat;
        var long = arr[i].lon;
        var address = arr[i].display_name;

        out += '<li class="list-group-item" onclick="chooseAddr('+lat+', '+long+', \''+address+'\')"><a href="#" >' + address + '</a></li>';

      }
      document.getElementById('results').innerHTML = out;
    }
    else
    {
      document.getElementById('results').innerHTML = "<b>Maaf, alamat tidak ditemukan..</b>";
    }

  }

  function addr_search()
  {
    var inp = document.getElementById("addr");
    var xmlhttp = new XMLHttpRequest();
    var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
    xmlhttp.onreadystatechange = function()
    {
      if (this.readyState == 4 && this.status == 200)
      {
        var myArr = JSON.parse(this.responseText);
        myFunction(myArr);
      }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
  }

</script>
</body>

</html>
