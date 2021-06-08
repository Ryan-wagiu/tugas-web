<?php
include 'db.php';
session_start();
if($_SESSION['status_login2'] != true){
        echo '<script>window.location="login_customer.php"</script>';
    }
//mendapatkan product_id dari url
$product_id = $_GET['id'];


//jika suda ada produk itu di keranjangmaka produk di +1
if (isset($_SESSION['keranjang'][$product_id])) {
    $_SESSION['keranjang'][$product_id]+=1;
}
//selain itu (belum ada di keranjang) maka produk dianggap 1
else {
    $_SESSION['keranjang'][$product_id] =1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
echo "<script>alert('produk telah masuk ke keranjang belanja')</script>";
echo "<script>location='keranjang.php'</script>";

?>