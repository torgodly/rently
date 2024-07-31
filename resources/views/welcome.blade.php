<x-app-layout>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid">
            <!-- Login and Register Buttons (Left) -->
            <div class="d-flex align-items-center">
                <a href="/user/register" class="btn btn-custom mr-3"
                   style="background-color: #17a2b8; color: white;">إنشاء حساب</a>
                <a href="/user/login" class="btn btn-custom" style="background-color: #20c997; color: white;">تسجيل
                    الدخول</a>
            </div>

            <!-- Navbar Brand (Right) -->


            <div class="collapse navbar-collapse" id="ftco-nav">
                <!-- Navigation Items (Center) -->
                <ul class="navbar-nav mx-auto" dir="rtl">
                    <li class="nav-item"><a href="#hero" class="nav-link">الرئيسية</a></li>
                    <li class="nav-item"><a href="#cars" class="nav-link">السيارات</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link">عنّا</a></li>
                    <li class="nav-item"><a href="#services" class="nav-link">الخدمات</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">تواصل معنا</a></li>
                </ul>
            </div>
            <script>
                // Function to update the active class based on the current fragment
                function updateActiveNav() {
                    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
                    const currentFragment = window.location.hash;

                    navLinks.forEach(link => {
                        const parentLi = link.parentElement;

                        if (link.getAttribute('href') === currentFragment) {
                            parentLi.classList.add('active');
                        } else {
                            parentLi.classList.remove('active');
                        }
                    });
                }

                // Update active class on page load
                window.addEventListener('load', updateActiveNav);

                // Update active class when the hash changes
                window.addEventListener('hashchange', updateActiveNav);
            </script>
            <a class="navbar-brand" href="#hero"><img src="{{asset('images/logo.png')}}" width="100"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="تبديل التنقل">
                <span class="oi oi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- END nav -->

    <div id="hero" class="hero-wrap ftco-degree-bg"
         style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4">موقع أجّرلي لإيجار السيارات</h1>
                        <p style="font-size: 18px;"> نرحب بكم في موقعنا لتأجير السيارات، حيث نقدم لكم
                            تجربة سهلة وسلسة وموثوقة لاستئجار السيارة المثالية لاحتياجاتكم.
                            يوفر موقعنا الإلكتروني طريقة مريحة للعثور على السيارة التي تناسبكم
                            من بين مجموعة واسعة من السيارات الحديثة وبتشكيلة متنوعة من الطرازات
                            والأحجام. </p>
                        <a href="https://vimeo.com/45830194"
                           class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="ion-ios-play"></span>
                            </div>
                            <div class="heading-title ml-5">
                                <span>خطوات سهلة لاستئجار سيارة</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12 featured-top">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center">
                            <form action="#" class="request-form ftco-animate bg-primary">
                                <h2>خطط لرحلتك</h2>
                                <div class="form-group">
                                    <label for="" class="label">مكان الاستلام</label>
                                    <input type="text" class="form-control" placeholder="مدينة، مطار، محطة، إلخ">
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">مكان التوصيل</label>
                                    <input type="text" class="form-control" placeholder="مدينة، مطار، محطة، إلخ">
                                </div>
                                <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <label for="" class="label">تاريخ الاستلام</label>
                                        <input type="text" class="form-control" id="book_pick_date"
                                               placeholder="تاريخ">
                                    </div>
                                    <div class="form-group ml-2">
                                        <label for="" class="label">تاريخ التوصيل</label>
                                        <input type="text" class="form-control" id="book_off_date"
                                               placeholder="تاريخ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">وقت الاستلام</label>
                                    <input type="text" class="form-control" id="time_pick" placeholder="وقت">
                                </div>
                                <div class="form-group">

                                    <a href="/user/login" class="btn btn-secondary py-3 px-4">استأجر سيارة الآن</a>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                            <div class="services-wrap rounded-right w-100">
                                <h3 class="heading-section mb-4">طريقة أفضل لاستئجار سيارتك المثالية</h3>
                                <div class="row d-flex mb-4">
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-route"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">اختر مكان الاستلام</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-handshake"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">خدمة عملاء مميزة</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-rent"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">حجز سريع ومريح</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p><a href="/user/cars" class="btn btn-primary py-3 px-4">احجز سيارتك المثالية</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="cars" class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">ما نقدمه</span>
                    <h2 class="mb-2">المركبات المميزة</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-car owl-carousel">
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end"
                                     style="background-image: url('{{ asset('images/car-1.jpg') }}');">
                                    <div class="car-overlay"></div>
                                </div>
                                <div class="text">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h2 class="mb-0"><a href="#">مرسيدس جراند سيدان</a></h2>
                                        <div class="rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <span class="cat">شيفروليه</span>
                                        <p class="price ml-auto">$500 <span>/يوم</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block">
                                        <a href="#" class="btn btn-primary py-2 mr-1">احجز
                                            الآن</a>
                                        <a href="#" class="btn btn-secondary py-2 ml-1">التفاصيل</a>
                                        <button class="btn btn-light border ml-1"><i class="fa fa-heart"></i></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section id="about" class="ftco-section ftco-about" dir="rtl">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center rounded"
                     style="background-image: url('{{ asset('images/about.svg') }}');">
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
                    <div class="heading-section heading-section-white pr-md-5">
                        <span class="subheading">معلومات عنا</span>
                        <h2 class="mb-4">مرحبًا بكم في Rently</h2>


                        <p> تأسست شركتنا بهدف توفير خدمات تأجير سيارات عالية الجودة، ونلتزم بتقديم
                            تجربة استثنائية لعملائنا الكرام. نحن نتميز بتقديم مجموعة واسعة من السيارات
                            الحديثة التي تلبي جميع الاحتياجات، بالإضافة إلى أسعارنا التنافسية وخدمة
                            العملاء المتميزة. </p>
                        <p> نؤمن بأن رضا عملائنا هو سر نجاحنا، ولذلك نسعى جاهدين لتقديم خدمات تتجاوز
                            توقعاتهم. </p>
                        <p><a href="#" class="btn btn-primary py-3 px-4">ابحث عن مركبة</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">الخدمات</span>
                    <h2 class="mb-3">أحدث خدماتنا</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-wedding-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">سيارات زفاف</h3>
                            <p> نوفر باقة متنوعة من السيارات الفاخرة لحفلات الزفاف </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-transportation"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">التنقل داخل المدينة</h3>
                            <p> يمكنك استئجار سيارة للتنقل داخل المدينة بسهولة ويسر</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">نقل من المطار</h3>
                            <p> نوفر خدمة النقل من وإلى المطار </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-transportation"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">جولة في المدينة</h3>
                            <p> استكشف المدينة من خلال خدمة جولاتنا السياحية بسياراتنا المريحة </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">لماذا تختارنا؟</span>
                    <h2 class="mb-3">مميزاتنا</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                    <div class="services-1 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-route"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">خيارات متعددة</h3>
                            <p>نوفر مجموعة واسعة من السيارات لتناسب احتياجاتك.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                    <div class="services-1 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-handshake"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">خدمة عملاء</h3>
                            <p>خدمة عملاء متميزة على مدار الساعة.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                    <div class="services-1 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-rent"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">أسعار تنافسية</h3>
                            <p>نقدم أفضل الأسعار في السوق.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-counter ftco-section img bg-light" id="section-counter">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="60">0</strong>
                            <span>سنوات <br>الخبرة</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="1090">0</strong>
                            <span>إجمالي <br>السيارات</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="2590">0</strong>
                            <span>العملاء <br>السعداء</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text d-flex align-items-center">
                            <strong class="number" data-number="67">0</strong>
                            <span>إجمالي <br>الفروع</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-4">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="border w-100 p-4 rounded mb-2 d-flex">
                                <div class="icon mr-3">
                                    <span class="icon-map-o"></span>
                                </div>
                                <p><span>العنوان:</span> 198 شارع 21 الغرب، جناح 721 نيويورك NY 10016</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border w-100 p-4 rounded mb-2 d-flex">
                                <div class="icon mr-3">
                                    <span class="icon-mobile-phone"></span>
                                </div>
                                <p><span>الهاتف:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border w-100 p-4 rounded mb-2 d-flex">
                                <div class="icon mr-3">
                                    <span class="icon-envelope-o"></span>
                                </div>
                                <p><span>البريد الإلكتروني:</span> <a
                                        href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 block-9 mb-md-5">
                    <!-- Flash Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Display Validation Errors -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('message.create') }}" method="POST"
                          class="bg-light p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="اسمك"
                                   value="{{ old('name') }}">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="بريدك الإلكتروني"
                                   value="{{ old('email') }}">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="الموضوع"
                                   value="{{ old('subject') }}">
                            @error('subject')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control"
                                      placeholder="رسالتك">{{ old('message') }}</textarea>
                            @error('message')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="إرسال الرسالة" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="#" class="logo"><img src="{{asset('images/logo.png')}}"></a>
                        </h2>
                        <p> نسعى لأن نكون وجهتك الأولى لاستئجار السيارات، ونقدم لك تجربة سهلة وسلسة
                            لاختيار سيارتك </p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">معلومات</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">حول</a></li>
                            <li><a href="#" class="py-2 d-block">خدمات</a></li>
                            <li><a href="#" class="py-2 d-block">الشروط والأحكام</a></li>
                            <li><a href="#" class="py-2 d-block">أفضل ضمان سعر</a></li>
                            <li><a href="#" class="py-2 d-block">سياسة الخصوصية وملفات تعريف الارتباط</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">دعم العملاء</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">التعليمات</a></li>
                            <li><a href="#" class="py-2 d-block">خيار الدفع</a></li>
                            <li><a href="#" class="py-2 d-block">نصائح الحجز</a></li>
                            <li><a href="#" class="py-2 d-block">كيف تعمل</a></li>
                            <li><a href="#" class="py-2 d-block">اتصل بنا</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">هل لديك أسئلة؟</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 شارع
                                        زائف ، ماونتن فيو ، سان فرانسيسكو ، كاليفورنيا ، الولايات المتحدة
                                        الأمريكية</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392
                                            3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" dir="auto">
                <div class="col-md-12 text-center">
                    <p>
                        حقوق الطبع والنشر ©{{now()->year}} جميع الحقوق محفوظة | هذا القالب
                        مصنوع بحب <i class="icon-heart color-danger" aria-hidden="true"></i> بواسطة <a
                            href="#hero" target="_blank">Rently</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                    stroke="#F96D00"/>
        </svg>
    </div>

</x-app-layout>
