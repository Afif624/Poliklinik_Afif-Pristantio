<?php 
 
require 'connect.php';
 
error_reporting(0);
session_start();
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql1 = "SELECT * FROM users WHERE email='$email'";
        $result1 = mysqli_query($mysqli, $sql1);
        if (!$result1->num_rows > 0) {
            $sql2 = "SELECT * FROM users WHERE username='$username'";
            $result2 = mysqli_query($mysqli, $sql2);
            if (!$result2->num_rows > 0) {
                $sql3 = "INSERT INTO users (username, email, password)
                        VALUES ('$username', '$email', '$password')";
                $result3 = mysqli_query($mysqli, $sql3);
                if ($result3) {
                    echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                    $username = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                } else {
                    echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
                }
            } else {
                echo "<script>alert('Woops! Username Sudah Terdaftar.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Dan Confirm Password Tidak Sama')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/main.css">
        <title>Poliklinik</title>
    </head>
    <body class="bg-inputan" style="background-image: url(img/Background.jpg); background-size:cover;">
        <div class="container-inputan">
            <form action="" method="POST" class="form-inputan">
                <p class="text-inputan">Register</p>
                <div class="group-inputan">
                    <input class="inputan" type="text" placeholder="Masukkan Username" name="username" value="<?php echo $username; ?>" required>
                </div>
                <div class="group-inputan">
                    <input class="inputan" type="email" placeholder="Masukkan Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="group-inputan">
                    <input class="inputan" type="password" placeholder="Masukkan Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="group-inputan">
                    <input class="inputan" type="password" placeholder="Masukkan Ulang Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                </div>
                <div class="group-inputan">
                    <button name="submit" class="btn">Register Now</button>
                </div>
                <p class="text-register" style="color: white;">Anda sudah punya akun? Silahkan Ke <a href="index.php">Login</a></p>
            </form>
        </div>
    </body>
</html>