 <!-- Start Instagram Feed  -->
 <div class="instagram-box">
     <div class="main-instagram owl-carousel owl-theme">
         <div class="item">
             <div class="ins-inner-box">
                 <img src="./admin/images/instagram-img-01.jpg" alt="" />
                 <div class="hov-in">
                     <a href="#"><i class="fab fa-instagram"></i></a>
                 </div>
             </div>
         </div>
         <div class="item">
             <div class="ins-inner-box">
                 <img src="./admin/images/instagram-img-02.jpg" alt="" />
                 <div class="hov-in">
                     <a href="#"><i class="fab fa-instagram"></i></a>
                 </div>
             </div>
         </div>
         <div class="item">
             <div class="ins-inner-box">
                 <img src="./admin/images/instagram-img-03.jpg" alt="" />
                 <div class="hov-in">
                     <a href="#"><i class="fab fa-instagram"></i></a>
                 </div>
             </div>
         </div>
         <div class="item">
             <div class="ins-inner-box">
                 <img src="./admin/images/instagram-img-04.jpg" alt="" />
                 <div class="hov-in">
                     <a href="#"><i class="fab fa-instagram"></i></a>
                 </div>
             </div>
         </div>
         <div class="item">
             <div class="ins-inner-box">
                 <img src="./admin/images/instagram-img-05.jpg" alt="" />
                 <div class="hov-in">
                     <a href="#"><i class="fab fa-instagram"></i></a>
                 </div>
             </div>
         </div>
         <div class="item">
             <div class="ins-inner-box">
                 <img src="./admin/images/instagram-img-06.jpg" alt="" />
                 <div class="hov-in">
                     <a href="#"><i class="fab fa-instagram"></i></a>
                 </div>
             </div>
         </div>
         <div class="item">
             <div class="ins-inner-box">
                 <img src="./admin/images/instagram-img-07.jpg" alt="" />
                 <div class="hov-in">
                     <a href="#"><i class="fab fa-instagram"></i></a>
                 </div>
             </div>
         </div>
         <div class="item">
             <div class="ins-inner-box">
                 <img src="./admin/images/instagram-img-08.jpg" alt="" />
                 <div class="hov-in">
                     <a href="#"><i class="fab fa-instagram"></i></a>
                 </div>
             </div>
         </div>
         <div class="item">
             <div class="ins-inner-box">
                 <img src="./admin/images/instagram-img-09.jpg" alt="" />
                 <div class="hov-in">
                     <a href="#"><i class="fab fa-instagram"></i></a>
                 </div>
             </div>
         </div>
         <div class="item">
             <div class="ins-inner-box">
                 <img src="./admin/images/instagram-img-05.jpg" alt="" />
                 <div class="hov-in">
                     <a href="#"><i class="fab fa-instagram"></i></a>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End Instagram Feed  -->



 <!-- Start Footer  -->
 <footer>
 <?php
                 $store_info = $store->getstore_info();
                 if ($store_info) {
                     while ($info = $store_info->fetch_assoc()) {
                 ?>
     <div class="footer-main">
         <div class="container">
             <div class="row">
                 
                 <div class="col-lg-4 col-md-12 col-sm-12">
                     <div class="footer-top-box">
                         <h3>Th???i Gian Ho???t ?????ng</h3>
                         <ul class="list-time">
                             <li> Th??? 2 - Th??? 7:<span> <?php echo $info['ThoiGianMoCua']; ?> S??ng ?????n <?php echo $info['ThoiGianMoCua']; ?> T???i </span> </li>
                             <li>Ch??? Nh???t: <span>????ng c???a</span></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-12 col-sm-12">
                     <div class="footer-top-box">
                         <h3>B???n Tin</h3>
                         <form class="newsletter-box">
                             <div class="form-group">
                                 <input class="" type="email" name="Email" placeholder="Email Address*" />
                                 <i class="fa fa-envelope"></i>
                             </div>
                             <button class="btn hvr-hover" type="submit">G???i</button>
                         </form>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-12 col-sm-12">
                     <div class="footer-top-box">
                         <h3>M???ng X?? H???i</h3>
                         <ul>
                             <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                             <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                             <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                             <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                             <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                             <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                             <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                         </ul>
                     </div>
                 </div>
             </div>
             <hr>
             <div class="row">
                 <div class="col-lg-4 col-md-12 col-sm-12">
                     <div class="footer-widget">
                         <h4><?php echo $info['TenCuaHang']; ?></h4>
                         <p style="color: white;font-size: 16px"><?php echo $info['LoiGioiThieu']; ?></p>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-12 col-sm-12">
                     <div class="footer-link">
                         <h4>Th??ng Tin</h4>
                         <ul>
                             <li><a href="#">V??? Ch??ng T??i</a></li>
                             <li><a href="#">D???ch V??? Kh??ch H??ng</a></li>
                             <li><a href="#">??i???u Kho???n &amp; ??i???u Ki???n</a></li>
                             <li><a href="#">Ch??nh S??ch B???o M???t</a></li>
                             <li><a href="#">Th??ng Tin Giao H??ng</a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-12 col-sm-12">
                     <div class="footer-link-contact" >
                         <h4>Li??n h???</h4>
                         <ul>
                             <li>
                                 <p style="color: white"><i class="fas fa-map-marker-alt"></i>?????a Ch???: <?php echo $info['DiaChi']; ?> </p>
                             </li>
                             <li>
                                 <p style="color: white"><i class="fas fa-phone-square"></i>S??? ??i???n Tho???i: <a style="color: white" href="tel:037670179"><?php echo $info['SDT']; ?></a></p>
                             </li>
                             <li>
                                 <p style="color: white"><i class="fas fa-envelope"></i>Email: <a style="color: white" href="mailto:contactinfo@gmail.com"><?php echo $info['Email']; ?></a></p>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <?php
                     }
                    }
     ?>
 </footer>
 <!-- End Footer  -->

 <!-- Start copyright  -->
 <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2023 <a href="#">luonvuituoi Store</a></p>
 </div>
 <!-- End copyright  -->

 <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

 <!-- ALL JS FILES -->
 <!-- <script src="js/jquery-3.2.1.min.js"></script> -->
 <!-- ALL JS FILES -->
 <!-- <script src="js/jquery-3.2.1.min.js"></script> -->
 <script src="https://code.jquery.com/jquery-latest.js"></script>

 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

 <script src="js/popper.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <!-- ALL PLUGINS -->
 <script src="js/jquery.superslides.min.js"></script>
 <script src="js/bootstrap-select.js"></script>
 <script src="js/inewsticker.js"></script>
 <script src="js/bootsnav.js"></script>
 <script src="js/images-loded.min.js"></script>
 <script src="js/isotope.min.js"></script>
 <script src="js/owl.carousel.min.js"></script>
 <script src="js/baguetteBox.min.js"></script>
 <script src="js/form-validator.min.js"></script>
 <script src="js/contact-form-script.js"></script>
 <script src="js/custom.js"></script>
 <script src="js/style.js"></script>
 </body>

 </html>