<?php
// Kiểm tra nếu có yêu cầu sửa nhân viên
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_employee"])) {
    // Lấy thông tin được gửi từ biểu mẫu
    $employee_id = $_POST["employee_id"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $birthplace = $_POST["birthplace"];
    $department = $_POST["department"];
    $salary = $_POST["salary"];

    // Kết nối đến cơ sở dữ liệu
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "ql_nhansu";
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Cập nhật thông tin của nhân viên trong cơ sở dữ liệu
    $sql = "UPDATE employees SET name='$name', gender='$gender', birthplace='$birthplace', department='$department', salary='$salary' WHERE id=$employee_id";
    if ($conn->query($sql) === TRUE) {
        echo "Thông tin nhân viên đã được cập nhật thành công.";
    } else {
        echo "Lỗi: " . $conn->error;
    }

    $conn->close();
}
?>
