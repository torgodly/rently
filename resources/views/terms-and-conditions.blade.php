<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>شروط وأحكام اجرلي</title>
    <link rel="stylesheet" href="{{asset('landing/car.css')}}"/>
    <link rel="stylesheet" href="{{asset('landing/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('landing/css/style.css')}}">
    <script src="https://kit.fontawesome.com/1910cb1e04.js"></script>
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
    <link
        rel="stylesheet"
        href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Cairo:wght@200..1000&display=swap"
        rel="stylesheet"
    />
    <style>
        /*Google fonts*/
        @import url("https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Cairo:wght@200..1000&display=swap");

        body {
            background-color: grey;
            direction: rtl;
            font-family: "Alexandria", sans-serif;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            scroll-padding-top: 2rem;
            list-style: none;
            text-decoration: none;
            font-family: "Alexandria", sans-serif;
        }

        :root {
            --main-color: #20c997;
            --second-color: #1c1c1c;
            --text-color: #110f0f;
            --gradient: linear-gradient(#1c1c1c);
        }

        /*custom scroll bar */
        html::-webkit-scrollbar {
            width: 0.5rem;
        }

        html::-webkit-scrollbar-track {
            background: transparent;
        }

        html::-webkit-scrollbar-thumb {
            background: var(--main-color);
            border-radius: 5rem;
        }

        section {
            padding: 50px 100px;
        }

        .terms-container {
            max-width: 800px;
            margin: 150px auto; /* Increased top margin to push down the card */
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .terms-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: var(--main-color);
            font-size: 2.5rem; /* Increased font size */
        }

        .terms-container ul {
            list-style-type: disc;
            margin-left: 30px;
            line-height: 1.8;
        }

        .terms-container li {
            margin-bottom: 10px;
            font-size: 1.2rem; /* Increased font size */
        }

        .terms-container p {
            text-align: justify;
            margin-bottom: 15px;
            font-size: 1.1rem; /* Increased font size */
        }
    </style>
</head>
<body>
<header class="header">
    <a href="/" class="logo">
        <img src="{{ asset('landing/img/Asset.svg') }}" width="150px" height="70px" alt="">
    </a>
    <nav class="navbar">
        <a href="/">الرئيسية</a>
        <a href="{{route('car-show')}}">السيارات</a>
        <a href="#about">عن اجرلي</a>
        <a href="#service">خدماتنا</a>
        <a href="#contact">تواصل معنا</a>
    </nav>
    <div class="icons">
{{--        <div class="fas fa-bars" id="menu-btn"></div>--}}
{{--        <div class="fas fa-search" id="search-btn"></div>--}}
{{--        <div class="fas fa-user" id="login-btn"></div>--}}
{{--        <div class="fas " id="cart-btn"></div>--}}
    </div>
    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="ابحث هنا...">
        <label for="search-box" class="fas fa-search"></label>
    </form>

</header>

<div class="terms-container">
    <h2>شروط وأحكام اجرلي</h2>
    <p>
        يرجى قراءة شروط وأحكام الاستخدام هذه بعناية قبل استخدام موقع الويب أو تطبيقاتنا أو خدماتنا.
    </p>
    <ul>
        <li>
            <strong>التسجيل والحساب:</strong>
            <p>
                يجب على جميع المستخدمين إنشاء حساب على اجرلي قبل استخدام خدماتنا. يجب أن تكون المعلومات المقدمة
                في أثناء التسجيل دقيقة وكاملة. أنت مسؤول عن الحفاظ على سرية بيانات تسجيل الدخول إلى حسابك
                ومسؤول عن جميع الأنشطة التي تحدث تحت حسابك.
            </p>
        </li>
        <li>
            <strong>حجز السيارات:</strong>
            <p>
                عند حجز سيارة على اجرلي، فإنك توافق على شروط وأحكام تأجير السيارات من الموردين. سيتم تزويدك
                بجميع التفاصيل ذات الصلة، بما في ذلك أسعار التأجير وشروط الاستخدام، قبل تأكيد الحجز.
            </p>
        </li>
        <li>
            <strong>الاستخدام المسؤول:</strong>
            <p>
                تلتزم اجرلي بضمان استخدام خدماتها بطريقة مسؤولة.  يمنع استخدام خدماتنا لأي غرض غير قانوني
                أو غير مشروع.
            </p>
        </li>
        <li>
            <strong>التأمين:</strong>
            <p>
                من المهم أن يكون لديك تأمين ساري المفعول أثناء استخدامك لخدمات اجرلي. سيتم تزويدك بجميع
                التفاصيل ذات الصلة حول التأمين من قبل الموردين.
            </p>
        </li>
        <li>
            <strong>الإلغاء والاسترداد:</strong>
            <p>
                قد يتم فرض رسوم على إلغاء الحجز. ستجد مزيدًا من المعلومات حول سياسة الإلغاء والاسترداد
                في شروط وأحكام تأجير السيارات من الموردين.
            </p>
        </li>
        <li>
            <strong>الضمانات:</strong>
            <p>
                يُقدم موقع اجرلي خدمات تأجير السيارات من موردين طرف ثالث. لا تتحمل اجرلي مسؤولية أي
                أضرار أو خسائر ناتجة عن استخدام خدمات الموردين.
            </p>
        </li>
        <li>
            <strong>التعديلات:</strong>
            <p>
                تحتفظ اجرلي بالحق في تعديل شروط وأحكام الاستخدام هذه في أي وقت. ستقوم بنشر أي تغييرات
                على موقعنا الإلكتروني.
            </p>
        </li>
        <li>
            <strong>القانون الساري:</strong>
            <p>
                تخضع شروط وأحكام الاستخدام هذه للقوانين السارية في ليبيا.
            </p>
        </li>
        <li>
            <strong>اتصال:</strong>
            <p>
                يمكنك التواصل مع اجرلي عبر البريد الإلكتروني info@rently.ly لأي استفسارات أو ملاحظات.
            </p>
        </li>
        <li>
            <strong>الموافقة:</strong>
            <p>
                باستخدام موقع اجرلي أو تطبيقاتنا أو خدماتنا، فإنك توافق على شروط وأحكام الاستخدام هذه.
            </p>
        </li>
    </ul>
</div>
<footer>
    <div class="row">
        <div class="col">
            <img src="{{asset('landing/img/Asset.svg')}}" width="125px" height="65px" alt="">
            <p>
                اجرليهو موقع يسمح للأشخاص بتأجير سيارات لفترة زمنية محددة عن طريق
                اختيار السيارة المناسبة واكمال عملية الحجز عبر الموقع.
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
<script src="{{asset('landing/js/script.js')}}"></script>
<script src="https://unpkg.com/scrollreveal"></script>
</body>
</html>
