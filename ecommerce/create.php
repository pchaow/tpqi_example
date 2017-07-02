<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ecommerce");

$conn->set_charset("utf8");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ระบบร้านขายของ</title>
</head>
<body>

<h1>สร้างรายการใหม่</h1>

<form action="actionCreate.php" method="post">
    <label>name</label> :
    <input name="category_name" type="text"/> <br/><br/>

    <label>description</label> :
    <textarea name="category_desc"></textarea> <br/>

    <button type="submit">เพิ่ม</button>
</form>

</body>
</html>