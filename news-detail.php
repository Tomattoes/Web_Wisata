<?php include "header.php"; ?>
<?php
include('koneksi.php');
$data = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel = '$_GET[id]' ");
$row = mysqli_fetch_array($data); {
?>

    <section class="hero" id="hero">
        <div class="heroText">
            <h1 class="news-detail-title text-white mt-lg-5 mb-lg-4" data-aos="zoom-in" data-aos-delay="300">
                <?php echo $row['j_artikel'] ?>
            </h1>

            <div class="d-flex justify-content-center align-items-center">
                <a href="#" class="text-secondary-white-color social-share-link">
                    <i class="bi-chat-square-fill me-1"></i>
                    128
                </a>

                <a href="#" class="social-share-link bi-bookmark-fill ms-3 me-4"></a>

                <span><?php echo date('d F Y', $row['date_created']) ?></span>
            </div>
        </div>

        <div class="videoWrapper">
            <img src="assets/<?php echo $row['foto'] ?>" class="img-fluid news-detail-image" alt="">
        </div>

        <div class="overlay"></div>
    </section>

    <section class="news-detail section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-10 mx-auto">
                    <h2 class="mb-3" data-aos="fade-up"><?php echo $row['j_artikel'] ?></h2>

                    <p class="me-4" data-aos="fade-up"><?php echo $row['artikel1'] ?></p>

                    <p data-aos="fade-up"><?php echo $row['artikel2'] ?>
                    <div class="clearfix my-4 mt-lg-0 mt-5">
                        <div class="col-md-6 float-md-end mb-3 ms-md-3" data-aos="fade-up">
                            <figure class="figure">
                                <img src="assets/<?php echo $row['foto'] ?>" class="img-fluid news-image" alt="">

                                <figcaption class="figure-caption text-end">A caption for the above image.</figcaption>
                            </figure>
                        </div>

                        <p data-aos="fade-up">
                            <?php echo $row['artikel3'] ?>
                        </p>

                        <p data-aos="fade-up">
                            <?php echo $row['artikel4'] ?>
                        </p>
                    </div>

                    <div class="social-share d-flex mt-5">
                        <span class="me-4" data-aos="zoom-in">Share this article:</span>

                        <a href="#" class="social-share-icon bi-facebook" data-aos="zoom-in"></a>

                        <a href="#" class="social-share-icon bi-twitter mx-3" data-aos="zoom-in"></a>

                        <a href="#" class="social-share-icon bi-envelope" data-aos="zoom-in"></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php } ?>

<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY RAND() LIMIT 1;");
while ($art = mysqli_fetch_array($data)) {
?>
    <section class="related-news section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-10 mx-auto text-center">
                    <span class="d-block" data-aos="zoom-in">Next article</span>

                    <h3 class="news-title" data-aos="fade-up">
                        <a href="news-detail.php?id=<?php echo $art['id_artikel']; ?>" class="news-title-link"><?php echo $art['j_artikel'] ?></a>
                    </h3>
                </div>

            </div>
        </div>
    </section>
<?php } ?>
<?php include "footer.php"; ?>