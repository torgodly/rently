<x-app-layout>
    <!--header  -->
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
                    @foreach($cars as $car)
                        <div class="filter-item all mid">
                            <div class="item-img">
                                <img
                                    src="{{$car->image}}"
                                    alt="{{$car->name}}"
                                />
                            </div>
                            <div class="item-info">
                                <p>{{$car->name}}</p>
                                <div>
                                    <span class="new-price">{{$car->price_per_day}}</span>
                                </div>
                                <a href=" #" class="add-btn">عرض التفاصيل </a>
                                <a href=" #" class="add-btn">الإيجار الآن </a>
                            </div>
                        </div>

                    @endforeach
                </div>

            </div>
        </div>

    </section>
    x
</x-app-layout>
