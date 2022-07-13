<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="backend/auth.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="pass" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- footer start -->
<footer class="footer">
  <div class="footer_top">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-md-6 col-lg-4 ">
          <div class="footer_widget">
            <div class="footer_logo">
              <h3 class="footer_title">
                Lokasi
              </h3>
            </div>
            <p>Jl. Magelang KM. 12<br>
              Yogyakarta, DIY, Indonesia<br>
              <a href="#">Tel : +62-857-9141-9625 </a> <br>
              <a href="#">Email : mdhiftaa@gmail.com</a>
            </p>
            <div class="socail_links">
              <ul>
                <li>
                  <a href="#">
                    <i class="ti-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="ti-twitter-alt"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-instagram"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-pinterest"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-youtube-play"></i>
                  </a>
                </li>
              </ul>
            </div>

          </div>
        </div>
        <div class="col-xl-3 col-md-6 col-lg-3">
          <div class="footer_widget">
            <h3 class="footer_title">
              Jawa Timur Maps
            </h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253248.6853148337!2d110.81309359181756!3d-7.3526928820540025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a0450aeea6f0f%3A0x3027a76e352bae0!2sSragen%20Regency%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1636550781858!5m2!1sen!2sid" width="800" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="copy-right_text">
    <div class="container">
      <div class="footer_border"></div>
      <div class="row">
        <div class="col-xl-12">
          <p class="copy_right text-center">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed with <i class="fa fa-heart-o" aria-hidden="true"></i> by M Dhifta</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--/ footer end  -->
