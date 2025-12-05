<?php
header("Content-Type: application/json");


$API_KEY = "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";

$input = json_decode(file_get_contents("php://input"), true) ?? [];
$messages = $input["messages"] ?? [];

$system = "Bạn là nhân viên bán laptop của G5 LAPTOP tại Đà Nẵng (tiếng Việt).
Gợi ý 2-3 mẫu theo ngân sách, giải thích ngắn gọn, không trả lời rỗng.";

$payload = [
  "model" => "llama-3.1-8b-instant",
  "messages" => array_merge([["role"=>"system","content"=>$system]], $messages),
  "temperature" => 0.7,
  "max_tokens" => 700
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

$res = file_get_contents("https://api.groq.com/openai/v1/chat/completions", false, stream_context_create($options));
if ($res === false) {
  echo json_encode(["choices"=>[["message"=>["content"=>"Không kết nối được Groq"]]]], JSON_UNESCAPED_UNICODE);
  exit;
}

$data = json_decode($res, true);

$reply = $data["choices"][0]["message"]["content"] ?? "AI không phản hồi";

echo json_encode([
  "choices" => [
    ["message" => ["content" => $reply]]
  ]
], JSON_UNESCAPED_UNICODE);
