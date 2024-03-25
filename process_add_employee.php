<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("127.0.0.1", "root", "", "ql_nhansu");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Xử lý thông tin nhập từ biểu mẫu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST["employee_id"];
    // Lấy các trường thông tin khác của nhân viên từ biểu mẫu và thêm vào câu truy vấn

    // Thực hiện truy vấn thêm nhân viên vào cơ sở dữ liệu
    $sql = "INSERT INTO employees (employee_id, ...) VALUES ('$employee_id', ...)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Thêm nhân viên thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
