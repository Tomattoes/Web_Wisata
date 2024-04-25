<?php include "admin_header.php"; ?>
<?php include "koneksi.php"; ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Artikel</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Artikel</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable Artikel</h3>
                        <a data-toggle="modal" data-target="#tambah" title="simpan data" class="btn btn-primary btn-sm float-right">Tambah</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul Artikel</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'koneksi.php';
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT * FROM artikel");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr class="text-center">
                                        <td scope="row"><?php echo $no++ ?></td>
                                        <td><?php echo substr($d['j_artikel'], 0, 20); ?>.....</td>
                                        <td><?php echo substr($d['artikel1'], 0, 150); ?>.....</td>
                                        <td><?php echo date('d F Y', $d['date_created']) ?></td>
                                        <td><img src="assets/<?php echo $d['foto'] ?>" alt="foto" width="100px"></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edit<?php echo $d['id_artikel']; ?>" title="edit data" class="btn btn-info btn-xs">Edit</a>
                                            <a href="hapus.php?id=<?php echo $d['id_artikel']; ?>" onclick="return confirm ('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-xs">Hapus</a>
                                        </td>
                                    </tr>
                                    <div class="modal" id="edit<?php echo $d['id_artikel']; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <div class="card-body">
                                                            <div class="form-group d-none">
                                                                <label for="exampleInputPassword1">id</label>
                                                                <input type="hidden" name="id" class="form-control" id="exampleInputPassword1" value="<?php echo $d['id_artikel'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Tanggal</label>
                                                                <input type="text" name="tanggal" class="form-control" id="exampleInputPassword1" value="<?php echo date('d F Y', $d['date_created']) ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Judul Artikel</label>
                                                                <input type="text" name="judul_artikel" class="form-control" id="exampleInputPassword1" value="<?php echo $d['j_artikel'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Deskripsi 1</label>
                                                                <input type="text" name="deskripsi1" class="form-control" id="exampleInputEmail1" value="<?php echo $d['artikel1'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Deskripsi 2</label>
                                                                <input type="text" name="deskripsi2" class="form-control" id="exampleInputPassword1" value="<?php echo $d['artikel2'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Deskripsi 3</label>
                                                                <input type="text" name="deskripsi3" class="form-control" id="exampleInputPassword1" value="<?php echo $d['artikel3'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Deskripsi 4</label>
                                                                <input type="text" name="deskripsi4" class="form-control" id="exampleInputPassword1" value="<?php echo $d['artikel4'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Foto</label>
                                                                <input type="file" name="foto" class="form-control" id="exampleInputPassword1" value="<?php echo $d['foto'] ?>">
                                                            </div>
                                                            <div>
                                                                <input type="hidden" name="fotolama" class="form-control" id="exampleInputPassword1" value="<?php echo $d['foto'] ?>">
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->

                                                        <div class="modal-footer right-content-between">
                                                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                                                            <button type="submit" name="edit" class="btn btn-primary">simpan</button>
                                                        </div>
                                                    </form>
                                                    <?php
                                                    if (isset($_POST['edit'])) {
                                                        include('koneksi.php');
                                                        $judul_artikel = $_POST['judul_artikel'];
                                                        $tanggal = $_POST['tanggal'];
                                                        $deskripsi1 = $_POST['deskripsi1'];
                                                        $deskripsi2 = $_POST['deskripsi2'];
                                                        $deskripsi3 = $_POST['deskripsi3'];
                                                        $deskripsi4 = $_POST['deskripsi4'];
                                                        $fotolama = $_POST['fotolama'];

                                                        $foto = $_FILES['foto']['name'];
                                                        $file_tmp = $_FILES['foto']['tmp_name'];

                                                        if ($foto) {
                                                            unlink('assets/' . $fotolama);

                                                            move_uploaded_file($file_tmp, 'assets/' . $foto);

                                                            $update = mysqli_query($koneksi, "update artikel set
                                                    j_artikel = '" . $judul_artikel . "',
                                                    date_created = '" . $tanggal . "',
                                                    artikel1 = '" . $deskripsi1 . "',
                                                    artikel2 = '" . $deskripsi2 . "',
                                                    artikel3 = '" . $deskripsi3 . "',
                                                    artikel4 = '" . $deskripsi4 . "',
                                                    foto = '" . $foto . "'
                                                    WHERE id_artikel = '" . $_POST['id'] . "'
                                                ");
                                                            if ($update) {
                                                                echo "<script>alert('Edit data berhasil');location='artikel.php';</script>";
                                                            } else {
                                                                echo "Gagal edit";
                                                            }
                                                        } elseif ($fotolama) {
                                                            $update = mysqli_query($koneksi, "update artikel set
                                                        j_artikel = '" . $judul_artikel . "',
                                                        date_created = '" . $tanggal . "',
                                                        artikel1 = '" . $deskripsi1 . "',
                                                        artikel2 = '" . $deskripsi2 . "',
                                                        artikel3 = '" . $deskripsi3 . "',
                                                        artikel4 = '" . $deskripsi4 . "',
                                                        foto = '" . $fotolama . "'
                                                        WHERE id_artikel = '" . $_POST['id'] . "'
                                                ");
                                                            if ($update) {
                                                                echo "<script>alert('Edit data berhasil');location='artikel.php';</script>";
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <div class="modal" id="tambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="proses.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Judul Artikel</label>
                                <input type="text" name="judul_artikel" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi 1</label>
                                <input type="text" name="deskripsi1" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi 2</label>
                                <input type="text" name="deskripsi2" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi 3</label>
                                <input type="text" name="deskripsi3" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi 4</label>
                                <input type="text" name="deskripsi4" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Foto</label>
                                <input type="file" name="foto" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="modal-footer right-content-between">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                            <button type="submit" name="simpan" class="btn btn-primary">simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer_admin.php"; ?>