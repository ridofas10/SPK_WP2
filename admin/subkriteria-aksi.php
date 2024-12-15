<?php include 'header.php'; ?>

<?php 

// Ambil ID kriteria dari URL atau sumber lain
$id_kriteria = $_GET['id_kriteria'];

// Hitung jumlah subkriteria dengan ID kriteria yang sama
$query_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM tbl_subkriteria WHERE id_kriteria = '$id_kriteria'");
$row = mysqli_fetch_assoc($query_count);
$total_subkriteria = $row['total'];

if ($total_subkriteria >= 5 && $_GET['aksi'] == 'tambah') {
    // Jika jumlah subkriteria sudah 5, alihkan ke halaman subkriteria.php dengan pesan peringatan
    echo "<script>alert('Maksimal subkriteria untuk kriteria ini sudah tercapai !!'); window.location='subkriteria.php?id_kriteria={$id_kriteria}';</script>";
    exit;
}

?>



<h2 class="mb-4">SUBKRITERIA</h2>

<?php if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='tambah') { ?>

<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <h4>Data Subkriteria/Tambah Data</h4>

    <form action="subkriteria-proses.php?proses=proses-tambah" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id_kriteria" class="form-control" value="<?php echo $_GET['id_kriteria']; ?>">

        <div class="form-group">
            <label>Nama Subriteria</label>
            <input type="text" name="nama_subkriteria" class="form-control" placeholder="nama subkriteria"
                autocomplete="off" required onsubmit="this.SetCustomValidity('')">
        </div>

        <div class="form-group">
            <label>Nilai Subkriteria</label>
            <input type="number" name="nilai_subkriteria" class="form-control" placeholder="0" autocomplete="off"
                required onsubmit="this.SetCustomValidity('')">
        </div>

        <div class="modal-footer">
            <a href="subkriteria.php?id_kriteria=<?php echo $_GET['id_kriteria'] ?>" class="btn btn-info">Batal</a>
            <input type="submit" class="btn btn-danger" value="Simpan">
        </div>
    </form>
</div>
<?php } elseif ($_GET['aksi'] == 'ubah') {  ?>

<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <h4>Data kriteria/Ubah Data</h4>

    <?php 
        $id_subkriteria = $_GET['id_subkriteria'];
        $query = mysqli_query($conn, "SELECT * FROM tbl_subkriteria WHERE id_subkriteria='$id_subkriteria'");
       while ($result = mysqli_fetch_array($query)) { ?>

    <form action="subkriteria-proses.php?proses=proses-ubah" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id_subkriteria" value="<?php echo $result['id_subkriteria'] ?>">

        <input type="hidden" name="id_kriteria" value="<?php echo $_GET['id_kriteria'] ?>">

        <div class="form-group">
            <label>Nama Subkriteria</label>
            <input type="text" name="nama_subkriteria" class="form-control" placeholder="nama kriteria"
                autocomplete="off" required value="<?php echo $result['nama_subkriteria'] ?>">
        </div>

        <div class="form-group">
            <label>Nilai Subkriteria</label>
            <input type="text" name="nilai_subkriteria" class="form-control" autocomplete="off" required
                value="<?php echo $result['nilai_subkriteria'] ?>">
        </div>

        <div class="modal-footer">
            <a href="subkriteria.php?id_kriteria=<?php echo $_GET['id_kriteria'] ?>" class="btn btn-info">Batal</a>
            <input type="submit" class="btn btn-danger" value="Ubah">
        </div>
    </form>
    <?php } ?>
</div>
<?php }
}   

?>
</div>
</div>