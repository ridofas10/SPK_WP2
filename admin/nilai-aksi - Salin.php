<?php 
include 'header.php';
?>

<h2 class="mb-4">NILAI</h2>

<?php 
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'tambah') { ?>
<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <h4>Data Nilai/Tambah Data</h4>
    <form action="nilai-proses.php?proses=proses-tambah" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Alternatif</label>

            <select class="form-control" name="id_alternatif">
                <option disabled selected>Pilih</option>
                <?php 
                $query= mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY
                id_alternatif"); 
                while($a=mysqli_fetch_array($query)) { ?>

                <option value="<?php echo $a['id_alternatif'] ?>"><?php echo $a['nama_alternatif'] ?></option>


                <?php } ?>
            </select>

        </div>

        <?php 
        $hasil = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
        while($baris=mysqli_fetch_array($hasil)) {
            $idK = $baris['id_kriteria'];
            $labelK = $baris['nama_kriteria'];

            echo "<div class='form-group'>
            <label>".$labelK."</label>
            <select name=".$idK." class='form-control'>";

            $hasil1= mysqli_query($conn, "SELECT * FROM tbl_subkriteria WHERE id_kriteria='".
            $idK."' ORDER BY nilai_subkriteria DESC");
            while ($baris1=mysqli_fetch_array($hasil1)) {
                echo "<option selected value=".$baris1['id_subkriteria']." > 
                ".$baris1['nama_subkriteria']." - (".$baris1['nilai_subkriteria'].") 
                </option>";
            }
            echo "</select></div>";

        } ?>

        <div class="modal-footer">
            <a href="nilai.php" class="btn btn-info">Batal</a>
            <input type="submit" class="btn btn-danger" value="Simpan">
        </div>
    </form>
</div>
<?php } elseif ($_GET['aksi'] == 'ubah') { ?>

<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <h4>Data Nilai/Ubah Data</h4>


    <form action="nilai-proses.php?proses=proses-ubah" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label>Nama Alternatif</label>
            <?php 
            $id_alternatif=$_GET['id_alternatif']; 
            $data = mysqli_query($conn, "SELECT * FROM tbl_alternatif WHERE id_alternatif='$id_alternatif'");
            $a = mysqli_fetch_array($data);
            ?>

            <select class="form-control" name="id_alternatif">
                <option selected value="<?php echo $a['id_alternatif']; ?>">
                    <?php echo $a['nama_alternatif']; ?></option>

                <?php  
                    
                    $data1=mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY
                    id_alternatif");
                    while($a1= mysqli_fetch_array($data1)) { ?>
                <option value="<?php echo $a1['id_alternatif'] ?>"><?php echo $a1['nama_alternatif'] ?></option>
                <?php }
                    ?>
            </select>
        </div>

        <?php 
        $hasil = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");

            while($baris=mysqli_fetch_array($hasil)) {
                $idK = $baris['id_kriteria'];
                $labelK = $baris['nama_kriteria'];
                $id_alternatif=$_GET['id_alternatif'];
    
                $hasil1 = mysqli_query($conn, "SELECT * FROM tbl_nilai WHERE id_kriteria='".$idK."'
                AND id_alternatif='".$id_alternatif."'");
                $baris1 = mysqli_fetch_array($hasil1);
                $id_subkriteria = $baris1['id_subkriteria'];
    
                echo "<div class='form-group'>
                <label>".$labelK."</label>
                <select name=".$idK." class='form-control'>";
    
                $hasil2= mysqli_query($conn, "SELECT * FROM tbl_subkriteria WHERE id_kriteria='".
                $idK."' ORDER BY nilai_subkriteria DESC");
                while ($baris2=mysqli_fetch_array($hasil2)) {
                    
                    if($baris2['id_subkriteria']==$id_subkriteria) {
    
                    echo "<option selected value=".$baris2['id_subkriteria']." > 
                    ".$baris2['nama_subkriteria']." - (".$baris2['nilai_subkriteria'].") 
                    </option>";
                } else{
                    echo "<option selected value=".$baris2['id_subkriteria']." > 
                    ".$baris2['nama_subkriteria']." - (".$baris2['nilai_subkriteria'].") 
                    </option>";
                }
            }
                echo "</select></div>";
            
            }
        
         ?>

        <div class="modal-footer">
            <a href="nilai.php" class="btn btn-info">Batal</a>
            <input type="submit" class="btn btn-danger" value="Ubah">
        </div>
    </form>

</div>
<?php } } ?>

</div>
</div>