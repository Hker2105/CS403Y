<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "laptop", 3306);

if (!$conn) {
    die("❌ KẾT NỐI DATABASE THẤT BẠI: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");
