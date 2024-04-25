<?php include "header.php"; ?>
<!-- portfolio -->
<div class="portfolio">
    <div class="container mb-5 pb-lg-5">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage text_align_left">
                    <h2>Destinasi Wisata Magelang </h2>
                </div>
            </div>
        </div>
        <div class="row">

            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM artikel");
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
        </div>
    </div>
</div>
<!-- end portfolio -->
<?php include "footer.php"; ?>