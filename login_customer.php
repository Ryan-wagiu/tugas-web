<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Bukawarung</title>
    <link rel="stylesheet"  href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"> 
</head>
<body id="bg-login"> 
    <div class="box-login">
    <h2>login</h2>
    <form action="" method="POST">
        <input type="text" name="user" placeholder="Username" class="input-control">
        <input type="password" name="pass" placeholder="Password" class="input-control">
        <input type="submit" name="submit" value="sing in" class="btn">
        <a href="register.php" class="btn">Sign up</a>
        </form>
        <?php
            if(isset($_POST['submit'])){
            session_start();
            include 'db.php';

            $user = mysqli_real_escape_string($conn, $_POST['user']);
            $pass = mysqli_real_escape_string($conn, $_POST['pass']);

           $cek = mysqli_query($conn, "SELECT * FROM tb_customer WHERE username = '".$user."' AND password = '".($pass)."'");
           if(mysqli_num_rows($cek)> 0){
                $d = mysqli_fetch_object($cek);
                $_SESSION['status_login2'] = true;
                $_SESSION['a_global'] = $d;
                $_SESSION['id'] = $d->customer_id;
               echo '<script>window.location="index.php"</script>';
           }else{
               echo '<script>alert("Username atau password Anda salah!")</script>';
           }
        }

        ?>
        
        </div>
           
</body>
</html>