<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="user-profile">
    <div class="user-image">
      <img src="../../vendor/asset_user/img/comment/user.jpg">
    </div>
    <div class="user-name">
      <?= $profil->fname; ?> <?= $profil->lname; ?>
    </div>
    <div class="user-designation">
      <?php if ($profil->status=='0'): ?>
        ADMIN
      <?php else: ?>
        COSTUMER
      <?php endif; ?>
    </div>
  </div>
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="icon-box menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-location menu-icon"></i>
        <span class="menu-title">Master Lokasi</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="add_lokasi.php">Tambah Sekolah</a></li>
          <li class="nav-item"> <a class="nav-link" href="add_rs.php">Tambah RS</a></li>
          <li class="nav-item"> <a class="nav-link" href="see_lokasi.php">Lihat Lokasi</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-kelurahan" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-location menu-icon"></i>
        <span class="menu-title">Master Kelurahan</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-kelurahan">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="add_kelurahan.php">Tambah Kelurahan</a></li>
          <li class="nav-item"> <a class="nav-link" href="see_kelurahan.php">Lihat Kelurahan</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-berita" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-file menu-icon"></i>
        <span class="menu-title">Master Berita</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-berita">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="add_berita.php">Tambah Berita</a></li>
          <li class="nav-item"> <a class="nav-link" href="see_berita.php">Lihat Berita</a></li>
        </ul>
      </div>
    </li>

    <?php if ($profil->status=='0'): ?>
      <!-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-kategori" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-command menu-icon"></i>
          <span class="menu-title">Master Kategori</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-kategori">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="add_kategori.php">Tambah Kategori</a></li>
            <li class="nav-item"> <a class="nav-link" href="see_kategori.php">Lihat Kategori</a></li>
          </ul>
        </div>
      </li> -->

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">User</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="add_user.php">Tambah User</a></li>
            <li class="nav-item"> <a class="nav-link" href="see_user.php">Lihat User</a></li>
          </ul>
        </div>
      </li>
    <?php endif; ?>

    <li class="nav-item">
      <a class="nav-link" href="backend/logout.php">
        <i class="icon-power menu-icon"></i>
        <span class="menu-title">Logout</span>
      </a>
    </li>
  </ul>
</nav>
