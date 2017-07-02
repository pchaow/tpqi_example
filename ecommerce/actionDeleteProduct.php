<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ecommerce");

$conn->set_charset("utf8");

//print_r($_POST);die();
$product_id = 0;
if(isset($_POST['product_id'])){
    $product_id = $_POST['product_id'];
}else {
    $product_id = $_GET['product_id'];
}



$sql = "DELETE FROM `products` WHERE `products`.`product_id` = $product_id";

$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ระบบร้านขายของ</title>
</head>
<body>

<?php if ($result == 1) : ?>
    ลบข้อมูลสำเร็จ
<?php else : ?>
    ล้มเหลว
<?php endif ?>
<a href="indexProduct.php">กลับสู่หน้ารายการสินค้า</a>

</body>
</html>