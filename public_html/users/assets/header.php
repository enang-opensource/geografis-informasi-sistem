<header>
  <div class="header-area ">
    <div id="sticky-header" class="main-header-area">
      <div class="container-fluid">
        <div class="header_bottom_border">
          <div class="row align-items-center">
            <div class="col-xl-2 col-lg-2">
              <div class="logo">
                <a href="index.html">
                  <img src="img/logo.png" alt="">
                </a>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="main-menu  d-none d-lg-block">
                <nav>
                  <ul id="navigation">
                    <li><a class="active" href="index.php">home</a></li>
                    <li><a href="see_lokasi.php?id=1">Rumah Sakit</a></li>
                    <li><a href="see_lokasi.php?id=2">Sekolah</a></li>
                    <li><a href="list_lokasi.php">Lihat Data</a></li>
                    <li><a href="list_berita.php">Berita</a></li>
                    <?php if (isset($_SESSION['admin'])): ?>
                      <li><a href="../admin/.php">Menu Admin</a></li>
                      <li><a href="../admin/backend/logout.php">Logout</a></li>
                    <?php else: ?>
                      <li><a type="button" data-toggle="modal" data-target="#exampleModal">Login</a></li>
                    <?php endif; ?>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
              <div class="social_wrap d-flex align-items-center justify-content-end">
                <div class="social_links d-none d-xl-block">
                  <ul>
                    <li>Sistem Geografis Informasi (GIS) Jawa Timur</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</header>
