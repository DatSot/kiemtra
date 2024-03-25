<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
</head>
<body>
    <h1>Thêm Nhân Viên</h1>
    <form action="process_add_employee.php" method="post">
        <label for="employee_id">Mã Nhân Viên:</label><br>
        <input type="text" id="employee_id" name="employee_id" required><br>
        <!-- Thêm các trường thông tin khác của nhân viên -->
        <input type="submit" value="Thêm Nhân Viên">
    </form>
</body>
</html>
