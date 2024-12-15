<?php 
include '../assets/conn/config.php';

if(isset($_GET['proses'])) {
    if($_GET['proses']=='proses-tambah'){
        $nama_alternatif = $_POST['nama_alternatif'];

        mysqli_query($conn, "INSERT INTO tbl_alternatif (nama_alternatif, vektor_s, vektor_v, rangking) VALUES ('$nama_alternatif','0','0','0')");
        header("location:alternatif.php");

    } elseif($_GET['proses']=='proses-ubah') {
        $id_alternatif = $_POST['id_alternatif'];
        $nama_alternatif = $_POST['nama_alternatif'];

        mysqli_query($conn, "UPDATE tbl_alternatif set nama_alternatif='$nama_alternatif' WHERE id_alternatif='$id_alternatif'");
        header("location:alternatif.php");
    } elseif($_GET['proses']=='proses-hapus') {
        $id_alternatif = $_GET['id_alternatif'];
        mysqli_query($conn, "DELETE FROM tbl_nilai WHERE id_alternatif='$id_alternatif'");
        mysqli_query($conn, "DELETE FROM tbl_alternatif WHERE id_alternatif='$id_alternatif'");
        header("location:alternatif.php");

    }
}

?>