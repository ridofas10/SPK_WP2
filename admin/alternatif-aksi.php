<?php 
include 'header.php';

$query_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM tbl_alternatif");
$row = mysqli_fetch_assoc($query_count);
$total_alternatif = $row['total'];

?>

<h2 class="mb-4">ALTERNATIF</h2>

<?php 
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'tambah') { ?>
<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <h4>Data Alternatif/Tambah Data</h4>
    <form action="alternatif-proses.php?proses=proses-tambah" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Alternatif</label>
            <input type="text" name="nama_alternatif" class="form-control" placeholder="nama alternatif"
                autocomplete="off" required>
        </div>
        <div class="modal-footer">
            <a href="alternatif.php" class="btn btn-info">Batal</a>
            <input type="submit" class="btn btn-danger" value="Simpan">
        </div>
    </form>
</div>
<?php } elseif ($_GET['aksi'] == 'ubah') { 
        $id_alternatif = $_GET['id_alternatif'];
        $query = mysqli_query($conn, "SELECT * FROM tbl_alternatif WHERE id_alternatif='$id_alternatif'");
        $result = mysqli_fetch_array($query);
        if ($result) { ?>
<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <h4>Data Alternatif/Ubah Data</h4>
    <form action="alternatif-proses.php?proses=proses-ubah" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_alternatif" value="<?php echo $result['id_alternatif'] ?>">
        <div class="form-group">
            <label>Nama Alternatif</label>
            <input type="text" name="nama_alternatif" class="form-control" placeholder="nama alternatif"
                autocomplete="off" required value="<?php echo $result['nama_alternatif'] ?>">
        </div>
        <div class="modal-footer">
            <a href="alternatif.php" class="btn btn-info">Batal</a>
            <input type="submit" class="btn btn-danger" value="Ubah">
        </div>
    </form>
</div>
<?php } else {
            echo "Data tidak ditemukan.";
        }
    }
}
?>

</div>