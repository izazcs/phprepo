<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>
    <?php if(isset($title)){
        echo $title;
    }else{
        echo 'WENA Save a Life';
    } ?>
    </title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>
    <style type="text/css">
        @font-face {
            font-family: 'notofont';
            font-style: normal;
            font-weight: 300;
            src: url('assets/fonts/NotoNastaliqUrduDraft.woff');
        }
    </style>
    <header class="continer-fluid ">
        <div class="header-top">
            <div class="container">
                <div class="row col-det">
                    <div class="col-lg-6 d-none d-lg-block">
                        <ul class="ulleft">
                            <li>
                                <i class="far fa-envelope"></i>
                                wenanetwork@gmail.com
                                <span>|</span>
                            </li>
                            <li>
                                <i class="far fa-clock"></i>
                                <?= date('H:m'); ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <ul class="ulright">
                            <?php if(session()->get('is_loged_in')): ?>
                                <li>
                                    <a href="<?= base_url().'/dashboard'; ?>" style="color: #fff;">
                                        <i class="fas fa-tachometer-alt"></i>
                                        Profile</a>
                                    <span>|</span>
                                </li>
                                <li>
                                    <a href="<?= base_url().'/logout'; ?>" style="color: #fff;">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Logout</a>
                                </li>
                            <?php else: ?>
                            <li>
                                <a href="<?= base_url().'/register'; ?>" style="color: #fff;">
                                    <i class="fas fa-user-plus"></i>
                                    Register</a>
                                <span>|</span>
                            </li>
                            <li>
                                <a href="<?= base_url().'/login'; ?>" style="color: #fff;">
                                    <i class="fas fa-user"></i>
                                    Login</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-jk" class="header-bottom">
            <div class="container">
                <div class="row nav-row">
                    <div class="col-md-3 logo">
                        <a href="<?= base_url();?>">
                            <img src="<?= base_url(); ?>/assets/images/logo11.png" title="Wena a blood serach plateform">
                        </a>
                    </div>
                    <div class="col-md-9 nav-col">
                        <nav class="navbar navbar-expand-lg navbar-light">

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <?php 
                                        if(isset($ismain)){
                                            if($ismain){
                                            ?>
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="#">Home
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#donar">Search Donar</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#about">About Us</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#process">Blogs</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#contact">Contact US</a>
                                                </li>
                                                <?php }else{?>
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="<?= base_url();?>">Home
                                                    </a>
                                                </li>
                                    
                                    <?php  } } ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
  <?php  if(isset($ismain)){
            if($ismain){ ?>
    <!-- ################# Slider Starts Here#######################--->
    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/images/slider/slide-03.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class=" bounceInDown" style="font-family: notofont;">خون عطیہ کیجیے اور زندگی بچائیں</h5>
                        <p class=" bounceInLeft" style="font-family: notofont;">
                            اس کاز کو آگے بڑھانے میں ہمارا ساتھ دیجئے اور معاشرے کو بہتر بنانے میں اپنا کردار ادا کریں۔
                        </p>

                        <div class=" vbh">

                            <div class="btn btn-success  bounceInUp" style="font-family: notofont;"> <a href="<?= base_url().'/register'; ?>" style="color:#fff;"> خون عطیہ کئجیے </a></div>
                            <div class="btn btn-success  bounceInUp" style="font-family: notofont;"><a href="#contact" style="color:#fff;"> رابطہ کریں </a></div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/images/slider/slide-03.jpg" alt="Third slide">
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="bounceInDown">Donate Blood & Save a Life</h5>
                        <p class="bounceInLeft">If you save a single life you save whole huminity. Help us in this cause by your donation or your suggestions. </p>

                        <div class=" vbh">

                            <div class="btn btn-danger  bounceInUp"><a href="<?= base_url().'/register'; ?>" style="color:#fff;"> Donate Now </a></div>
                            <div class="btn btn-danger  bounceInUp"><a href="#contact" style="color:#fff;"> Contact US </a></div>
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>
    <?php }else{
        
    } } ?>
