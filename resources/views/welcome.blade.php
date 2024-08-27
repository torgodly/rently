<x-app-layout>
    <!--header  -->
    <!--Home-->
    <section class="home-two" id="home-two">

        <div class="text">
            <h1>
                موقع <span>أجّرلي  <br/>   </span>لإيجار السيارات
            </h1>

            <p>
                مرحبا بكم في موقعنا لإيجار السيارات<br/>
                نقدم لكم جميع الاحتياجات لإستئجار السيارة الخاصة بك <br/>
                يوفر موقعنا الإلكتروني طريقة سلسة ومريحة للعثور على السيارة المثالية
            </p>
            <!--<div class="app-stores">
              <img src="../img/ios.png" alt="" />
              <img src="../img/512x512.png" alt="" />
            </div>-->
        </div>

        <div class="form-box">
            <!------------------- login form -------------------------->
            <!--<div class="login-container" id="login">
              <div class="top">
                <span
                  >لايوجد لديك حساب؟
                  <a href="#" onclick="register()">انشاء حساب</a></span
                >
                <header>تسجيل الدخول</header>
              </div>
              <div class="input-box">
                <input
                  type="text"
                  class="input-field"
                  placeholder="الاسم او البريد الالكتروني"
                />
                <i class="bx bx-user"></i>
              </div>
              <div class="input-box">
                <input
                  type="password"
                  class="input-field"
                  placeholder="كلمة السر"
                />
                <i class="bx bx-lock-alt"></i>
              </div>
              <div class="input-box">
                <input type="submit" class="submit" value="دخول" />
              </div>
              <div class="two-col">
                <div class="one">
                  <input type="checkbox" id="login-check" />
                  <label for="login-check">تدكر</label>
                </div>
                <div class="two">
                  <label><a href="#">نسيت كلمة السر؟</a></label>
                </div>
              </div>
            </div>-
            <!------------------- registration form -------------------------->
            <!--  <div class="register-container" id="register">
                <div class="top">
                  <span
                    >لديك حساب ؟<a href="#" onclick="login()">تسجيل الدخول</a></span
                  >
                  <header>انشاء حساب</header>
                </div>
                <div class="two-forms">
                  <div class="input-box">
                    <input
                      type="text"
                      class="input-field"
                      placeholder="الاسم الاول"
                    />
                    <i class="bx bx-user"></i>
                  </div>
                  <div class="input-box">
                    <input
                      type="text"
                      class="input-field"
                      placeholder="الاسم الاخير"
                    />
                    <i class="bx bx-user"></i>
                  </div>
                </div>
                <div class="input-box">
                  <input type="text" class="input-field" placeholder="الايميل" />
                  <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                  <input
                    type="password"
                    class="input-field"
                    placeholder="كلمة السر"
                  />
                  <i class="bx bx-lock-alt"></i>-->
            <!-- </div>
             <div class="input-box">
               <input type="submit" class="submit" value="تسجيل الدخول" />
             </div>
             <div class="two-col">
               <div class="one">
                 <input type="checkbox" id="register-check" />
                 <label for="register-check">تدكر</label>
               </div>
               <div class="two">
                 <label><a href="#">Terms & conditions</a></label>
               </div>
             </div>
           </div>
         </div>-->

            <!--  <div class="form-container">
             <form action="">
                <div class="input-box">
                  <span>location</span>
                  <input type="search" name="" id="" placeholder="search places" />
                </div>
                <div class="input-box">
                  <span>pick-up date</span>
                  <input type="date" name="" id="" />
                </div>
                <div class="input-box">
                  <span>Return date</span>
                  <input type="date" name="" id="" />
                </div>
                <input type="submit" name="" id="" class="btn" />
              </form>
            </div>-->
    </section>
    <!--Ride-->
    <section class="ride" id="service">
        <div class="heading">
            <span>لماذا اجرلي</span>
            <h1>خدمات وتقنيات حديثة لتسريع وتحسين تجربتك</h1>
        </div>

        <div class="ride-container">
            <div class="box">

                <i class="bx fi-rr-benefit-porcent"></i>
                <h2>أسعار منافسة</h2>
                <p class="font">
                    سواء كنت ترغب باستئجار مركبة فخمة أو اقتصادية،
                    نوفر لك دائماً مركبات عالية الجودة بأسعار تنافسية.
                </p>
            </div>
            <div class="box">
                <i class="bx bxs-calendar-check"></i>
                <h2>حجز سريع ومريح</h2>
                <p class="font">
                    استمتع بتجربة حجز سهلة وسلسة، عبر تقنيات تعتمد توفير الوقت،
                    فريق مؤهل من المستشارين، وسائل دفه مرنة وخدمة استلام وتسليم مريحة.
                </p>
            </div>
            <div class="box">
                <i class="bx fi-sr-square-star"></i>
                <h2>خدمة عملاء مميّزة</h2>
                <p class="font">
                    استفد من خدمات مميّزة يقدمها فريق رائع من المستشارين عبر قنواتنا المتعددة!
                    ابتداءً من تجربة الحجز ووصولاً للدعم ما بعد استلام المركبة.
                </p>
            </div>
        </div>
    </section>
    <!--BRAND SECTION-->

    <section>
        <div class="logos">
            <div class="logos-slide">
                <img src="{{ asset('landing/img/mercedes-logo.png') }}"/>
                <img src="{{ asset('landing/img/bmw_logo_PNG.png') }}"/>
                <img src="{{ asset('landing/img/kia_logo.png') }}"/>
                <img src="{{ asset('landing/img/honda-logo-png-44825.png') }}"/>
                <img src="{{ asset('landing/img/Jeep-Logo.png') }}"/>
                <img src="{{ asset('landing/img/hyundai-logo.png') }}"/>
                <img src="{{ asset('landing/img/audi-logo.png') }}"/>
                <img src="{{ asset('landing/img/toyota-logo.png') }}"/>
                <img src="{{ asset('landing/img/chevrolet-logo.png') }}"/>
                <img src="{{ asset('landing/img/nissan-logo.png') }}"/>
                <img src="{{ asset('landing/img/ford-logo-png.png') }}"/>
                <img src="{{ asset('landing/img/Lexus-logo.png') }}"/>
                <img src="{{ asset('landing/img/chrysler-logo.png') }}"/>
            </div>
        </div>
    </section>
    <!--booking steps-->


    <!--services-->
    <style>

    </style>
    <section class="services" id="services">
        <div class="heading">
            <span>من عروض سياراتنا </span>

        </div>

        <div class="services-container">
            @foreach($cars as $car)
                <div class="box">
                    <div class="box-img">
                        <img src="{{ $car->image }}" alt="{{ $car->image }}"/>
                    </div>

                    <h3>{{$car->name}} </h3>
                    <h2>{{$car->price_per_day}} <span>/يوم</span></h2>
                    <a href="#" class="btn">الإيجار الآن </a>
                </div>

            @endforeach


        </div>
    </section>
    <!--About-->
    <section class="about" id="about">
        <div class="heading">
            <span> من نحن</span>
            <h1>عن الموقع</h1>
        </div>
        <div class="about-container">
            <div class="about-img">
                <img src="{{ asset('landing/img/Aboutiamge.jpg') }}" alt=""/>
            </div>
            <div class="about-text">
                <p>
                    يحرص اجرلى على ضمان مسايرة خدماتها للحداثة وسلاسة الاستخدام باعتماد
                    أحدث التقنيات وتخصيص الخدمات، ليحظى عملائنا بتجربة تتخطى توقعاتهم.
                    يسخر اجرلى الخبرة المحلية لمجموعة سيرا لتوفر لعملائها المنفعة
                    القصوى والقيمة من خلال خدمات التأجير الذكية والمرنة
                    للسيارات  وحلول التأجير للمؤسسات والجهات الحكومية

                </p>

            </div>
        </div>
    </section>
    <!--massge and vision-->
    <section class="massge" id="massge">
        <div class="heading">
            <span>الرؤية والرسالة</span>

        </div>
        <div class="about-container2">

            <div class="massage">
                <div class="title">
                    الرسالة
                </div>
                <p><span>تحسين مستويات الراحة</span>
                    و
                    <span> زيادة إرتباط</span>
                    وولاء ء من خلال توفير أسطول حديث وتعزيز الابتكار وتميز الخدمات في قطاع و</p>
            </div>
            <div class="vision">
                <div class="title">
                    الررؤية
                </div>
                <p><span>إعادة تصميم</span>
                    كيفية تنقل الأفراد والمؤسسات في جميع أنحاء البلاد من خلال <span>الابتكار الرقمي</span> في قطاع النقل
                    البري.
                </p>
            </div>
        </div>
    </section>

    <!--Review-->
    <!-- <section class="reviews" id="reviews">
       <div class="heading">
         <span> Review</span>
         <h1>whats our customer say</h1>
       </div>
       <div class="reviews-container">
         <div class="box">
           <div class="rev-img">
             <img src="../img/rev1.jpg" alt="" />
           </div>
           <h2>some one name</h2>
           <div class="starts">
             <i class="bx bxs-star"></i>
             <i class="bx bxs-star"></i>
             <i class="bx bxs-star"></i>
             <i class="bx bxs-star"></i>
             <i class="bx bxs-star-half"></i>
           </div>
           <p>
             Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit
             quasi in at! Amet impedit cum error libero dignissimos aspernatur
             dicta numquam sed placeat in, deserunt mollitia fugit magnam
             voluptatem? Nisi?
           </p>
         </div>
         <div class="box">
           <div class="rev-img">
             <img src="../img/rev2.jpg" alt="" />
           </div>
           <h2>some one name</h2>
           <div class="starts">
             <i class="bx bxs-star"></i>
             <i class="bx bxs-star"></i>
             <i class="bx bxs-star"></i>
             <i class="bx bxs-star"></i>
             <i class="bx bxs-star-half"></i>
           </div>
           <p>
             Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo
             distinctio incidunt suscipit voluptatum? Facere, cum dicta obcaecati
             mollitia quam minima eligendi ut aliquam nihil qui, ex optio?
             Facilis, praesentium illo!
           </p>
         </div>
         <div class="box">
           <div class="rev-img">
             <img src="../img/rev3.jpg" alt="" />
           </div>
           <h2>some one name</h2>
           <div class="starts">
             <i class="bx bxs-star"></i>
             <i class="bx bxs-star"></i>
             <i class="bx bxs-star"></i>
             <i class="bx bxs-star"></i>
             <i class="bx bxs-star-half"></i>
           </div>
           <p>
             Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Perspiciatis, voluptates corporis? Placeat iste deleniti itaque iure
             tenetur sit architecto quas quasi? Laboriosam, iste natus. Ab
             mollitia natus quam asperiores delectus.
           </p>
         </div>
       </div>
     </section>-->
    <!--Newsletter-->
    <!--contact us-->
    {{--    <section class="contact">--}}
    {{--        <div class="container_contact">--}}
    {{--            <div class="content">--}}
    {{--                <div class="left-side">--}}
    {{--                    <div class="address details">--}}
    {{--                        <i class="fas fa-map-marker-alt"></i>--}}
    {{--                        <div class="topic">Address</div>--}}
    {{--                        <div class="text-one">Surkhet, NP12</div>--}}
    {{--                        <div class="text-two">Birendranagar 06</div>--}}
    {{--                    </div>--}}
    {{--                    <div class="phone details">--}}
    {{--                        <i class="fas fa-phone-alt"></i>--}}
    {{--                        <div class="topic">Phone</div>--}}
    {{--                        <div class="text-one">+0098 9893 5647</div>--}}
    {{--                        <div class="text-two">+0096 3434 5678</div>--}}
    {{--                    </div>--}}
    {{--                    <div class="email details">--}}
    {{--                        <i class="fas fa-envelope"></i>--}}
    {{--                        <div class="topic">Email</div>--}}
    {{--                        <div class="text-one">codinglab@gmail.com</div>--}}
    {{--                        <div class="text-two">info.codinglab@gmail.com</div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="right-side">--}}
    {{--                    <div class="topic-text">Send us a message</div>--}}
    {{--                    <p>If you have any work from me or any types of quries related to my tutorial, you can send me message from here. It's my pleasure to help you.</p>--}}
    {{--                    <form action="#">--}}
    {{--                        <div class="input-box">--}}
    {{--                            <input type="text" placeholder="ادخل الإسم">--}}
    {{--                        </div>--}}
    {{--                        <div class="input-box">--}}
    {{--                            <input type="text" placeholder="ادخل الإيميل ">--}}
    {{--                        </div>--}}
    {{--                        <div class="input-box message-box">--}}
    {{--                            <textarea placeholder="ادخل المسج"></textarea>--}}
    {{--                        </div>--}}
    {{--                        <div class="button">--}}
    {{--                            <input type="button" value=" أرسل الآن" >--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    <!-- info section -->

    <!--ScrollReval-->

    <style>
        @media (max-width: 600px) {
            .hide-on-phone {
                display: none;
            }
        }
    </style>
    <section class="contact" id="contact">
        <div class="hide-on-phone">
            {{-- <img src="{{ asset('landing/img/13.png') }}" alt=""/> --}}
            <x-contact-svg/>
        </div>
        <div class="container_contact">
            <div class="content">
                <div class="left-side">
                    <div class="address details">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="topic">Address</div>
                        <div class="text-one">Tripoli</div>
                        <div class="text-two">Libya</div>
                    </div>
                    <div class="phone details" >
                        <i class="fas fa-phone-alt"></i>
                        <div class="topic">Phone</div>
                        <div class="text-one" dir="auto">+218 91 111 1111</div>
                        <div class="text-two" dir="auto">+218 91 111 1112</div>
                    </div>
                    <div class="email details">
                        <i class="fas fa-envelope"></i>
                        <div class="topic">Email</div>
                        <div class="text-one">info@rently.ly</div>
                        <div class="text-two">support@rently.ly</div>
                    </div>
                </div>                <div class="right-side">
                    @if(session('message'))
                        <div style="
    position: relative;
    padding: 1rem;
    border-radius: 0.375rem;
    background-color: #d1e7dd;
    color: #0f5132;
    border: 1px solid #badbcc;
">
                            <strong style="font-weight: 600; font-size: 16px;">{{__("Success!")}}</strong>
                            <span
                                style=" font-size: 16px">{{session('message')}}asdasda</span>
                            <span style="
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        padding: 0.5rem;
        cursor: pointer;
    ">

                        </div>

                    @endif

                    <div class="topic-text">تواصل معنا</div>
                    <p>مرحباً، نحن هنا للمساعدة! إذا كان لديك أي أسئلة، أو تواجه أي مشكلات، أو لديك أي اقتراحات، فلا تتردد في الاتصال بنا. نحن نقدر ملاحظاتك ونتطلع إلى سماعك!</p>

                    <form action="{{route('message.create')}}" method="POST">
                        @csrf
                        <div class="input-box">
                            <input type="text" name="name" id="name" placeholder="ادخل الإسم" autocomplete="given-name">
                            @error('name')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <input type="email" name="email" id="email" placeholder="ادخل الإيميل" autocomplete="email">
                            @error('email')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <input type="text" name="phone" id="phone-number" placeholder="ادخل رقم الهاتف"
                                   autocomplete="tel">
                            @error('phone')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <input type="text" name="subject" id="subject" placeholder="ادخل الموضوع"
                                   autocomplete="subject">
                            @error('subject')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="input-box message-box">
                            <textarea name="message" id="message" rows="4" placeholder="ادخل المسج"></textarea>
                            @error('message')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="right-side">
                            <div class="button">
                                <input type="submit" value="أرسل الآن" style="color: #fff;
            font-size: 18px;
            outline: none;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            background: var(--main-color);
            cursor: pointer;
            transition: all 0.3s ease;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>

</x-app-layout>
