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
                        <h1 class="breadcrumb__content--title mb-10" style="color:white;">Signup</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a href="index.php"
                                    style="color:white;">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text__secondary">Signup</span>
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
            <form action="action/register.php" method="post">
                <div class="login__section--inner">
                    <div class="row row-cols-md-2 row-cols-1">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">

                            

                            <div class="account__login register">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                    <p class="account__login--header__desc">Register here if you are a new customer</p>
                                </div>


                                <?php  
                                 //if(isset($_COOKIE['register'])){
                                ?>
                                <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Registration Successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                </div> -->

                                <?php // } ?>


                                <?php  
                                 if(isset($_SESSION['email_exists'])){
                                ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                         Email Already Exists.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                </div>

                                <?php unset($_SESSION['email_exists']); } ?>


                                <?php  
                                 if(isset($_SESSION['not_matched'])){
                                ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Password Not Matched.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>

                                <?php unset($_SESSION['not_matched']); } ?>
                                
                                <div class="account__login--inner">
                                    <div class="row">
                                        <label>
                                            <input class="account__login--input" placeholder="Username" type="text"
                                                name="username" required>
                                        </label>
                                    </div>

                                    <div class="row">
                                        <label>
                                            <input class="account__login--input" placeholder="Email Addres" type="email"
                                                name="email" required>
                                        </label>
                                    </div>



                                    <div class="row">
                                        <label>
                                            <input class="account__login--input" placeholder="Mobile Number" type="text"
                                                name="mobile" pattern="[789][0-9]{9}" required>
                                        </label>
                                    </div>


                                    <!-- <div class="row">
                                        <label>
                                            <input class="account__login--input" placeholder="Enter OTP" type="text">
                                        </label>
                                        </div> 
                                        password=pattern="[a-zA-Z0-9]{5,}"
                                        -->


                                    <div class="row">
                                        <label>
                                            <input class="account__login--input" placeholder="Password" type="password"
                                                name="password" required>
                                        </label>
                                    </div>

                                    <div class="row"> <label>
                                            <input class="account__login--input" placeholder="Confirm Password"
                                                type="password" name="confirm" required>
                                        </label>
                                    </div>

                                    <div class="row">
                                        <label>
                                            <button class="account__login--btn primary__btn mb-10" type="submit"
                                                name="submit">Submit & Register</button>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End login section  -->

</main>

<?php include 'include/footer.php'; ?>