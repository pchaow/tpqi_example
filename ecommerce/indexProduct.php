<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ecommerce");

$conn->set_charset("utf8");
$sql = "SELECT p.*,c.category_name FROM `products` as p join categories as c on p.category_id = c.category_id";
if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    $sql = $sql." where 1=1 "
        ." and (p.product_name like '%$keyword%' "
        ." or c.category_name like '%$keyword%' "
        ." or p.product_price = '%$keyword%')";
}

$result = $conn->query($sql);
print_r($result);
$rows = $result->fetch_all();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ระบบร้านขายของ</title>
</head>
<body>

<h1>รายการสินค้า</h1>

<form action="indexProduct.php" method="get">
    Keywords : <input type="text" name="keyword"/>
    <button type="submit">ค้นหา</button>
</form>

<a href="createProduct.php">สร้างรายการใหม่</a>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>ชื่อ</th>
        <th>ราคา</th>
        <th>หมวดหมู่</th>
        <th>การจัดการ</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $row) : ?>
        <tr>
            <td><?= @$row[0] ?></td>
            <td><?= @$row[1] ?></td>
            <td><?= @$row[2] ?></td>
            <td><?= @$row[4] ?></td>
            <td>
                <form action="actionDeleteProduct.php" method="post"
                      style="display: inline;"
                >
                    <input type="hidden" name="product_id" value="<?= @$row[0] ?>"/>
                    <button type="button" onclick="deleteItem(this)">ลบ</button>
                </form>
                <a href="editProduct.php?id=<?= @$row[0] ?>">
                    แก้ไข
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    function deleteItem(el) {
        form = el.parentElement;
        if (confirm("ลบไหม?")) {
            form.submit();
        }
    }
</script>
</body>
</html>