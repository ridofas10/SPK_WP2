<?php include 'header.php'; ?>
<?php 

$query_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM tbl_kriteria");
$row = mysqli_fetch_assoc($query_count);
$total_kriteria = $row['total'];


?>


<h2 class="mb-4">KRITERIA</h2>

<?php 
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'tambah') { ?>

<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <h4>Data Kriteria/Tambah Data</h4>

    <form action="kriteria-proses.php?proses=proses-tambah" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label>Nama kriteria</label>
            <input type="text" name="nama_kriteria" class="form-control" placeholder="nama kriteria" autocomplete="off"
                required>
        </div>

        <div class="form-group">
            <label>Bobot kriteria</label>
            <input type="number" name="bobot_kriteria" class="form-control" placeholder="0" autocomplete="off" required>
        </div>
        <div class="form-group">
            <select type="text" name="status" class="form-control" placeholder="0" autocomplete="off" required>
                <option selected disabled>Pilih Status</option>
                <option value="COST">COST</option>
                <option value="BENEFIT">BENEFIT</option>
            </select>
        </div>

        <div class="modal-footer">
            <a href="kriteria.php" class="btn btn-info">Batal</a>
            <input type="submit" class="btn btn-danger" value="Simpan">
        </div>

    </form>
</div>

<?php 
    } elseif ($_GET['aksi']=='ubah') { ?>

<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <h4>Data kriteria/Ubah Data</h4>

    <?php 
            $id_kriteria = $_GET['id_kriteria'];
            $query = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE id_kriteria='$id_kriteria'");
            while ($result = mysqli_fetch_array($query)) { ?>

    <form action="kriteria-proses.php?proses=proses-ubah" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_kriteria" value="<?php echo $result['id_kriteria'] ?>">

        <div class="form-group">
            <label>Nama kriteria</label>
            <input type="text" name="nama_kriteria" class="form-control" placeholder="nama kriteria" autocomplete="off"
                required value="<?php echo $result['nama_kriteria'] ?>">
        </div>

        <div class="form-group">
            <label>Bobot kriteria</label>
            <input type="text" name="bobot_kriteria" class="form-control" autocomplete="off" required
                value="<?php echo $result['bobot_kriteria'] ?>">
        </div>

        <div class="form-group">
            <select type="text" name="status" class="form-control" placeholder="0" autocomplete="off" required>
                <option selected disabled>Pilih Status</option>
                <option value="COST">COST</option>
                <option value="BENEFIT">BENEFIT</option>
            </select>
        </div>

        <div class="modal-footer">
            <a href="kriteria.php" class="btn btn-info">Batal</a>
            <input type="submit" class="btn btn-danger" value="Ubah">
        </div>
    </form>

    <?php } ?>
</div>

<?php 
    }
}
?>

</div>
</div>