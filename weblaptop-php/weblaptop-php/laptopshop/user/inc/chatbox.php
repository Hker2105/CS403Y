<!-- NÚT CHAT AI -->
<div id="ai-chat-btn">
    <span style="font-size: 24px;">🤖</span>
    <span style="font-size: 14px; font-weight: bold; margin-left: 5px;">Chat AI</span>
</div>

<!-- KHUNG CHAT -->
<div id="ai-chat-box">
    <div id="ai-chat-header">
        <div>
            <span style="font-weight: bold; font-size: 16px;">🤖 G5 LAPTOP AI</span>
            <br>
            <small style="font-size: 11px; opacity: 0.8;">Tư vấn laptop chuyên nghiệp</small>
        </div>
        <button onclick="toggleAIChat()" style="background: transparent; border: none; color: white; font-size: 20px; cursor: pointer;">✖</button>
    </div>

    <div id="ai-chat-content">
        <div class="ai-msg">
            Xin chào 👋 Tôi là trợ lý tư vấn laptop của G5 LAPTOP.<br><br>
            Tôi có thể giúp bạn:<br>
            • Tìm laptop phù hợp<br>
            • So sánh cấu hình<br>
            • Tư vấn giá cả<br>
            • Giải đáp thắc mắc<br><br>
            Bạn cần tư vấn gì hôm nay?
        </div>
    </div>

    <div id="ai-chat-input">
        <input type="text" id="ai-input" placeholder="Nhập câu hỏi của bạn...">
        <button onclick="sendAI()">📤</button>
    </div>

    <div style="padding: 8px; text-align: center; font-size: 11px; color: #666; background: #f8f9fa;">
        📍 01 Nguyễn Văn Linh, Đà Nẵng • 📞 +84-35338478
    </div>
</div>

<!-- CSS CHO CHAT AI -->
<style>
    #ai-chat-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: linear-gradient(135deg, #FF3333, #CC0000);
        color: white;
        padding: 15px 25px;
        border-radius: 50px;
        cursor: pointer;
        box-shadow: 0 10px 30px rgba(255, 51, 51, 0.4);
        z-index: 9998;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        font-family: Arial, sans-serif;
    }

    #ai-chat-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 15px 40px rgba(255, 51, 51, 0.6);
    }

    #ai-chat-box {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 400px;
        height: 600px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        display: none;
        flex-direction: column;
        z-index: 9999;
        overflow: hidden;
        font-family: Arial, sans-serif;
    }

    #ai-chat-header {
        background: linear-gradient(135deg, #FF3333, #CC0000);
        color: white;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #ai-chat-content {
        flex: 1;
        overflow-y: auto;
        padding: 20px;
        background: #f8f9fa;
    }

    #ai-chat-content::-webkit-scrollbar {
        width: 6px;
    }

    #ai-chat-content::-webkit-scrollbar-thumb {
        background: #FF3333;
        border-radius: 3px;
    }

    /* make chat content a vertical flex container so align-self works */
    #ai-chat-content {
        display: flex;
        flex-direction: column;
        gap: 12px;
        padding: 20px;
        overflow-y: auto;
        box-sizing: border-box;
        /* ensure padding counted in width */
    }

    /* AI (bên trái) */
    .ai-msg {
        background: #fff;
        padding: 12px 16px;
        border-radius: 16px;
        border-bottom-left-radius: 6px;
        max-width: 75%;
        align-self: flex-start;
        display: block;
        line-height: 1.45;
        font-size: 14px;
        text-align: left;
        overflow-wrap: anywhere;
        word-break: break-word;
        white-space: normal;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    /* USER (bên phải) */
    .user-msg {
        background: linear-gradient(135deg, #FF3333, #CC0000);
        color: white;
        padding: 12px 16px;
        border-radius: 16px;
        border-bottom-right-radius: 6px;
        margin-left: auto;
        max-width: 75%;
        display: block;
        line-height: 1.45;
        font-size: 14px;
        text-align: left;
        overflow-wrap: anywhere;
        word-break: break-word;
        white-space: normal;
    }

    .ai-msg,
    .user-msg {
        white-space: normal;
        hyphens: auto;
    }

    #ai-chat-content {
        display: flex;
        flex-direction: column;
        gap: 12px;
        padding: 20px 28px 20px 20px;

        overflow-y: auto;
    }

    #ai-chat-box,
    #ai-chat-box * {
        box-sizing: border-box;
    }

    @media (max-width: 480px) {

        .ai-msg,
        .user-msg {
            max-width: 85%;
            font-size: 13px;
        }

        #ai-chat-content {
            padding-right: 18px;
        }
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .loading-dots {
        display: inline-flex;
        gap: 4px;
    }

    .loading-dots span {
        width: 8px;
        height: 8px;
        background: #999;
        border-radius: 50%;
        display: inline-block;
        animation: bounce 1.4s infinite;
    }

    .loading-dots span:nth-child(2) {
        animation-delay: 0.2s;
    }

    .loading-dots span:nth-child(3) {
        animation-delay: 0.4s;
    }

    @keyframes bounce {

        0%,
        60%,
        100% {
            transform: translateY(0);
        }

        30% {
            transform: translateY(-10px);
        }
    }

    #ai-chat-input {
        padding: 15px;
        background: white;
        border-top: 2px solid #f0f0f0;
        display: flex;
        gap: 10px;
    }

    #ai-chat-input input {
        flex: 1;
        padding: 12px 16px;
        border: 2px solid #e0e0e0;
        border-radius: 25px;
        outline: none;
        font-size: 14px;
        transition: border 0.3s;
    }

    #ai-chat-input input:focus {
        border-color: #FF3333;
    }

    #ai-chat-input button {
        background: linear-gradient(135deg, #FF3333, #CC0000);
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 18px;
        transition: all 0.3s;
    }

    #ai-chat-input button:hover {
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(255, 51, 51, 0.4);
    }

    #ai-chat-input button:disabled {
        background: #ccc;
        cursor: not-allowed;
        transform: none;
    }

    @media (max-width: 768px) {
        #ai-chat-box {
            width: 90%;
            height: 80%;
            bottom: 20px;
            right: 5%;
        }

        #ai-chat-btn {
            bottom: 20px;
            right: 20px;
            padding: 12px 20px;
        }
    }
</style>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>

<!-- JAVASCRIPT CHO CHAT AI -->
<script>
    let conversationHistory = [];
    let isProcessing = false;

    function toggleAIChat() {
        let box = document.getElementById("ai-chat-box");
        let btn = document.getElementById("ai-chat-btn");

        if (box.style.display === "none" || box.style.display === "") {
            box.style.display = "flex";
            btn.style.display = "none";
        } else {
            box.style.display = "none";
            btn.style.display = "flex";
        }
    }

    document.getElementById("ai-chat-btn").onclick = toggleAIChat;

    async function sendAI() {
        if (isProcessing) return;

        let input = document.getElementById("ai-input");
        let msg = input.value.trim();
        if (msg === "") return;

        let chat = document.getElementById("ai-chat-content");

        // Hiển thị tin nhắn người dùng
        let userDiv = document.createElement("div");
        userDiv.className = "user-msg";
        userDiv.innerText = msg;
        chat.appendChild(userDiv);

        // Hiển thị loading
        let loadingDiv = document.createElement("div");
        loadingDiv.className = "ai-msg";
        loadingDiv.id = "loading-msg";
        loadingDiv.innerHTML = '🤖 Đang xử lý <span class="loading-dots"><span></span><span></span><span></span></span>';
        chat.appendChild(loadingDiv);

        chat.scrollTop = chat.scrollHeight;
        input.value = "";
        input.disabled = true;
        isProcessing = true;

        // Thêm vào lịch sử hội thoại
        conversationHistory.push({
            role: "user",
            content: msg
        });

        try {
            // Gọi Claude API
            const response = await fetch("/weblaptop-php/weblaptop-php/laptopshop/user/inc/openai_api.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    messages: conversationHistory
                })
            });


            const data = await response.json();


            // Xóa loading
            document.getElementById("loading-msg").remove();


            let aiResponse = "Xin lỗi, AI không phản hồi.";

            if (data.choices && data.choices.length > 0 && data.choices[0].message) {
                aiResponse = data.choices[0].message.content;
            }

            // Hiển thị phản hồi AI
            let aiDiv = document.createElement("div");
            aiDiv.className = "ai-msg";
            aiDiv.innerHTML = aiResponse.replace(/\n/g, "<br>");
            chat.appendChild(aiDiv);

            // Lưu hội thoại
            conversationHistory.push({
                role: "assistant",
                content: aiResponse
            });

        } catch (error) {
            console.error("Lỗi:", error);

            // Xóa loading nếu còn
            let loadingMsg = document.getElementById("loading-msg");
            if (loadingMsg) loadingMsg.remove();

            // Hiển thị thông báo lỗi
            let errorDiv = document.createElement("div");
            errorDiv.className = "ai-msg";
            errorDiv.innerHTML = '😔 Xin lỗi, có lỗi xảy ra. Vui lòng thử lại hoặc liên hệ trực tiếp:<br><br>📞 +84-35338478<br>📧 g5shoplaptop@gmail.com';
            chat.appendChild(errorDiv);
        } finally {
            chat.scrollTop = chat.scrollHeight;
            input.disabled = false;
            input.focus();
            isProcessing = false;
        }
    }

    document.getElementById("ai-input").addEventListener("keydown", function(e) {
        if (e.key === "Enter") {
            e.preventDefault();
            sendAI();
        }
    });
</script>

</body>

</html>