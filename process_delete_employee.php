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

    // Thực hiện truy vấn xóa nhân viên khỏi cơ sở dữ liệu
    $sql = "DELETE FROM employees WHERE employee_id='$employee_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Xóa nhân viên thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
