<?php

$conn = mysqli_connect('127.0.0.1', 'root', '', 'laptop', 3306);

mysqli_set_charset($conn, 'UTF8');
if (mysqli_connect_errno()) {
	echo "kết nối không thành công";
}
?>