<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ecommerce");

$conn->set_charset("utf8");

$result = $conn->query("select * from categories");
$data = $result->fetch_all();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ระบบร้านขายของ</title>
</head>
<body>

<h1>รายการหมวดหมู่สินค้า</h1>

<a href="create.php">สร้างรายการใหม่</a>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>ชื่อรายการหมวดหมุ่</th>
        <th>คำอธิบาย</th>
        <th>การจัดการ</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $category) : ?>
        <tr>
            <td><?= @$category[0] ?></td>
            <td><?= @$category[1] ?></td>
            <td><?= @$category[2] ?></td>
            <td>
                <form action="actionDelete.php" method="post"
                      style="display: inline;"
                >
                    <input type="hidden" name="category_id" value="<?= @$category[0] ?>"/>
                    <button type="button" onclick="deleteItem(this)">ลบ</button>
                </form>
                <a href="edit.php?id=<?= @$category[0] ?>">
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