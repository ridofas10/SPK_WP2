<?php 
include 'header.php';

?>

<h2 class="mb-4">ALTERNATIF</h2>
<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <h4>Data Alternatif</h4>

    <a href="alternatif-aksi.php?aksi=tambah" class="btn btn-secondary"><i class="fas fa-plus"></i>&emsp; Tambah
        Data</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Alternatif</th>
                    <th class="text-center">Nilai WP</th>
                    <th class="text-center">Rangking</th>
                    <th class="text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $query = mysqli_query($conn, "SELECT * FROM tbl_alternatif order by id_alternatif");
                 $no=1;
                 while($result = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $result['nama_alternatif']; ?></td>
                    <td class="text-center"><?php echo number_format($result['vektor_v'], 5); ?></td>
                    <td class="text-center"><?php echo $result['rangking']; ?></td>

                    <td class="text-center">
                        <a href="alternatif-aksi.php?id_alternatif=<?php echo $result['id_alternatif'] ?> &
                        aksi=ubah" class="btn btn-info"><i class="fas fa-pencil"></i></a>

                        <a href="alternatif-proses.php?id_alternatif=<?php echo $result['id_alternatif'] ?> &
                        proses=proses-hapus" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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