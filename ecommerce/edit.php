<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ecommerce");

$conn->set_charset("utf8");

$id = $_GET['id'];
$sql = "select * from categories where category_id = $id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ระบบร้านขายของ</title>
</head>
<body>
<?php if ($result->num_rows == 1) : ?>
    <?php $cat = $result->fetch_array(); ?>
    <h1>แก้ไขรายการ</h1>

    <form action="actionEdit.php" method="post">
        <input type="hidden" name="category_id" value="<?= @$cat[0] ?>"
        <label>name</label> :
        <input name="category_name" type="text"
               value="<?= @$cat[1] ?>"
        /> <br/><br/>

        <label>description</label> :
        <textarea name="category_desc"><?= @$cat[2] ?></textarea> <br/>

        <button type="submit">แก้ไข</button>
    </form>
<?php else : ?>
    ไม่พบข้อมุล <a href="index.php">กลับสู่หน้ารายการหมวดหมู่สินค้า</a>
<?php endif; ?>
</body>
</html>