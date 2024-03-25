<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Nhân Viên</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .pagination {
            margin-top: 20px;
        }
        .pagination a {
            padding: 8px 16px;
            text-decoration: none;
            color: black;
            border: 1px solid #ddd;
            margin: 0 4px;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>THÔNG TIN NHÂN VIÊN</h1>
    <table>
        <tr>
            <th>Mã Nhân Viên</th>
            <th>Tên Nhân Viên</th>
            <th>Giới Tính</th>
            <th>Nơi Sinh</th>
            <th>Tên Phòng</th>
            <th>Lương</th>
        </tr>
        <?php
        // Danh sách thông tin nhân viên
        $employees = [
            ["A01", "Nguyễn thị Hải", "Nữ", "Hà Nội", "Tài Chính", 600],
            ["A02", "Trần văn Chính", "Nam", "Bình Định", "Quản Trị", 500],
            ["A03", "Lê Trần bạch Yến", "Nữ", "TP HCM", "Tài Chính", 700],
            ["A04", "Trần anh Tuấn", "Nam", "Hà Nội", "Kỹ Thuật", 800],
            ["B01", "Trần thanh Mai", "Nữ", "Hải Phòng", "Tài Chính", 800],
            ["B02", "Trần thị thu Thủy", "Nữ", "TP HCM", "Kỹ Thuật", 700],
            ["B03", "Nguyễn Thị Nở", "Nữ", "Ninh Bình", "Kỹ Thuật", 400]
        ];

        // Số lượng nhân viên trên mỗi trang
        $employees_per_page = 5;

        // Xác định trang hiện tại
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        // Tính toán chỉ số bắt đầu và kết thúc của nhân viên trên trang hiện tại
        $start_index = ($current_page - 1) * $employees_per_page;
        $end_index = $start_index + $employees_per_page - 1;

        // Hiển thị thông tin nhân viên cho từng trang
        for ($i = $start_index; $i <= $end_index && $i < count($employees); $i++) {
            $employee = $employees[$i];
            echo "<tr>";
            echo "<td>{$employee[0]}</td>";
            echo "<td>{$employee[1]}</td>";
            echo "<td>";
            if ($employee[2] === "Nữ") {
                echo "<img src='img/woman.jpg' alt='Woman' style='width: 60px;'>";
            } else {
                echo "<img src='img/man.jpg' alt='Man' style='width: 60px;'>";
            }
            echo "</td>";
            echo "<td>{$employee[3]}</td>";
            echo "<td>{$employee[4]}</td>";
            echo "<td>{$employee[5]}</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <!-- Phân trang -->
    <div class="pagination">
        <?php
        // Tính toán số trang
        $total_pages = ceil(count($employees) / $employees_per_page);

        // Hiển thị các liên kết phân trang
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?page=$i'";
            if ($i == $current_page) {
                echo " class='active'";
            }
            echo ">$i</a>";
        }
        ?>
    </div>
</body>
</html>
