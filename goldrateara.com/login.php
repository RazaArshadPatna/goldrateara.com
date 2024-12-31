<?php
session_start();
include 'include/header.php'; ?>

<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title mb-10" style="color:white;">Login Page</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a href="index.php"
                                    style="color:white;">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text__secondary">Login Page</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start login section  -->
    <div class="login__section section--padding mb-5">
        <div class="container">
            <form action="action/login.php" method="post">
                <div class="login__section--inner">
                    <div class="row row-cols-md-2 row-cols-1">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="account__login">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                    <p class="account__login--header__desc">Login if you area a returning customer.</p>
                                </div>

                                <?php if(isset($_SESSION['login'])){ ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                     Invalid Password or Email
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php unset($_SESSION['login']); } ?>

                                <div class="account__login--inner">
                                    <div class="row">
                                        <label>
                                            <input class="account__login--input" placeholder="Email Addres" type="email"
                                                name="email">
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label>
                                            <input class="account__login--input" placeholder="Password" type="password"
                                                name="password">
                                        </label>
                                    </div>
                                    <!-- <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                           
                                            <button class="account__login--forgot" type="submit">Forgot Your Password?</button>
                                        </div> -->
                                    <button class="account__login--btn primary__btn" type="submit"
                                        name="submit">Login</button>

                                    <p class="account__login--signup__text">Don,t Have an Account? <a
                                            href="register.php">Sign up now</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End login section  -->

</main>

<?php include 'include/footer.php'; ?>