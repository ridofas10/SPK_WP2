<?php 
// Aksi login
if(isset($_GET['aksi'])){
    if($_GET['aksi']=='login') {
        
        session_start();
        include 'assets/conn/config.php';
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_akun WHERE email='$email' AND password='$password'");
        $cek = mysqli_num_rows($query);

        if($cek > 0) {
            // Login berhasil
            $_SESSION['email'] = $email;
            header("location:admin/index.php");
        } else {
            // Login gagal
            header("location:index.php?pesan=gagal");
        }
    }
}
?>



</html>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Sistem Pendukung Keputusan</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel='stylesheet' href='index.css'>

</head>

<body>

    <body>
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form action="index.php?aksi=login" method="POST">
                        <?php 
					if (isset($_GET['pesan'])) {
						if($_GET['pesan']=="gagal") {
                            echo "<script>
                            alert('login gagal!');
                            document.location.href = 'index.php'
                            </script>";
						}

					}
					?>

                        <h2>Login</h2>
                        <div class="inputbox">
                            <ion-icon name="mail-outline"></ion-icon> <input type="email" name="email" required>
                            <label>Email</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="lock-closed-outline"></ion-icon> <input type="password" name="password"
                                required>
                            <label>Password</label>
                        </div>
                        <div class="forget"> </div> <button type="submit">Log In</button><br><br>
                        <h4>
                            Username : admin@gmail.com
                            <br>
                            Password : admin
                        </h4>

                    </form>
                </div>
            </div>
        </section>

    </body>
</body>

</html>