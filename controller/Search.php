<?php
require_once '../config/db.php';

// Lấy các thông tin từ form
$district = isset($_GET['district']) ? $_GET['district'] : '';
$propertyType = isset($_GET['propertyType']) ? $_GET['propertyType'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
$area = isset($_GET['area']) ? $_GET['area'] : '';

// Xây dựng câu truy vấn
$query = "SELECT p.*, l.district
            FROM properties p
            JOIN locations l ON p.property_id = l.property_id
            WHERE 1 = 1";

// Tìm kiếm theo loại bất động sản
if (!empty($propertyType)) {
    $query .= " AND p.type_id = $propertyType";
}

// Tìm kiếm theo quận (nếu có giá trị)
if (!empty($district)) {
    $query .= " AND l.district = '$district'";
}

// Tìm kiếm theo giá
if (!empty($price)) {
    $query .= " AND p.price $price";
}

// Tìm kiếm theo diện tích
if (!empty($area)) {
    $query .= " AND p.real_area $area";
}

try {
    // Tạo đối tượng kết nối
    $connection = new connect();

    // Lấy kết nối đến cơ sở dữ liệu
    $pdo = $connection->getConnection();

    // Thực hiện truy vấn và xử lý kết quả
    $stmt = $pdo->query($query);

    // Hiển thị danh sách thông tin các bất động sản
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row['property_id'] . "<br>";
        echo "Tên: " . $row['property_name'] . "<br>";
        echo "Thành phố: " . $row['district'] . "<br>";
        echo "Loại bất động sản: " . $row['type_id'] . "<br>";
        echo "Diện tích: " . $row['real_area'] . "<br>";
        echo "Giá: " . $row['price'] . "<br>";
        echo "---------------------------------------<br>";
    }
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage();
}
