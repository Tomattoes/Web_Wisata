 <?php include "header.php"; ?>
 <!-- start slider section -->
 <div id="top_section" class=" banner_main">
     <div class="container">
         <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tampilan");
            while ($a = mysqli_fetch_array($data)) {
            ?>
             <div class="row">
                 <div class="col-md-12">
                     <div id="myCarousel" class="carousel slide" data-ride="carousel">
                         <div class="carousel-inner">
                             <div class="carousel-item active">
                                 <div class="container-fluid">
                                     <div class="carousel-caption relative">
                                         <div class="bluid mx-2">
                                             <h1><?php echo $a['j_banner1'] ?> <br><?php echo $a['j_banner2'] ?> </h1>
                                             <p><?php echo $a['d_banner1'] ?>
                                                 <br><?php echo $a['d_banner2'] ?>
                                             </p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         <?php } ?>
     </div>
 </div>
 <!-- end slider section -->

 <section class="section-padding pb-0" id="about">
     <div class="container mb-5 pb-lg-5">
         <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tampilan");
            while ($a = mysqli_fetch_array($data)) {
            ?>
             <div class="row">
                 <div class="col-12">
                     <h2 class="mb-3" data-aos="fade-up"><?php echo $a['j_about'] ?></h2>
                 </div>

                 <div class="col-lg-6 col-12 mt-3 mb-lg-5">
                     <p class="me-4" data-aos="fade-up" data-aos-delay="300"><?php echo $a['d_about1'] ?>
                         <br><br>
                         <?php echo $a['d_about2'] ?><br><br>
                     </p>
                 </div>

                 <div class="col-lg-6 col-12 mt-lg-3 mb-lg-5">
                     <p data-aos="fade-up" data-aos-delay="500"><?php echo $a['d_about3'] ?><br><br>

                         <?php echo $a['d_about4'] ?></p>
                 </div>

             </div>
         <?php } ?>
     </div>
 </section>

 <section class="news section-padding" id="news">
     <div class="container mb-5 pb-lg-5">
         <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tampilan");
            while ($a = mysqli_fetch_array($data)) {
            ?>
             <div class="row">

                 <div class="col-12">
                     <h2 class="mb-5 text-center" data-aos="fade-up"><?php echo $a['j_news'] ?></h2>
                 </div>
             <?php } ?>

             <?php
                include 'koneksi.php';
                $data = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY date_created ASC LIMIT 1;");
                while ($art = mysqli_fetch_array($data)) {
                ?>
                 <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                     <div class="news-thumb" data-aos="fade-up">
                         <a href="news-detail.php?id=<?php echo $art['id_artikel']; ?>" class="news-image-hover news-image-hover-warning">
                             <img src="assets/<?php echo $art['foto'] ?>" class="img-fluid large-news-image news-image" alt="">
                         </a>

                         <div class="news-category bg-warning text-white">News</div>

                         <div class="news-text-info">
                             <h5 class="news-title">
                                 <a href="news-detail.php?id=<?php echo $art['id_artikel']; ?>" class="news-title-link"><?php echo $art['j_artikel'] ?></a>
                             </h5>

                             <span class="text-muted"><?php echo date('d F Y', $art['date_created']) ?></span>
                         </div>
                     </div>
                 </div>
             <?php } ?>

             <?php
                include 'koneksi.php';
                $data = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY date_created DESC LIMIT 1;");
                while ($art = mysqli_fetch_array($data)) {
                ?>
                 <div class="col-lg-6 col-12">
                     <div class="news-thumb news-two-column d-flex flex-column flex-lg-row" data-aos="fade-up">
                         <div class="news-top w-100">

                             <a href="news-detail.php?id=<?php echo $art['id_artikel']; ?>" class="news-image-hover news-image-hover-primary">
                                 <img src="assets/<?php echo $art['foto'] ?>" class="img-fluid news-image" alt="">
                             </a>

                             <div class="news-category bg-primary text-white">Popular</div>
                         </div>

                         <div class="news-bottom w-100">
                             <div class="news-text-info">
                                 <h5 class="news-title">
                                     <a href="news-detail.php?id=<?php echo $art['id_artikel']; ?>" class="news-title-link"><?php echo $art['j_artikel'] ?></a>
                                 </h5>

                                 <!-- <div class="d-flex flex-wrap">
                                     <span class="text-muted me-2">
                                         <i class="bi-geo-alt-fill me-1 mb-2 mb-lg-0"></i>
                                         Alaska,
                                     </span> -->

                                 <span class="text-muted"><?php echo date('d F Y', $art['date_created']) ?></span>
                             </div>
                         </div>
                     </div>
                 <?php } ?>


                 <?php
                    include 'koneksi.php';
                    $data = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY j_artikel ASC LIMIT 1;");
                    while ($art = mysqli_fetch_array($data)) {
                    ?>
                     <div class="news-thumb news-two-column d-flex flex-column flex-lg-row" data-aos="fade-up">
                         <div class="news-top w-100" data-aos="fade-up">

                             <a href="news-detail.php?id=<?php echo $art['id_artikel']; ?>" class="news-image-hover news-image-hover-success">
                                 <img src="assets/<?php echo $art['foto'] ?>" class="img-fluid news-image" alt="">
                             </a>

                             <div class="news-category bg-success text-white">News</div>
                         </div>

                         <div class="news-bottom w-100">
                             <div class="news-text-info">
                                 <h5 class="news-title">
                                     <a href="news-detail.php?id=<?php echo $art['id_artikel']; ?>" class="news-title-link"><?php echo $art['j_artikel'] ?></a>
                                 </h5>

                                 <span class="text-muted"><?php echo date('d F Y', $art['date_created']) ?></span>
                             </div>
                         </div>
                     </div>
                 <?php } ?>
                 </div>
             </div>
     </div>
 </section>

 <section class="section-padding pb-0" id="portfolio">
     <!-- portfolio -->
     <div class="portfolio">
         <div class="container mb-5 pb-lg-5">
             <?php
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM tampilan");
                while ($a = mysqli_fetch_array($data)) {
                ?>
                 <div class="row">
                     <div class="col-md-12">
                         <div class="titlepage text_align_left">
                             <h2><?php echo $a['j_artikel'] ?></h2>
                         </div>
                     </div>
                 </div>
             <?php } ?>

             <div class="row">

                 <?php
                    include 'koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY date_created DESC LIMIT 4");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                     <div class="col-md-6">
                         <div id="ho_nf" class="portfolio_main text_align_left">
                             <figure>
                                 <img src="assets/<?php echo $d['foto'] ?>" alt="foto">
                                 <div class="portfolio_text">
                                     <div class="li_icon">
                                         <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                         <a href="news-detail.php?id=<?php echo $d['id_artikel']; ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
                                     </div>
                                     <h3><?php echo $d['j_artikel'] ?></h3>
                                     <p><?php echo $d['artikel1'] ?></p>
                                 </div>
                             </figure>
                         </div>
                     </div>
                 <?php } ?>
                 <form method="post" action="galery.php">
                     <div class="col-lg-5 col-12 mx-auto mt-5">
                         <button type="submit" class="form-control">See More</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
     <!-- end portfolio -->
 </section>

 <section class=" contact section-padding" id="contact">
     <div class="container">
         <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tampilan");
            while ($a = mysqli_fetch_array($data)) {
            ?>
             <div class="row">

                 <div class="col-lg-7 col-12 mx-auto">

                     <h2 class="mb-4 text-center" data-aos="fade-up"><?php echo $a['j_contact'] ?></h2>
                 <?php } ?>

                 <form action="#" method="post" class="contact-form" role="form" data-aos="fade-up">

                     <div class="row">

                         <div class="col-lg-6 col-6">
                             <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>

                             <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required>
                         </div>

                         <div class="col-lg-6 col-6">
                             <label for="email" class="form-label">Email <sup class="text-danger">*</sup></label>

                             <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                         </div>

                         <div class="col-12 my-4">
                             <label for="message" class="form-label">How can we help?</label>

                             <textarea name="message" rows="6" class="form-control" id="message" placeholder="Tell us about the project" required></textarea>

                         </div>

                         <div class="col-12">
                             <label for="services" class="form-label">Services<sup class="text-danger">*</sup></label>
                         </div>

                         <div class="col-lg-4 col-12">
                             <div class="form-check">
                                 <input type="checkbox" id="checkbox1" name="checkbox1" class="form-check-input">

                                 <label class="form-check-label" for="checkbox1">Branding</label>
                             </div>
                         </div>

                         <div class="col-lg-4 col-12 my-2 my-lg-0">
                             <div class="form-check">
                                 <input type="checkbox" id="checkbox2" name="checkbox2" class="form-check-input">

                                 <label class="form-check-label" for="checkbox2">Digital
                                     Experiences</label>
                             </div>
                         </div>

                         <div class="col-lg-4 col-12">
                             <div class="form-check">
                                 <input type="checkbox" id="checkbox3" name="checkbox3" class="form-check-input">

                                 <label class="form-check-label" for="checkbox3">Web Development</label>
                             </div>
                         </div>
                     </div>

                     <div class="col-lg-5 col-12 mx-auto mt-5">
                         <button type="submit" class="form-control">Send Message</button>
                     </div>
                 </form>
                 </div>

             </div>
     </div>
 </section>

 <!-- <section class="google-map">
            <iframe
                src=""
                class="map-iframe" width="100%" height="400" style="border:0;" allowfullscreen=""
                loading="lazy"></iframe>
        </section> -->
 <?php include "footer.php"; ?>