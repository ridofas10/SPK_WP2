<?php 
include 'header.php';

?>

<h2 class="mb-4">METODE</h2>
<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 5px #888888;">
    <h4>HASIL ANALISA PERHITUNGAN METODE WEIGHTED PRODUCT (WP)</h4>

    <br><br>

    <h4 class="modal-title">Nilai Kriteria</h4>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kriteria</th>
                    <th class="text-center">Bobot</th>
                    <th class="text-center">Normalisasi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $query = mysqli_query($conn, "SELECT * FROM tbl_kriteria order by id_kriteria");
                 $no=1;
                 while($result = mysqli_fetch_array($query)) { 
                      ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td class="text-center"><?php echo $result['nama_kriteria']; ?></td>
                    <td class="text-center"><?php echo $result['bobot_kriteria']; ?> / 100</td>
                    <td class="text-center"><?php echo $result['bobot_kriteria']/100; ?></td>

                </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    <br>

    <h4 class="modal-title">Nilai Keputusan</h4>

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

                </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    <br>


    <h4 class="modal-title">Nilai Konversi Keputusan</h4>

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

                $query1 = mysqli_query($conn, "SELECT a.nilai_subkriteria as nama_sub FROM 
                tbl_subkriteria a, tbl_nilai b WHERE b.id_alternatif='".$kode."' AND
                a.id_subkriteria=b.id_subkriteria ORDER BY b.id_kriteria");

                while($b=mysqli_fetch_array($query1)) {
                    echo "<td class='text-center'>$b[nama_sub]</td>";
                }

                ?>

                </tr>
                <?php }
            ?>
            </tbody>
        </table>
    </div>
    <br>

    <?php 
// Set vektor S dan V
$query = mysqli_query($conn, "SELECT * FROM tbl_alternatif");
$jumlah=0;
while ($result = mysqli_fetch_array($query)) {
    $vektor_s = 1;
    $id = $result['id_alternatif'];

    // Panggil nilai matriks keputusan
    $query2 = mysqli_query($conn, "SELECT s.nilai_subkriteria AS sub, n.id_subkriteria, n.id_kriteria FROM 
    tbl_subkriteria s 
    JOIN tbl_nilai n ON s.id_subkriteria = n.id_subkriteria 
    JOIN tbl_kriteria k ON k.id_kriteria = n.id_kriteria 
    WHERE n.id_alternatif = '$id' 
    ORDER BY n.id_kriteria");

    while ($result2 = mysqli_fetch_array($query2)) {
        $val = $result2['sub'];
        $id_kriteria = $result2['id_kriteria'];

        // Panggil nilai bobot kriteria
        $query3 = mysqli_query($conn, "SELECT bobot_kriteria FROM tbl_kriteria WHERE id_kriteria='$id_kriteria'");
        $result3 = mysqli_fetch_assoc($query3);
            
        // Normalisasikan nilai bobot kriteria
        $bobot_k = $result3['bobot_kriteria'] / 100;
                
        // Hitung vektor S
        $val_s = pow($val, $bobot_k);
        $vektor_s *= $val_s;

    }

    // Ambil nilai vektor S dan simpan ke database
    mysqli_query($conn, "UPDATE tbl_alternatif SET vektor_s='$vektor_s' WHERE id_alternatif='$id'");

    
    //vektor v
    $query4 = mysqli_query($conn, "SELECT sum(vektor_s) as sum_s FROM tbl_alternatif");
    $b = mysqli_fetch_array($query4);
    $vektor_v = $vektor_s / $b['sum_s'];
    
    // Ambil nilai vektor S dan simpan ke database
    mysqli_query($conn, "UPDATE tbl_alternatif SET vektor_v='$vektor_v' WHERE id_alternatif='$id'");
    $jumlah++;
    

}

//set rangking
$query5 = mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY vektor_v DESC");
$rank=1;
while($result5=mysqli_fetch_array($query5)){

    mysqli_query($conn, "UPDATE tbl_alternatif SET rangking='$rank' WHERE id_alternatif='$result5[id_alternatif]'");
    $rank++;

}
?>

    <h4 class="modal-title">Nilai Vektor S</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Alternatif</th>
                    <th class="text-center">Vektor S</th>
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
                    <td class="text-center"><?php echo number_format($result['vektor_s'], 5); ?></td>
                </tr>
                <?php }
                ?>
                <tr>
                    <td colspan="2">Sigma S</td>
                    <?php 
                        $query4 = mysqli_query($conn, "SELECT sum(vektor_s) as sum_s FROM tbl_alternatif");
                        $b = mysqli_fetch_array($query4);
                        $bobot_s = number_format($b['sum_s'], 5);
                        echo "<td class='text-center'>$bobot_s</td>";
                    ?>
                </tr>

            </tbody>
        </table>
    </div>


    <h4 class="modal-title">Nilai Vektor V</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Alternatif</th>
                    <th class="text-center">Vektor V</th>
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
                </tr>
                <?php }
                ?>
                <tr>
                    <td colspan="2">Sigma S</td>
                    <?php 
                        $query4 = mysqli_query($conn, "SELECT sum(vektor_v) as sum_v FROM tbl_alternatif");
                        $b = mysqli_fetch_array($query4);
                        $bobot_v = number_format($b['sum_v'], 5);
                        echo "<td class='text-center'>$bobot_v</td>";
                    ?>
                </tr>

            </tbody>
        </table>
    </div>


    <h4 class="modal-title">Perangkingan</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Nama Alternatif</th>
                    <th class="text-center">Nilai WP</th>
                    <th class="text-center">Rangking</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $query = mysqli_query($conn, "SELECT * FROM tbl_alternatif order by rangking");
                 $no=1;
                 while($result = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td class="text-center">ID-A<?php echo $result['id_alternatif']; ?></td>
                    <td class="text-center"><?php echo $result['nama_alternatif']; ?></td>
                    <td class="text-center"><?php echo number_format($result['vektor_v'], 5); ?></td>
                    <td class="text-center"><?php echo $result['rangking']; ?></td>

                </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>


</div>
</div>
</div>