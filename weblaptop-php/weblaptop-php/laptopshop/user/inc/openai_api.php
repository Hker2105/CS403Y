<?php
header("Content-Type: application/json; charset=UTF-8");

// Kết nối DB
require_once __DIR__ . "/../../admin/connect.php";

//Paste API_Key ở file Key API.md vào đây
$API_KEY = "";

// Nhận message từ frontend
$input = json_decode(file_get_contents("php://input"), true);
$messages = $input["messages"] ?? [];

// Lấy sản phẩm, rút gọn mô tả
$sql = "SELECT TenSP, DonGia FROM san_pham WHERE TrangThai = 1 LIMIT 20";
$result = mysqli_query($conn, $sql);

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = "- {$row['TenSP']} | Giá: " . number_format($row['DonGia']) . " VND";
}

$product_text = implode("\n", $products);

// System prompt SIÊU NGẮN GỌN
$system = "Bạn là nhân viên bán laptop của G5 LAPTOP tại Đà Nẵng.
Chỉ được tư vấn dựa trên danh sách sau:

$product_text

Không bịa thêm sản phẩm.";

// Gửi lên API với TOKENS NHỎ
$payload = [
    "model" => "llama-3.1-8b-instant",
    "messages" => array_merge([
        ["role" => "system", "content" => $system]
    ], $messages),
    "temperature" => 0.4,
    "max_tokens" => 300   // Giảm 700 → 300
];

$options = [
    "http" => [
        "method" => "POST",
        "header" =>
            "Content-Type: application/json\r\n" .
            "Authorization: Bearer $API_KEY\r\n",
        "content" => json_encode($payload),
        "ignore_errors" => true
    ]
];

// Gọi API
$res = file_get_contents("https://api.groq.com/openai/v1/chat/completions", false, stream_context_create($options));

if (!$res) {
    echo json_encode(["choices"=>[["message"=>["content"=>"❌ Không kết nối được Groq API"]]]]);
    exit;
}

$data = json_decode($res, true);

if (isset($data["error"])) {
    echo json_encode(["choices"=>[["message"=>["content"=>"❌ Lỗi API: ".$data["error"]["message"]]]]]);
    exit;
}

$reply = $data["choices"][0]["message"]["content"] ?? "⚠ AI không phản hồi";

echo json_encode([
    "choices" => [
        ["message" => ["content" => $reply]]
    ]
], JSON_UNESCAPED_UNICODE);
