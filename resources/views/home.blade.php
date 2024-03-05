@extends('layouts.app')

@section('content')
    {{-- <div class="container col-md-12">
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
            @endif --}}
    <main>

        <!--  carousel slide event -->
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators pb-2">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" aria-label="Slide 1" class="active"
                    aria-current="true"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active"
                    aria-current="true"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="active"
                    aria-current="true"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item border border-light">
                    <a href="{{ route('event') }}">
                        <img class="mb-4" src="{{ ' /storage/1.png ' }}" alt="acti" width="100%"height="700px">
                    </a>
                </div>
                <div class="carousel-item active carousel-item-start">
                    <a href="{{ route('event') }}">
                        <img class="mb-4" src="{{ ' /storage/3.png ' }}" alt="acti" width="100%" height="700px">
                    </a>
                </div>
                <div class="carousel-item carousel-item-next carousel-item-start">
                    <A href="{{ route('event') }}">
                        <img class="mb-4" src="{{ ' /storage/5.png ' }}" alt="acti" width="100%" height="700px">
                    </A>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next " type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon " aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        {{-- popupbanner --}}
        <div class="modal my-5" tabindex="-1">
            <div class="modal-dialog modal-lg mt-5">
                <div class="modal-content bg-dark">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-light">Best Hotel</h5>
                        <button id="close" type="button" class="btn-close bg-light" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <a href="{{ route('banners') }}" target="_blank" rel="noopener noreferrer"><img src=" /storage/hotel/8.1.png"
                                alt="bannerhotel"></a>
                        <p class="text-light mt-3">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Sint et natus deserunt nam alias error debitis non ipsum! Explicabo
                            magni, earum repudiandae maiores itaque omnis sunt sed, consequuntur
                            excepturi, incidunt atque repellendus maxime harum nobis! Quisquam tenetur
                            mollitia suscipit ipsam, dicta aut, corrupti fugit vel commodi corporis
                            veritatis inventore odio.</p>
                    </div>
                </div>
            </div>
            <script>
                window.addEventListener("load", function() {
                    setTimeout(
                        function open(event) {
                            document.querySelector(".modal").style.display = "block";
                        },
                        1000
                    )
                });
                document.querySelector("#close").addEventListener("click", function() {
                    document.querySelector(".modal").style.display = "none";
                });
            </script>
        </div>
        {{-- endpopupbanner --}}


        <!-- Marketing messaging and featurettes
                                                                    Wrap the rest of the page in another container to center all the content. -->
        <div class=" marketing ">
            <hr class="featurette-divider">
            <!--  hotel -->
            <div id="hotel">
                <section class="hero-section">

                    <div class="row">
                        <!-- -------- START HEADER 1 w/ text and image on right ------- -->
                        <div class="page-header min-vh-100"
                            style="background-image: url(https://images.unsplash.com/photo-1501446529957-6226bd447c46?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2378&q=80)"
                            loading="lazy">
                            <span class="mask bg-gradient-dark opacity-4"></span>
                            <div class="container">
                                <div class="row mt-5">
                                    <div class="col-lg-8 mx-auto text-white text-center">
                                        <h2 class="text-white">Booking</h2>
                                        <p class="lead">You can now make room and hotel reservations
                                            here.</p>
                                    </div>
                                    <div class="shadow-lg p-3 mb-5 bg-white rounded container my-5">
                                        <form action="{{ route('hotel') }}" target="_blank" id="hotel-search-form">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="destination">Destination:</label>
                                                    <input type="text" class="form-control" id="destination"
                                                        name="destination" placeholder="destination" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="ms-0">Number of Guest</label>
                                                    <input type="text" class="form-control" id="guest"
                                                        name="guest" placeholder="guest" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="check-in-date">Check-In Date:</label>
                                                    <input type="date" class="form-control" id="check-in-date"
                                                        name="check-in-date" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="check-out-date">Check-Out Date:</label>
                                                    <input type="date" class="form-control" id="check-out-date"
                                                        name="check-out-date" required>
                                                </div>
                                                <div class="d-grid gap-2 col-2 mx-auto my-3">
                                                    <button type="submit" class="btn btn-primary mt-3">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="search-results"></div>
                                    </div>
                                    <script src="app.js"></script>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>

        <!-- -------- END HEADER 1 w/ text and image on right ------- -->
        </section>
        </div>
        </div>
        <hr class="featurette-divider">
        <!-- Food -->
        <div id="restuarant" class="row p-3">
            <h1>
                <p class="text-center">Restaurant</p>
            </h1>
            <div class="col-lg-4">
                <img class= "rounded-5 mb-4" src="{{ ' /storage/food/thai/มีนา/4.png' }}" alt="food" width="100%"
                    height="500">
                <h2 class="fw-normal">Thai</h2>
                <div>
                    <p>ร้านอาหารเชียงใหม่ ร้านไหนอร่อย ? ใครมีแพลนมาเที่ยวเชียงใหม่
                        จังหวัดที่เต็มไปด้วยร้านอาหารอร่อยๆ
                        คาเฟ่เชียงใหม่สวยๆ และวันนี้เรารวม 25 ร้านอาหารเชียงใหม่ 2023-2024
                        บอกเลยว่าจัดเต็มร้านเด็ด </p>

                </div>
                <p class="mb-3"><a class="btn btn-secondary p-2" href="{{ route('restaurant.thai') }}">View
                        restaurant
                        »</a>
                </p>
            </div><!-- /.col-lg-4 -->

            <div class="col-lg-4">
                <img class="rounded-5 mb-4" src="{{ '  /storage/food/china/จิวเยาวราช ต้มยำหัวปลา/5.png' }}"
                    alt="food" width="100%" height="500">
                <h2 class="fw-normal">China</h2>
                <div>
                    <p>มาเชียงใหม่หลายรอบแล้ว หลายคนคงเบื่ออาหารพื้นเมืองแล้วใช่มั้ย
                        วันนี้เราเลยพามาแนะนำให้รู้จักร้านอาหารจีนอร่อยๆ กันบ้าง ยกมา 4 ร้าน ตามมาดูเลย
                    </p>

                </div>
                <p class="mb-2 pt-4"><a class="btn btn-secondary p-2" href="{{ route('restaurant.china') }} ">View
                        restaurant»</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="rounded-5 mb-4"
                    src="{{ '  /storage/food/halal/Yaring Cuisine Halal Restaurant Chiangmai/4.png' }}" alt="food"
                    width="100%" height="500">
                <h2 class="fw-normal">Halal</h2>
                <div>
                    <p>พาทุกคนไปลุยร้านอาหารมุสลิม เชียงใหม่ เพื่อให้ทุกคนได้รู้ว่าจริง ๆ
                        แล้วอาหารฮาลาลไม่ได้มีเพียงแค่พวก ข้าวซอย, ข้าวหมกไก่ และซุปหางวัว
                        อย่างที่หลายคนเข้าใจเท่านั้น
                        แต่ยังมีทั้งอาหารคาวที่แปลกตา ของหวานที่ตื่นใจ ซึ่งน่ากินทุกจาน
                        อย่ารอช้ารีบออกไปชิมตามกันเถอะ!
                        .
                    </p>
                    
                </div>
                <p class="mb-3"><a class="btn btn-secondary p-2" href="{{ route('restaurant.halal') }} ">View
                            restaurant »</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        <hr class="featurette-divider">
        <!-- Otop -->
        <link rel="stylesheet" href="css/otop.css">
        <div id="otop">
            <h1>
                <p class="text-center">Otop</p>
            </h1>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
                integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
                crossorigin="anonymous">
            <div>
                <div class="card-columns">
                    <div class="card">
                        <a href="{{ route('otops.foodd') }}">
                            <img class="card-img" src=" /storage/lfood.png " alt="Card image cap" width="325"
                                height="450">
                        </a>
                    </div>
                    <div class="card">
                        <a href="{{ route('otops.water') }}">
                            <img class="card-img" src=" /storage/lwater.png " alt="Card image cap" width="325"
                                height="450">
                        </a>
                    </div>
                    <div class="card">
                        <a href="{{ route('otops.shirt') }}">
                            <img class="card-img" src=" /storage/lshirt.png " alt="Card image cap" width="325"
                                height="915">
                        </a>
                    </div>
                    <div class="card">
                        <a href="{{ route('otops.decoration') }}">
                            <img class="card-img" src=" /storage/lappara.png " alt="Card image cap" width="325"
                                height="450">
                        </a>
                    </div>
                    <div class="card">
                        <a href="{{ route('otops.herb') }}">
                            <img class="card-img" src=" /storage/lherb.png " alt="Card image cap" width="325"
                                height="450">
                        </a>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
                integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
            </script>

        </div>
        <hr class="featurette-divider">
        <!-- Station -->
        <div id="station">
            <h1>
                <p class="text-center">Station</p>
            </h1>
            <br />
            <swiper-container class="mySwiper border border-black" watch-slides-progress="true" slides-per-view="3">
                <swiper-slide class="border border-black">
                    <a href="{{ route('stations.hosp') }}"><img src=" /storage/pital.png " alt="loh"></a>
                </swiper-slide>
                <swiper-slide class="border border-black">
                    <a href="{{ route('stations.poli') }}"><img src=" /storage/polices.png " alt="lop"></a>
                </swiper-slide>
                <swiper-slide class="border border-black">
                    <a href="{{ route('stations.buss') }}"><img src=" /storage/BUS STOP (1).png  " alt="lob"></a>
                </swiper-slide>
                <swiper-slide class="border border-black">
                    <a href="{{ route('stations.taxi') }}"><img src=" /storage/taxi.png " alt="lot"></a>
                </swiper-slide>

            </swiper-container>

            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>


        </div>
        <hr class="featurette-divider">
        <!-- currency -->
        <div id="currency">

            <div class="container currency-container">
                <h1 class="text-center mb-4">Currency </h1>
                <div class="currency-converter">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="fromCurrency" class="form-label currency-label">From
                                Currency</label>
                            <select class="form-select currency-input" id="fromCurrency">
                                <option value="usd">USD</option>
                                <option value="eur">EUR</option>
                                <option value="gbp">GBP</option>
                                <!-- Add more currencies as needed -->
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="toCurrency" class="form-label currency-label">To Currency</label>
                            <select class="form-select currency-input" id="toCurrency">
                                <option value="usd">USD</option>
                                <option value="eur">EUR</option>
                                <option value="gbp">GBP</option>
                                <!-- Add more currencies as needed -->
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="amount" class="form-label currency-label">Amount</label>
                            <input type="number" class="form-control currency-input" id="amount"
                                placeholder="Enter amount">
                        </div>
                    </div>
                    <div class="exchange-rate text-center mt-4">
                        Exchange Rate: <span id="exchangeRate">0.00</span>
                    </div>
                </div>
                <script>
                    // Dummy function to simulate exchange rate update
                    function updateExchangeRate() {
                        // Simulated exchange rate update
                        var exchangeRate = Math.random() * (1.2 - 0.8) + 0.8; // Random rate between 0.8 and 1.2
                        document.getElementById('exchangeRate').innerText = exchangeRate.toFixed(2);
                    }

                    // Update exchange rate on page load
                    updateExchangeRate();

                    // Update exchange rate every 5 seconds (for demonstration)
                    setInterval(updateExchangeRate, 5000);
                </script>
            </div>
            <script>
                function calculateExchangeRate() {
                    var amount = parseFloat(document.getElementById('amount').value);
                    var currency = document.getElementById('currency').value;
                    var exchangeRate;

                    // Add exchange rates for the selected currency
                    switch (currency) {
                        case 'eur':
                            exchangeRate = 0.85;
                            break;
                        case 'gbp':
                            exchangeRate = 0.73;
                            break;
                        case 'jpy':
                            exchangeRate = 112.25;
                            break;
                            // Add more cases for other currencies as needed
                        default:
                            exchangeRate = 1; // Default to 1 if currency not recognized
                    }

                    var result = amount * exchangeRate;
                    document.getElementById('result').innerHTML = '<strong>Result:</strong> ' + result.toFixed(2) + ' ' + currency
                        .toUpperCase();
                }
            </script>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->
    </main>
    </div>
    </div>
@endsection
