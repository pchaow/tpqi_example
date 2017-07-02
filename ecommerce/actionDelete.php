<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ecommerce");

$conn->set_charset("utf8");

//print_r($_POST);die();
$category_id = 0;
if(isset($_POST['category_id'])){
    $category_id = $_POST['category_id'];
}else {
    $category_id = $_GET['category_id'];
}



$sql = "DELETE FROM `categories` WHERE `categories`.`category_id` = $category_id";

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
    ลบข้อมูลสำเร็จ <a href="index.php">กลับสู่หน้ารายการหมวดหมู่สินค้า</a>
<?php else : ?>
    ล้มเหลว <a href="index.php">กลับสู่หน้ารายการหมวดหมู่สินค้า</a>
<?php endif ?>


</body>
</html>