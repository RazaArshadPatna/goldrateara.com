<?php $page=basename($_SERVER['PHP_SELF']); 
    
    include 'control-panel/include/connection.php'; 

    $sql="SELECT `image`,`facebook`,`twitter`,`youtube`,`linkdin`,`whatsapp`,`instagram`,`address_1`,`address_2`,`email`,`mobile_1`,`mobile_2`,`cus_care_num` from `website_data`";
    $s=$conn->prepare($sql);
    $s->bind_result($logo,$facebook,$twitter,$youtube,$linkdin,$whatsapp,$instagram,$address1,$address2,$email,$mobile1,$mobile2,$cus_care);
    if($s->execute()){
        $s->store_result();
        while($s->fetch()){

        }
    }


?>
<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Basant Lal</title>
    <meta name="description"
        content="Basant Lal And Sons Jewellers is more than just a jewellery shop; it has become a symbol of purity and trust in the city since its inception in 1908. Founded by Basant Lal Jee Agarwal and later continued by his eldest son, Shree Krishna Jee Agarwal, the store underwent a transformation in 2013 when it reopened at a new location following a family partition, now managed by Ajay Krishna Agarwal and Siddharth Krishna Agarwal.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="./upload/logo/<?php echo $logo; ?>">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/glightbox.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800&amp;family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap"
        rel="stylesheet">

    <!-- Plugin css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">




    <!--Owl Carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!--Font Awesome Css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">


    <style>
    .footer-about p {
        color: white;
    }
    </style>

</head>

<body class="body-background mobile_background">

    <!-- Start preloader -->
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>

                    <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>

                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>

                    <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>

                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>

                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>

                    <span data-text-preloader="G" class="letters-loading">
                        G
                    </span>
                </div>
            </div>

            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    </div>
    <!-- End preloader -->









    <!-- Start header area -->
    <header class="header__section">

        <!-- Start main header -->
        <div class="main__header position__relative header__sticky nav-black">
            <div class="container">
                <div class="main__header--inner d-flex justify-content-between align-items-center">
                    <div class="offcanvas__header--menu__open ">
                        <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas
                            style="color:white;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                    stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352" />
                            </svg>
                            <span class="visually-hidden">Offcanvas Menu Open</span>
                        </a>
                    </div>
                    <div class="main__logo">
                        <h1 class="main__logo--title"><a class="main__logo--link" href="index.php"><img
                                    class="main__logo--img" src="./upload/logo/<?php echo $logo; ?>" alt="logo-img"
                                    style="width:150px;"></a></h1>
                    </div>
                    <div class="header__menu d-none d-lg-block">
                        <nav class="header__menu--navigation">
                            <ul class="d-flex">
                                <li class="header__menu--items">
                                    <a class="header__menu--link <?php if($page=='index.php'){ ?> active-menu <?php } ?>"
                                        href="index.php">Home</a>

                                </li>

                                <li class="header__menu--items">
                                    <a class="header__menu--link <?php if($page=='about.php'){ ?> active-menu <?php } ?>"
                                        href="about.php">About Us </a>
                                </li>

                                <li class="header__menu--items">
                                    <a class="header__menu--link <?php if($page=='product.php'){ ?> active-menu <?php } ?>"
                                        href="product.php">Product </a>
                                </li>


                                <li class="header__menu--items">
                                    <a class="header__menu--link <?php if($page=='gallery.php'){ ?> active-menu <?php } ?>"
                                        href="gallery.php ">Gallery </a>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link <?php if($page=='calculator.php'){ ?> active-menu <?php } ?>"
                                        href="calculator.php">Calculator </a>
                                </li>

                                <li class="header__menu--items">
                                    <a class="header__menu--link <?php if($page=='bank-info.php'){ ?> active-menu <?php } ?>"
                                        href="bank-info.php">Bank Information </a>
                                </li>

                                <li class="header__menu--items">
                                    <a class="header__menu--link <?php if($page=='contact.php'){ ?> active-menu <?php } ?>"
                                        href="contact.php">Contact </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header__account">
                        <ul class="d-flex">

                            <li class="header__account--items">
                                <!-- <a class="header__account--btn" href="my-account.php">
                                <i class="fa-solid fa-user usericonsize"></i>
                                </a>
                                <span class="d-xs-none usericon">My Account</span> -->
                                <div class="dropdown">
                                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-user usericonsize text-white"></i>
                                        <span class="d-xs-none usericon">My Account</span>
                                    </a>


                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                                        style="width:140px;">
                                        <li><a class="dropdown-item" href="my-account.php"
                                                style='font-size: 18px;line-height: 27px;'>Profile</a></li>
                                        <?php  
                                 if(isset($_COOKIE['id'])){
                                ?>

                                        <li><a class="dropdown-item" href="logout.php"
                                                style='font-size: 18px;line-height: 27px;'>Logout</a></li>
                                        <?php } else{ ?>

                                        <li><a class="dropdown-item" href="login.php"
                                                style='font-size: 18px;line-height: 27px;'>Login</a></li>
                                        <li><a class="dropdown-item" href="register.php"
                                                style='font-size: 18px;line-height: 27px;'>Register</a></li>

                                        <?php } ?>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End main header -->

        <!-- Start Offcanvas header menu -->
        <div class="offcanvas-header" tabindex="-1">
            <div class="offcanvas__inner">
                <div class="offcanvas__logo">
                    <a class="offcanvas__logo_link" href="index.php">
                        <img src="./upload/logo/<?php echo $logo; ?>" alt="Rokon Logo">
                    </a>
                    <button class="offcanvas__close--btn" data-offcanvas>close</button>
                </div>
                <nav class="offcanvas__menu">
                    <ul class="offcanvas__menu_ul">
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item <?php if($page=='index.php'){ ?> active-menu <?php } ?>"
                                href="index.php">Home</a>

                        </li>


                        <li class="offcanvas__menu_li"><a
                                class="offcanvas__menu_item <?php if($page=='about.php'){ ?> active-menu <?php } ?>"
                                href="about.php">About</a></li>
                        <li class="offcanvas__menu_li"><a
                                class="offcanvas__menu_item <?php if($page=='product.php'){ ?> active-menu <?php } ?>"
                                href="product.php">Product</a></li>
                        <li class="offcanvas__menu_li"><a
                                class="offcanvas__menu_item <?php if($page=='gallery.php'){ ?> active-menu <?php } ?>"
                                href="gallery.php">Gallery</a></li>
                        <li class="offcanvas__menu_li"><a
                                class="offcanvas__menu_item <?php if($page=='calculator.php'){ ?> active-menu <?php } ?>"
                                href="calculator.php">Calculator</a></li>
                        <li class="offcanvas__menu_li"><a
                                class="offcanvas__menu_item <?php if($page=='bank-info.php'){ ?> active-menu <?php } ?>"
                                href="bank-info.php">Bank Information</a></li>
                        <li class="offcanvas__menu_li"><a
                                class="offcanvas__menu_item <?php if($page=='contact.php'){ ?> active-menu <?php } ?>"
                                href="contact.php">Contact</a></li>
                    </ul>

                </nav>
            </div>
        </div>
        <!-- End Offcanvas header menu -->

        <!-- Start Offcanvas stikcy toolbar -->
        <div class="offcanvas__stikcy--toolbar" tabindex="-1">
            <ul class="d-flex justify-content-between">
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="calculator.php">
                        <span class="offcanvas__stikcy--toolbar__icon">
                            <i class="fa-solid fa-calculator"></i>
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Calculator</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="about.php">
                        <span class="offcanvas__stikcy--toolbar__icon">
                            <i class="fa-regular fa-address-card"></i>
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">About</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list ">
                    <a class="offcanvas__stikcy--toolbar__btn" href="index.php" data-offcanvas>
                        <span class="offcanvas__stikcy--toolbar__icon">

                            <i class="fa-solid fa-house"></i>

                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Home</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn minicart__open--btn" href="product.php" data-offcanvas>
                        <span class="offcanvas__stikcy--toolbar__icon">
                            <i class="fa-solid fa-gift"></i>
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Product</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="share.php">
                        <span class="offcanvas__stikcy--toolbar__icon">
                            <i class="fa-solid fa-share-nodes"></i>
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Share</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Offcanvas stikcy toolbar -->


    </header>
    <!-- End header area -->