<?php 
include '../assets/conn/config.php';

if(isset($_GET['proses'])) {
    if($_GET['proses']=='proses-tambah'){
        $id_alternatif = $_POST['id_alternatif'];

        $data = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
        while($a=mysqli_fetch_array($data)){
            $idK = $a['id_kriteria'];
            $idS = $_POST[$idK];

            $query = "INSERT INTO tbl_nilai(id_alternatif, id_kriteria, id_subkriteria) VALUES 
            ('".$id_alternatif."', '".$idK."', '".$idS."')";
            $result = mysqli_query($conn, $query);
        }
        header("location:nilai.php");

    } elseif($_GET['proses']=='proses-ubah') {
        $id_alternatif = $_POST['id_alternatif'];
        $data = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");

        $cek_data = false;
        while($a=mysqli_fetch_array($data)){
            $idK = $a['id_kriteria'];
            if(!empty($_POST[$idK])) {
                $cek_data = true;
                break;
            }
        }

        if($cek_data) {
            $data1 = "DELETE FROM tbl_nilai WHERE id_alternatif='".$id_alternatif."'";
            $result1 = mysqli_query($conn, $data1);

            $data = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
            while($a=mysqli_fetch_array($data)){
                $idK = $a['id_kriteria'];
                $idS = $_POST[$idK];

                $query = "INSERT INTO tbl_nilai(id_alternatif, id_kriteria, id_subkriteria) VALUES 
                ('".$id_alternatif."', '".$idK."', '".$idS."')";
                $result = mysqli_query($conn, $query);
            }
            header("location:nilai.php");
        } else {
            echo "<script>alert('Tidak ada data yang diubah.'); window.location.href='nilai.php';</script>";
        }

    } elseif($_GET['proses']=='proses-hapus') {
        $id_alternatif = $_GET['id_alternatif'];
        mysqli_query($conn, "DELETE FROM tbl_nilai WHERE id_alternatif='$id_alternatif'");
        header("location:nilai.php");

    }
}
?>