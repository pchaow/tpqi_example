<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ecommerce");

$conn->set_charset("utf8");

//print_r($_POST);die();
$category_id = $_POST['category_id'];
$category_name = $_POST['category_name'];
$category_desc = $_POST['category_desc'];


$sql = "UPDATE `categories` " .
    "SET `category_name` = '$category_name'," .
    " `category_desc` = '$category_desc' " .
    "WHERE `categories`.`category_id` = $category_id;";

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
    แก้ไขข้อมูลสำเร็จ <a href="index.php">กลับสู่หน้ารายการหมวดหมู่สินค้า</a>
<?php else : ?>
    ล้มเหลว <a href="index.php">กลับสู่หน้ารายการหมวดหมู่สินค้า</a>
<?php endif ?>


</body>
</html>