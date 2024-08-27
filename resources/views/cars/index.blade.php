<x-app-layout>
    <!--header  -->
    <header class="header">

        <a href="" class="logo"> <img src="../img/logohome&footer-01.png" width="125px" height="65px" alt=""> </a>

        <nav class="navbar">
            <a href="#home">الرئيسية</a>
            <a href="#features">التواصل</a>
            <a href="#products">السيارات</a>
            <a href="#categories">الحجز</a>
            <a href="#review">الانواع</a>
            <a href="#blogs">خدماتنا</a>
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-user" id="login-btn"></div>
            <div class="fas " id="cart-btn"></div>

        </div>

        <form action="" class="search-form">
            <input type="search" id="search-box" placeholder="ابحث هنا...">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <!-- <div class="shopping-cart">
              <div class="box">
                  <i class="fas fa-trash"></i>
                  <img src="image/cart-img-1.png" alt="">
                  <div class="content">
                      <h3>watermelon</h3>
                      <span class="price">$4.99/-</span>
                      <span class="quantity">qty : 1</span>
                  </div>
              </div>
              <div class="box">
                  <i class="fas fa-trash"></i>
                  <img src="image/cart-img-2.png" alt="">
                  <div class="content">
                      <h3>onion</h3>
                      <span class="price">$4.99/-</span>
                      <span class="quantity">qty : 1</span>
                  </div>
              </div>
              <div class="box">
                  <i class="fas fa-trash"></i>
                  <img src="image/cart-img-3.png" alt="">
                  <div class="content">
                      <h3>chicken</h3>
                      <span class="price">$4.99/-</span>
                      <span class="quantity">qty : 1</span>
                  </div>
              </div>
              <div class="total"> total : $19.69/- </div>
              <a href="#" class="btn">checkout</a>
          </div>-->

        <form action="" class="login-form">
            <h3>تسجيل الدخول </h3>
            <input type="email" placeholder="البريد الالكتروني " class="box">
            <input type="password" placeholder="كلمة السر" class="box">
            <p>نسيت كلمة المرور<a href="#">اضغط هنا</a></p>
            <p>ليس لديك حساب <a href="#">انشاء جديد</a></p>
            <input type="submit" value="تسجيل الدخول " class="btn">
        </form>

    </header>
    <!--Home-->
    <section class="home1" id="home1">
        <div class="image-over">
            <div class="text">
                <h1>
                    تصنيف السيارات المتاحة للإيجار</h1>
            </div>
        </div>
    </section>

    <section class="services" id="services">
        <div class="wrapper">

            <div class="container">

                <div class="filter-btns">
                    <button type="button" class="filter-btn" id="all">
                        كل السيارات
                    </button>
                    <button type="button" class="filter-btn" id="mid">
                        سيارات متوسطة الحجم
                    </button>
                    <button type="button" class="filter-btn" id="full">
                        سيارات كاملة الحجم
                    </button>
                    <button type="button" class="filter-btn" id="Luxury">
                        السيارات الفاخرة
                    </button>
                    <button type="button" class="filter-btn" id="SUV">
                        سيارات الدفع الرباعي
                    </button>
                </div>
                <!--كل السيارات  -->
                <!--سيارات متوسطة الحجم-->
                <div class="filter-items">
                    <div class="filter-item all mid">
                        <div class="item-img">
                            <img
                                src="../img/2020_hyundai_sonata_sedan_limited_dfq_evox_1_1280x855.jpg"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Hyundai Sonata 2020</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href=" #" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>
                        </div>
                    </div>

                    <div class="filter-item all mid">
                        <div class="item-img">
                            <img
                                src="../img/4f619b32-bba5-41ba-beac-4f5f97126833.webp"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Hyundai Sonata 2022</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all mid">
                        <div class="item-img">
                            <img src="../img/2020 Honda Accord.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Honda Accord 2020</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all mid">
                        <div class="item-img">
                            <img src="../img/2022 Honda Accord.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Honda Accord 2022</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all mid">
                        <div class="item-img">
                            <img src="../img/2023 Honda Accord.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Honda Accord 2023</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all mid">
                        <div class="item-img">
                            <img src="../img/Toyota Camry2020.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Toyota Camry 2020</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all mid">
                        <div class="item-img">
                            <img
                                src="../img/2021_toyota_camry_sedan_xse_fqh_evox_1_1280x855.avif"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Toyota Camry 2021</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all mid">
                        <div class="item-img">
                            <img
                                src="../img/Chevrolet Malibu 2022.webp"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Chevrolet Malibu 2022</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all mid">
                        <div class="item-img">
                            <img
                                src="../img/2023-chevrolet-malibu-lt-sedan-angular-front.avif"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Chevrolet Malibu 2023</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all mid">
                        <div class="item-img">
                            <img
                                src="../img/2022_nissan_altima_sedan_25-s_tds_btl_evox_5_1280x855.avif"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Nissan Altima Sedan 2022</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all mid">
                        <div class="item-img">
                            <img
                                src="../img/2023_nissan_altima_sedan_25-sl_tds_evox_2_1280x855.jpg"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Nissan Altima Sedan 2023</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all mid">
                        <div class="item-img">
                            <img
                                src="../img/2024_nissan_altima_sedan_25-sr_tds4_izmo_1_1280x855.avif"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Nissan Altima Sedan 2024</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>
                </div>

                <!--سيارات كاملة الحجم-->
                <div class="filter-items">
                    <div class="filter-item all full">
                        <div class="item-img">
                            <img
                                src="../img/Chevrolet Impala2017.webp"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Chevrolet Impala 2017</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all full">
                        <div class="item-img">
                            <img
                                src="../img/Chevrolet Impala2019.webp"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Chevrolet Impala 2019</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all full">
                        <div class="item-img">
                            <img src="../img/Ford Taurus2015.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Ford Taurus 2015</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all full">
                        <div class="item-img">
                            <img src="../img/Ford Taurus2019.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Ford Taurus 2019</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all full">
                        <div class="item-img">
                            <img src="../img/Toyota Avalon2018.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Toyota Avalon 2018</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all full">
                        <div class="item-img">
                            <img src="../img/Chrysler-300 2013.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Chrysler-300 2013</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all full">
                        <div class="item-img">
                            <img src="../img/Chrysler -300 2017.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Chrysler-300 2017</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all full">
                        <div class="item-img">
                            <img src="../img/Toyota Avalon2022.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Toyota Avalon 2022</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all full">
                        <div class="item-img">
                            <img src="../img/Dodge Charger2019.jpg" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Dodge Charger 2019</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all full">
                        <div class="item-img">
                            <img src="../img/Dodge Charger2014.jpg" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Dodge Charger 2014</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all full">
                        <div class="item-img">
                            <img src="../img/Buick LaCrosse2019.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Buick LaCrosse 2019</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all full">
                        <div class="item-img">
                            <img src="../img/Buick LaCrosse2016.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Buick LaCrosse 2016</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>
                </div>
                <!--السيارات الفاخرة  -->

                <div class="filter-items">
                    <div class="filter-item all Luxury">
                        <div class="item-img">
                            <img src="../img/BMW X5 M.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>BMW X5 M</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all Luxury">
                        <div class="item-img">
                            <img src="../img/BMW 5 Series.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>BMW 5 Series</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all Luxury">
                        <div class="item-img">
                            <img src="../img/BMW X6.jpg" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>BMW X6</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all Luxury">
                        <div class="item-img">
                            <img
                                src="../img/Mercedes-Benz E-Class2022.webp"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Mercedes-Benz E-Class 2022</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all Luxury">
                        <div class="item-img">
                            <img
                                src="../img/Mercedes-Benz E-Class2023.webp"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Mercedes-Benz E-Class 2023</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all Luxury">
                        <div class="item-img">
                            <img src="../img/Audi A6 2019.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Audi A6 2019</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all Luxury">
                        <div class="item-img">
                            <img src="../img/Audi A6 2023.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Audi A6 2023</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all Luxury">
                        <div class="item-img">
                            <img src="../img/Lexus LS 2017.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Lexus LS 2017</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all Luxury">
                        <div class="item-img">
                            <img src="../img/Lexus LS 2018.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Lexus LS 2018</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all Luxury">
                        <div class="item-img">
                            <img src="../img/Jaguar XJ 2014.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Jaguar XJ 2014</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all Luxury">
                        <div class="item-img">
                            <img src="../img/Jaguar XJ 2019.webp" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Jaguar XJ 2019</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all Luxury">
                        <div class="item-img">
                            <img
                                src="../img/Mercedes-Benz C-Class.webp"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Mercedes-Benz C-Class</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>
                </div>

                <!--سيارات الدفع الرباعي   -->
                <div class="filter-items">
                    <div class="filter-item all SUV">
                        <div class="item-img">
                            <img src="../img/Sorento 2023.png" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>KIA Sorento 2023</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all SUV">
                        <div class="item-img">
                            <img
                                src="../img/2022-kia-seltos-sx-4wd-suv-angular-front.avif"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>KIA seltos 2022</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all SUV">
                        <div class="item-img">
                            <img src="../img/Kia Sportage2021.avif" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>KIA Sportage 2021</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all SUV">
                        <div class="item-img">
                            <img src="../img/Kia Telluride2022.avif" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>KIA Telluride 2022</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all SUV">
                        <div class="item-img">
                            <img
                                src="../img/Toyota RAV4 Hybrid2021.avif"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Toyota RAV4 Hybrid 2021</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all SUV">
                        <div class="item-img">
                            <img src="../img/Toyota 4Runner2022.avif" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Toyota 4Runner 2022</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all SUV">
                        <div class="item-img">
                            <img
                                src="../img/Toyota Land Cruiser2020.avif"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p></p>
                            <p>Toyota Land Cruiser 2020</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all SUV">
                        <div class="item-img">
                            <img src="../img/Toyota Venza 2021.avif" alt="Item image" />
                        </div>
                        <div class="item-info">
                            <p>Toyota Venza 2021</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all SUV">
                        <div class="item-img">
                            <img
                                src="../img/Hyundai Santa Fe2021.avif"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Hyundai Santa Fe 2021</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all SUV">
                        <div class="item-img">
                            <img
                                src="../img/Hyundai Santa Fe2019.webp"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Hyundai Santa Fe 2019</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all SUV">
                        <div class="item-img">
                            <img
                                src="../img/Jeep Grand Cherokee2022.webp"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Jeep Grand Cherokee 2022</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>

                    <div class="filter-item all SUV">
                        <div class="item-img">
                            <img
                                src="../img/Jeep Grand Cherokee2019.webp"
                                alt="Item image"
                            />
                        </div>
                        <div class="item-info">
                            <p>Jeep Grand Cherokee 2019</p>
                            <div>
                                <span class="new-price">$16.70</span>
                            </div>
                            <a href="#" class="add-btn">عرض التفاصيل </a>
                            <a href=" #" class="add-btn">الإيجار الآن  </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>x
</x-app-layout>
