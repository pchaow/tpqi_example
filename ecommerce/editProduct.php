<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ecommerce");

$conn->set_charset("utf8");

$id = $_GET['id'];

$result2 = $conn->query("select * from categories");
$rows = $result2->fetch_all();

$result = $conn->query("select * from products where product_id = $id");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ระบบร้านขายของ</title>
</head>
<body>
<?php if ($result->num_rows == 1) : ?>
    <?php $product = $result->fetch_array(); ?>
    <h1>แก้ไขรายการ</h1>

    <form action="actionEditProduct.php" method="post">

        <input type="hidden" name="product_id" value="<?= @$product[0] ?>"


        <label>name</label> :
        <input name="product_name"
               value="<?=@$product[1]?>" type="text"/> <br/><br/>

        <label>price</label> :
        <input value="<?=@$product[2]?>"
                name="product_price" type="number"/> <br/><br/>

        <label>หมวดหมู่</label>
        <select name="category_id">
            <?php foreach ($rows as $row) : ?>
                <option
                        <?php if($row[0] == $product[3]) : ?>
                            selected
                        <?php endif?>
                        value="<?=@$row[0]?>">
                    <?=@$row[1]?>
                </option>
            <?php endforeach?>
        </select>

        <button type="submit">แก้ไข</button>
    </form>
<?php else : ?>
    ไม่พบข้อมุล <a href="indexProduct.php">กลับสู่หน้ารายการสินค้า</a>
<?php endif; ?>
</body>
</html>