<?php 
 
require 'connect.php';

error_reporting(0);
session_start();
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($mysqli, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        header("Location: home.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
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
                <p class="text-inputan">Login</p>
                <div class="group-inputan">
                    <input class="inputan" type="email" placeholder="Email Anda" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="group-inputan">
                    <input class="inputan" type="password" placeholder="Password Anda" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="group-inputan">
                    <button name="submit" class="btn">Login Now</button>
                </div>
                <p class="text-register" style="color:white;">Anda belum punya akun? Silahkan
                    <a href="register.php">Register</a>
                </p>
            </form>
        </div>
    </body>
</html>