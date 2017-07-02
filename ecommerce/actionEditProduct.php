<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ecommerce");

$conn->set_charset("utf8");

//print_r($_POST);die();
$product_id= $_POST['product_id'];
$category_id = $_POST['category_id'];
$product_name = $_POST["product_name"];
$product_price = $_POST["product_price"];

$sql = "UPDATE `products` SET `product_name` = '$product_name', `product_price` = '$product_price', `category_id` = '$category_id' WHERE `products`.`product_id` = $product_id;";

$result = $conn->query($sql);

//print_r($result);die();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ระบบร้านขายของ</title>
</head>
<body>

<?php if ($result == 1) : ?>
    แก้ไขข้อมูลสำเร็จ
<?php else : ?>
    ล้มเหลว
<?php endif ?>
<a href="indexProduct.php">กลับสู่หน้ารายการสินค้า</a>

</body>
</html>