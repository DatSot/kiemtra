<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Nhân Viên</title>
</head>
<body>
    <h1>Sửa Thông Tin Nhân Viên</h1>
    <?php
    // Lấy ID của nhân viên từ URL
    $employee_id = $_GET["id"];

    // Kết nối đến cơ sở dữ liệu
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "ql_nhansu";
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Truy vấn để lấy thông tin của nhân viên dựa trên ID
    $sql = "SELECT * FROM employees WHERE id = $employee_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>
    <form action="edit_employee_process.php" method="post">
        <input type="hidden" name="employee_id" value="<?php echo $row['id']; ?>">
        Tên Nhân Viên: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        Giới Tính: <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br>
        Nơi Sinh: <input type="text" name="birthplace" value="<?php echo $row['birthplace']; ?>"><br>
        Tên Phòng: <input type="text" name="department" value="<?php echo $row['department']; ?>"><br>
        Lương: <input type="text" name="salary" value="<?php echo $row['salary']; ?>"><br>
        <input type="submit" name="edit_employee" value="Lưu">
    </form>
    <?php
    } else {
        echo "Không tìm thấy nhân viên.";
    }
    $conn->close();
    ?>
</body>
</html>
