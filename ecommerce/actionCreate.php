<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ecommerce");

$conn->set_charset("utf8");

//print_r($_POST);
$category_name = $_POST['category_name'];
$category_desc = $_POST['category_desc'];


$sql = "INSERT INTO `categories` (`category_id`, `category_name`, `category_desc`) " .
    "VALUES (NULL, '$category_name', '$category_desc');";

$result = $conn->query($sql);

//print_r($result);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ระบบร้านขายของ</title>
</head>
<body>

<?php if ($result == 1) : ?>
    เพิ่มข้อมูลสำเร็จ <a href="index.php">กลับสู่หน้ารายการหมวดหมู่สินค้า</a>
<?php else : ?>
    ล้มเหลว <a href="index.php">กลับสู่หน้ารายการหมวดหมู่สินค้า</a>
<?php endif ?>


</body>
</html>