<?php 
include 'header.php';

?>

<h2 class="mb-4">NILAI</h2>
<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <h4>Data Nilai</h4>

    <a href="nilai-aksi.php?aksi=tambah" class="btn btn-secondary"><i class="fas fa-plus"></i>&emsp; Tambah
        Data</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Alternatif</th>
                    <?php 
                    $data = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
                    while($a=mysqli_fetch_array($data)){
                        echo "<th class='text-center'>$a[nama_kriteria]</th>";
                    }
                    ?>
                    <th class="text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $query = mysqli_query($conn, "SELECT * FROM tbl_alternatif order by id_alternatif");
                 $no=1;
                 while($result = mysqli_fetch_array($query)) { 
                    $nomor = $no++;
                    $kode = $result['id_alternatif'];
                    $nama = $result['nama_alternatif'];

                    echo "<tr>
                    <td class='text-center'>$nomor</td>
                    <td class='text-center'>$nama</td>
                    ";

                    $query1 = mysqli_query($conn, "SELECT a.nama_subkriteria as nama_sub FROM 
                    tbl_subkriteria a, tbl_nilai b WHERE b.id_alternatif='".$kode."' AND
                    a.id_subkriteria=b.id_subkriteria ORDER BY b.id_kriteria");

                    while($b=mysqli_fetch_array($query1)) {
                        echo "<td class='text-center'>$b[nama_sub]</td>";
                    }

                    ?>



                <td class="text-center">
                    <a href="nilai-aksi.php?id_alternatif=<?php echo $result['id_alternatif'] ?> &
                        aksi=ubah" class="btn btn-info"><i class="fas fa-pencil"></i></a>

                    <a href="nilai-proses.php?id_alternatif=<?php echo $result['id_alternatif'] ?> &
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