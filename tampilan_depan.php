<?php include "admin_header.php"; ?>
<?php include "koneksi.php"; ?>

<!-- Content Wrapper. Contains page content -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tampilan Depan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tampilan Depan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Tampilan Depan HilingTime</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul Banner</th>
                                    <th>Deskripsi Banner</th>
                                    <th>About</th>
                                    <th>News</th>
                                    <th>Galery</th>
                                    <th>Banner</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <?php
                                include 'koneksi.php';
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT * FROM tampilan");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr class="text-center">
                                        <td scope="row"><?php echo $no++ ?></td>
                                        <td><?php echo $d['j_banner1'] ?> <?php echo $d['j_banner2'] ?></td>
                                        <td><?php echo $d['d_banner1'] ?> <?php echo $d['d_banner2'] ?></td>
                                        <td><?php echo $d['j_about'] ?></td>
                                        <td><?php echo $d['j_news'] ?></td>
                                        <td><?php echo $d['j_artikel'] ?></td>
                                        <td><img src="image/<?php echo $d['foto'] ?>" alt="foto" width="100px"></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edit<?php echo $d['id_tampilan']; ?>" title="edit data" class="btn btn-info btn-xs">Edit</a>
                                    </tr>
                                    <div class="modal" id="edit<?php echo $d['id_tampilan']; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" method="post">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <input type="hidden" name="id_tampilan" class="form-control" id="exampleInputPassword1" value="<?php echo $d['id_tampilan'] ?>">
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Banner Utama</label>
                                                                <div class="col-sm-10">
                                                                    <input type="file" class="form-control" id="exampleInputPassword1" name="foto" value="<?php echo $d['foto'] ?>">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <input type="hidden" name="fotolama" class="form-control" id="exampleInputPassword1" value="<?php echo $d['foto'] ?>">
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Judul Banner Utama 1</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="type here" value="<?php echo $d['j_banner1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Judul Banner Utama 2</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="judul2" placeholder="type here" value="<?php echo $d['j_banner2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Deskripsi Banner Utama 1</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="deskripsi" placeholder="type here" value="<?php echo $d['d_banner1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Deskripsi Banner Utama 2</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="deskripsi2" placeholder="type here" value="<?php echo $d['d_banner2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Judul About</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="judul_about" placeholder="type here" value="<?php echo $d['j_about'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Deskripsi About 1</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="des1" placeholder="type here" value="<?php echo $d['d_about1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Deskripsi About 2</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="des2" placeholder="type here" value="<?php echo $d['d_about2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Deskripsi About 3</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="des3" placeholder="type here" value="<?php echo $d['d_about3'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Deskripsi About 4</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="des4" placeholder="type here" value="<?php echo $d['d_about4'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Judul News</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="judul_news" placeholder="type here" value="<?php echo $d['j_news'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Judul Artikel</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="judul_artikel" placeholder="type here" value="<?php echo $d['j_artikel'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Judul contact</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="judul_contact" placeholder="type here" value="<?php echo $d['j_contact'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                        <div class="modal-footer right-content-between">
                                                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" name="edit" class="btn btn-info">Simpan</button>
                                                        </div>
                                                    </form>
                                                    <!-- /.card-footer -->
                                                    <?php
                                                    if (isset($_POST['edit'])) {
                                                        include('koneksi.php');
                                                        $j_banner = $_POST['judul'];
                                                        $j_banner2 = $_POST['judul2'];
                                                        $d_banner1 = $_POST['deskripsi'];
                                                        $d_banner2 = $_POST['deskripsi2'];
                                                        $j_about = $_POST['judul_about'];
                                                        $d_about1 = $_POST['des1'];
                                                        $d_about2 = $_POST['des2'];
                                                        $d_about3 = $_POST['des3'];
                                                        $d_about4 = $_POST['des4'];
                                                        $j_news = $_POST['judul_news'];
                                                        $j_artikel = $_POST['judul_artikel'];
                                                        $j_contact = $_POST['judul_contact'];
                                                        $fotolama = $_POST['fotolama'];

                                                        $foto = $_FILES['foto']['name'];
                                                        $file_tmp = $_FILES['foto']['tmp_name'];

                                                        if ($foto) {
                                                            unlink('assets/' . $fotolama);

                                                            move_uploaded_file($file_tmp, 'assets/' . $foto);

                                                            $update = mysqli_query($koneksi, "update tampilan set
                                                    foto = '" . $foto . "',
                        j_banner1 = '" . $j_banner . "',
                        j_banner2 = '" . $j_banner2 . "',
                        d_banner1 = '" . $d_banner1 . "',
                        d_banner2 = '" . $d_banner2 . "',
                        j_about = '" . $j_about . "',
                        d_about1 = '" . $d_about1 . "',
                        d_about2 = '" . $d_about2 . "',
                        d_about3 = '" . $d_about3 . "',
                        d_about4 = '" . $d_about4 . "',
                        j_news = '" . $j_news . "',
                        j_artikel = '" . $j_artikel . "',
                        j_contact = '" . $j_contact . "'
                        WHERE id_tampilan = '" . $_POST['id_tampilan'] . "'
                    ");
                                                            if ($update) {
                                                                echo "<script>alert('Edit data berhasil');location='tampilan_depan.php';</script>";
                                                            } else {
                                                                echo "Gagal edit";
                                                            }
                                                        } elseif ($fotolama) {
                                                            $update = mysqli_query($koneksi, "update tampilan set
                                foto = '" . $fotolama . "',
                                j_banner1 = '" . $j_banner . "',
                                j_banner2 = '" . $j_banner2 . "',
                                d_banner1 = '" . $d_banner1 . "',
                                d_banner2 = '" . $d_banner2 . "',
                                j_about = '" . $j_about . "',
                                d_about1 = '" . $d_about1 . "',
                                d_about2 = '" . $d_about2 . "',
                                d_about3 = '" . $d_about3 . "',
                                d_about4 = '" . $d_about4 . "',
                                j_news = '" . $j_news . "',
                                j_artikel = '" . $j_artikel . "',
                                j_contact = '" . $j_contact . "'
                        WHERE id_tampilan = '" . $_POST['id_tampilan'] . "'
                    ");
                                                            if ($update) {
                                                                echo "<script>alert('Edit data berhasil');location='tampilan_depan.php';</script>";
                                                            } else {
                                                                echo "Gagal edit";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.card -->
<?php include "footer_admin.php"; ?>