<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Car Rental Website</title>
    <!--Link to css-->

    <link rel="stylesheet" href="{{asset('landing/car.css')}}"/>
    <link rel="stylesheet" href="{{asset('landing/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('landing/css/style.css')}}">
    <script src="https://kit.fontawesome.com/1910cb1e04.js"></script>
    <!--Box icons-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
    <link rel='stylesheet'
          href='https://cdn-uicons.flaticon.com/2.2.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet'
          href='https://cdn-uicons.flaticon.com/2.2.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet'
          href='https://cdn-uicons.flaticon.com/2.2.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <!-- for icons  -->
    <link
        rel="stylesheet"
        href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->


    <!-- google  fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Cairo:wght@200..1000&display=swap"
        rel="stylesheet"
    />
</head>
<body>
<header class="header">

    <a href="/" class="logo"> <img src="{{ asset('landing/img/Asset.svg') }}" width="150px" height="70px" alt=""> </a>

    <nav class="navbar">
        <a href="/">الرئيسية</a>
        <a href="{{route('car-show')}}">السيارات</a>
        <a href="#about">عن اجرلي</a>
        <a href="#service">خدماتنا</a>
        <a href="#contact">تواصل معنا</a>
    </nav>




    <div style="display: flex; align-items: center; gap: 5px">  <!-- Wrap the links in a div to control spacing -->
        <a href="{{ route('login') }}" style="background-color: var(--main-color); color: #fff; padding: 10px 20px; border: none; border-radius: 6px; text-decoration: none; font-size: 16px;">تسجيل الدخول</a>
        <a href="{{ route('register') }}" style="background-color: #221f1f; color: #fff; padding: 10px 20px; border: none; border-radius: 6px; text-decoration: none; font-size: 16px;">إنشاء حساب</a>
    </div>

</header>


{{ $slot }}

<footer>
    <div class="row">
        <div class="col">
            <img src="{{asset('landing/img/Asset.svg')}}" width="125px" height="65px" alt="">
            <p>
                أجَرلي  هو موقع ومنظومة إلكترونية  تجمع بين المسؤولين ومدراء الفروع والعملاء بشكل فعال،
                موفرة خدمات مريحة وموثوقة تجعل عملية الحجز وتأجير السيارات أمرًا سهلاً وممتعًا للجميع.
            </p>
        </div>

        <div class="col">
            <h3>
                اتصل بنا
                <div class="underline"><span></span></div>
            </h3>
            <p>طرابلس، ليبيا</p>
            <p class="email-id">info@rantly.ly</p>
            <h4>218911111111</h4>
        </div>

        <div class="col">
            <h3>
                روابط سريعة
                <div class="underline"><span></span></div>
            </h3>
            <ul>
                <li><a href="/">الرئيسية</a></li>
                <li><a href="#about">عن اجرلي</a></li>
                <li><a href="#service">الخدمات</a></li>
                <li><a href="#contact">اتصل بنا</a></li>
                <li><a href="info@rently.ly">البريد الإلكتروني</a></li>
            </ul>
        </div>

        <div class="col">
            <h3>
                Newsletter
                <div class="underline"><span></span></div>
            </h3>
            <form>
                <i class="fa-regular fa-envelope"></i>
                <input type="email" placeholder=" example@gmail.com" required/>
                <button type="submit">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>
            <div class="social-icons">
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
        </div>
    </div>
    <hr/>
    <p class="copyright">جميع الحقوق محفوظة © {{now()->year}} اجرلي</p>
</footer>


<!--Link to js-->
<script src="{{asset('landing/main.js')}}"></script>

<script>
    function myMenuFunction() {
        var i = document.getElementById("navMenu");
        if (i.className === "nav-menu") {
            i.className += " responsive";
        } else {
            i.className = "nav-menu";
        }
    }
</script>
<script>
    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }

    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="{{asset('landing/js/script.js')}}"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script></script>
</body>
</html>
