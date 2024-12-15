<?php 
include '../assets/conn/config.php';

if(isset($_GET['proses'])) {
    if($_GET['proses']=='proses-tambah'){
        $nama_kriteria = $_POST['nama_kriteria'];
        $bobot_kriteria = $_POST['bobot_kriteria'];
        $status = $_POST['status'];

        mysqli_query($conn, "INSERT INTO tbl_kriteria (nama_kriteria, bobot_kriteria, status) VALUES ('$nama_kriteria','$bobot_kriteria', '$status')");
        header("location:kriteria.php");

    } elseif($_GET['proses']=='proses-ubah') {
        $id_kriteria = $_POST['id_kriteria'];
        $nama_kriteria = $_POST['nama_kriteria'];
        $bobot_kriteria = $_POST['bobot_kriteria'];
        $status = $_POST['status'];

        mysqli_query($conn, "UPDATE tbl_kriteria SET nama_kriteria='$nama_kriteria', bobot_kriteria='$bobot_kriteria', status='$status' WHERE id_kriteria='$id_kriteria'");
        header("location:kriteria.php");

    } elseif($_GET['proses']=='proses-hapus') {
        $id_kriteria = $_GET['id_kriteria'];
        
        // Menghapus subkriteria terkait terlebih dahulu
        mysqli_query($conn, "DELETE FROM tbl_subkriteria WHERE id_kriteria='$id_kriteria'");

        // Menghapus kriteria
        mysqli_query($conn, "DELETE FROM tbl_kriteria WHERE id_kriteria='$id_kriteria'");

        header("location:kriteria.php");
    }
}
?>