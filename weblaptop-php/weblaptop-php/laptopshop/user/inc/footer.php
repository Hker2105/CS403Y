<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <a href="" class="text-decoration-none">
                <h1 class="mb-4 display-5 font-weight-semi-bold" style="color:#FF3333 "><span>G5 </span>LAPTOP</h1>
            </a>
            <p>Mọi thắc mắc xin vui lòng liên hệ:</p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>01 Nguyễn Văn Linh, Đà Nẵng</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>g5shoplaptop@gmail.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+84-35338478</p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">

                <div class="col-md-5 mb-5">
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="home.php"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                        <a class="text-dark mb-2" href="sanpham.php"><i class="fa fa-angle-right mr-2"></i>Sản phẩm</a>
                        <a class="text-dark mb-2" href="listcart.php"><i class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                        <a class="text-dark" href="" target="bank"><i class="fa fa-angle-right mr-2"></i>Liên hệ facebook</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4" style="color:#FF0000">Góp ý</h5>
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control border-0 py-4" placeholder="Tên của bạn" required="required" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control border-0 py-4" placeholder="Góp ý của bạn"
                                required="required" />
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block border-0 py-3" type="submit">Gửi góp ý</button>
                        </div>
                    </form>
                </div>
                <div class="row bg-secondary py-2 px-xl-5">

                    <div class="col-lg-6 text-center text-lg-right">
                        <div class="d-inline-flex align-items-center">

                            <h2><a class="text-dark px-2" href="" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a></h2>
                            <h1><a class="text-dark px-2" href="" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a></h1>
                            <h1><a class="text-dark pl-2" href="">
                                    <i class="fab fa-youtube"></i>
                                </a></h1>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-dark">
                &copy; <a class="text-dark font-weight-semi-bold" href="#">G5 LAPTOP</a>. Đã đăng ký Bản quyền. Thiết kế bởi
                <a class="text-dark font-weight-semi-bold" href="" target="blank">Group 8</a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="img/payments.png" alt="">
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


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

<!-- NÚT CHAT AI -->
<div id="ai-chat-btn">🤖</div>

<!-- KHUNG CHAT -->
<div id="ai-chat-box">
    <div id="ai-chat-header">
        <span>Chat Box AI</span>
        <button onclick="toggleAIChat()">✖</button>
    </div>

    <div id="ai-chat-content">
        <div class="ai-msg">Xin chào 👋 Tôi có thể giúp gì cho bạn?</div>
    </div>

    <div id="ai-chat-input">
        <input type="text" id="ai-input" placeholder="Nhập câu hỏi...">
        <button onclick="sendAI()">Gửi</button>
    </div>
</div>

<script>
    function toggleAIChat() {
        let box = document.getElementById("ai-chat-box");
        box.style.display = (box.style.display === "none" || box.style.display === "") ? "flex" : "none";
    }

    document.getElementById("ai-chat-btn").onclick = toggleAIChat;

    function sendAI() {
        let input = document.getElementById("ai-input");
        let msg = input.value.trim();
        if (msg === "") return;

        let chat = document.getElementById("ai-chat-content");

        let userDiv = document.createElement("div");
        userDiv.className = "user-msg";
        userDiv.innerText = msg;
        chat.appendChild(userDiv);

        let aiDiv = document.createElement("div");
        aiDiv.className = "ai-msg";
        aiDiv.innerText = "🤖 AI đang xử lý câu hỏi...";
        chat.appendChild(aiDiv);

        chat.scrollTop = chat.scrollHeight;
        input.value = "";
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