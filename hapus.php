<?php 
include('koneksi.php');
$data = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel = '$_GET[id]' ") ;
$row = mysqli_fetch_array($data);

$foto = $row['foto'];
if(file_exists('assets/'.$foto))
{
    unlink('assets/'.$foto) ;
}
$id = $_GET['id'];
$query = "DELETE FROM artikel where id_artikel ='$id'";
$result = mysqli_query($koneksi, $query);

if(!$result) {
    die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
}else {
    echo "<script>alert('Data berhasil dihapus!');window.location='artikel.php';</script>";
}
?>