<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        .sticky {
            position: fixed;
            top: 0;
            z-index: 19;
            width: 100%;
            background-color: black;
            transition: 1s;
        }

    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('landing/css/style.css')}}">
    <link href="{{asset('landing/fontawesome/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('landing/fontawesome/css/brands.css')}}" rel="stylesheet">
    <link href="{{asset('landing/fontawesome/css/solid.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('landing/css/animate.min.css')}}">
    <title>Water Refill</title>
</head>
<body>

<a href="#"><img class="logo-wel" src="{{asset('landing/image/logo-welcome.png')}}" alt=""></a>
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</div>

<!--WELCOME-->
<div id="home" class="welcome">
    <div class="container-fluid">
        <div class="row">
            <img class="water-refill" src="{{asset('landing/image/gelombang.png')}}" alt="">
            <img class="bubble" src="{{asset('landing/image/bubble.png')}}">
            <h6 class="welcome-desc wow fadeIn" data-wow-delay="0.5s">A PROJECT BY MOBILE DEVELOPMENT CLASS OF 2019</h6>
        </div>
    </div>
</div>
<!--END OF WELCOME-->

<!--NAVIGATION-->
<div id="myHeader">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#"><img id="logo" src="{{asset('landing/image/logo.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="loh navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">FEATURES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#apps">APPS</a>
            </ul>
        </div>
    </nav>
    <div class="garis"></div>
</div>
<!--END OF NAVIGATION-->

<!--ABOUT-->
<div id="about" class="about">
    <div class="container-fluid">
        <div class="row">
            <img class="assetAbout" src="{{asset('landing/image/asset_about.png')}}" alt="">
            <div class="aboutCon col-12 col-lg-12 wow fadeIn" data-wow-delay="1s">
            <div class="row">
                <div class="about_txt col-5 col-lg-5">
                    <h6 class="wow fadeIn" data-wow-delay="1.5s">ABOUT</h6>
                    <h1 class="wow fadeIn" data-wow-delay="2s">What is <br> Water Refill?</h1>
                    <p class="wow fadeIn" data-wow-delay="2.5s">Sebuah project Mobile Apps Development - Internet of Things
                        karya kreasi mahasiswa Informatics Universitas Ciputra
                        angkatan 2017.</p>
                    <button class="wow bounceIn" data-wow-delay="2.5s">Watch video <i class="fas fa-play"></i> </button>
                </div>
                <div class="about_img col-7 col-lg-7 wow fadeIn" data-wow-delay="1.5s">
                    <img src="{{asset('landing/image/about_asset.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--END OF ABOUT-->

<!--FEATURES-->
<div id="features" class="features">
    <div class="container-fluid">
        <div class="row">
            <div class="featuresCon col-12 col-lg-12">
                <img class="air" src="{{asset('landing/image/air1.png')}}">
                <h6 class="wow fadeInDown" data-wow-delay="0.5s">FEATURES</h6>
                <h1 class="wow fadeInDown" data-wow-delay="1s">How does it work?</h1>
                <img class="asset1" src="{{asset('landing/image/asset_features.png')}}" alt="">
                <img class="asset2"  src="{{asset('landing/image/asset_features2.png')}}" alt="">
                <div class="row">
                    <div class="col-4 col-lg-4">
                        <div class="features_box wow bounceIn" data-wow-delay="1s">
                            <h1>01.</h1>
                            <p>Download aplikasi Water Refill di Play Store. </p>
                        </div>
                        <div class="features_box2 wow bounceIn" data-wow-delay="1.5s">
                            <h1>02.</h1>
                            <p>Isi saldo Refill di Academic Support dan scan barcode yang terdapat disetiap unit dispenser</p>
                        </div>
                    </div>
                    <div class="features_img col-4 col-lg-4">
                        <img src="{{asset('landing/image/galon.png')}}" alt="">
                    </div>
                    <div class="col-4 col-lg-4">
                        <div class="features_box3 wow bounceIn" data-wow-delay="1.2s">
                            <h1>03.</h1>
                            <p>Pilih salah satu dari beberapa volume air yang tertera pada aplikasi.</p>
                        </div>
                        <div class="features_box4 wow bounceIn" data-wow-delay="1.7s">
                            <h1>04.</h1>
                            <p>Yeayyy... Air minum akan otomatis keluar sesusai dengan pilihan user. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END OF FEATURES-->

<!--APPS-->
<div id="apps" class="apps">
    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="apps_img col-7 col-lg-7">
                    <img class="wow bounceIn" data-wow-delay="1s" src="{{asset('landing/image/apps.png')}}" alt="">
                </div>
                <div class="apps_txt col-5 col-lg-5">
                    <h6 class="wow fadeInDown" data-wow-delay="1s">DOWNLOAD</h6>
                    <h1 class="wow fadeInDown" data-wow-delay="1.5s">Water Refill <br> Application</h1>
                    <button class="wow bounceIn" data-wow-delay="2s">Google Play Store</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END OF APPS-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{asset('landing/js/wow.min.js')}}"></script>
<script> new WOW().init(); </script>
<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
            logo.style.width = "25%";

        } else {
            header.classList.remove("sticky");
            logo.style.width = "30%";
        }
    }
</script>
</body>
</html>