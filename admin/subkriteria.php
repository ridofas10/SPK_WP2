<?php include 'header.php';?>

<h2 class="mb-4">SUBKRITERIA</h2>

<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <?php 
        $query1 = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE id_kriteria='$_GET[id_kriteria]'");
        $result1 = mysqli_fetch_array($query1); ?>

    <h4>Data Subkriteria/ <a href="kriteria.php"><?php echo $result1['nama_kriteria']; ?></a></h4>

    <a href="subkriteria-aksi.php?id_kriteria=<?php echo $_GET['id_kriteria'] ?>&aksi=tambah" class="btn btn-secondary">
        <i class="fas fa-plus"></i>&emsp; Tambah Data</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Subkriteria</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Mengambil data subkriteria berdasarkan id_kriteria
                $query = mysqli_query($conn, "SELECT * FROM tbl_subkriteria WHERE id_kriteria='$_GET[id_kriteria]'");
                $no = 1;
                while ($result = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td class="text-center"><?php echo $result['nama_subkriteria']; ?></td>
                    <td class="text-center"><?php echo $result['nilai_subkriteria']; ?></td>

                    <td class="text-center">
                        <a href="subkriteria-aksi.php?id_kriteria=<?php echo $result['id_kriteria']; ?>&id_subkriteria=<?php echo $result['id_subkriteria']; ?>&aksi=ubah"
                            class="btn btn-info">
                            <i class="fas fa-pencil"></i>
                        </a>
                        <a href="subkriteria-proses.php?id_kriteria=<?php echo $result['id_kriteria']; ?>&id_subkriteria=<?php echo $result['id_subkriteria']; ?>&proses=proses-hapus"
                            class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>