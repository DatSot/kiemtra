<?php
session_start();

// Kết nối đến cơ sở dữ liệu
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "ql_nhansu";

$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Xử lý thông tin đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Truy vấn kiểm tra thông tin đăng nhập
    $stmt = $conn->prepare("SELECT id, username, password, fullname, email, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Lấy thông tin người dùng từ kết quả truy vấn
        $user = $result->fetch_assoc();

        // Kiểm tra mật khẩu
        if (password_verify($password, $user['password'])) {
            // Đăng nhập thành công
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $user['username'];
            $_SESSION["role"] = $user['role'];
            header("location: dashboard.php");
            exit;
        } else {
            // Đăng nhập thất bại - mật khẩu không đúng
            $_SESSION['login_error'] = "Tên đăng nhập hoặc mật khẩu không đúng.";
            header("location: login.php");
            exit;
        }
    } else {
        // Đăng nhập thất bại - không tìm thấy người dùng
        $_SESSION['login_error'] = "Tên đăng nhập hoặc mật khẩu không đúng.";
        header("location: login.php");
        exit;
    }
}

$conn->close();
?>