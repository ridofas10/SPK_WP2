<?php include 'header.php';?>

<h2 class="mb-4">KRITERIA</h2>

<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <h4>Data Kriteria</h4>

    <a href="kriteria-aksi.php?aksi=tambah" class="btn btn-secondary"><i class="fas fa-plus"></i>&emsp; Tambah
        Data</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Kriteria</th>
                    <th class="text-center">Bobot</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Subkriteria</th>
                    <th class="text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $query = mysqli_query($conn, "SELECT * FROM tbl_kriteria order by id_kriteria");
                 $no=1;
                 while($result = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $result['nama_kriteria']; ?></td>
                    <td class="text-center"><?php echo $result['bobot_kriteria']; ?></td>
                    <td class="text-center"><?php echo $result['status']; ?></td>



                    <td class="text-center">
                        <a href="subkriteria.php?id_kriteria=<?php echo $result['id_kriteria'] ?>"
                            class="btn btn-success"><i class="fas fa-plus"></i></a>
                    </td>

                    <td class="text-center">
                        <a href="kriteria-aksi.php?id_kriteria=<?php echo $result['id_kriteria'] ?> 
                        &aksi=ubah" class="btn btn-info"><i class="fas fa-pencil"></i></a>

                        <a href="kriteria-proses.php?id_kriteria=<?php echo $result['id_kriteria'] ?> 
                        &proses=proses-hapus" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>

</div>

</div>
</div>