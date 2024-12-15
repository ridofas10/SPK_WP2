<?php 
include 'header.php';

?>

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
                $query2 = "SELECT SUM(bobot_kriteria) AS total FROM tbl_kriteria";
                $result2 = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result2);
                $total = $row['total']; 
                  ?>
            <tr>
                <td class="text-center"><?php echo $no++; ?></td>
                <td class="text-center"><?php echo $result['nama_kriteria']; ?></td>
                <td class="text-center"><?php echo $result['bobot_kriteria']; ?> / 100</td>
                <td class="text-center"><?php echo $result['bobot_kriteria']/$total; ?></td>

            </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>