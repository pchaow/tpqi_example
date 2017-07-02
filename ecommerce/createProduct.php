<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ecommerce");

$conn->set_charset("utf8");

$result = $conn->query("select * from categories");
$rows = $result->fetch_all();
//print_r($rows);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ระบบร้านขายของ</title>
</head>
<body>

<h1>สร้างรายการใหม่</h1>

<form action="actionCreateProduct.php" method="post">
    <label>name</label> :
    <input name="product_name" type="text"/> <br/><br/>

    <label>price</label> :
    <input name="product_price" type="number"/> <br/><br/>

    <label>หมวดหมู่</label>
    <select name="category_id">
        <?php foreach ($rows as $row) : ?>

        <option value="<?=@$row[0]?>"><?=@$row[1]?></option>
        <?php endforeach?>
    </select>

    <button type="submit">เพิ่ม</button>
</form>

</body>
</html>