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
                        <h1 class="breadcrumb__content--title mb-10" style="color:white;">Contact Us</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a href="index.php"
                                    style="color:white;">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text__secondary">Contact Us</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start contact section -->
    <section class="contact__section section--padding">
        <div class="container">
            <div class="section__heading text-center mb-40">
                <h2 class="section__heading--maintitle mb-10" style="color:black;">Get In Touch</h2>
                <!-- <p class="section__heading--desc" style="color:white;">Beyond more stoic this along goodness this sed wow manatee mongos 
                        flusterd impressive man farcrud opened.</p> -->
            </div>
            <div class="main__contact--area">
                <div class="row align-items-center row-md-reverse">
                    <div class="col-lg-5">
                        <div class="contact__info border-radius-10">
                            <div class="contact__info--items">
                                <h3 class="contact__info--content__title text-white mb-15">Contact Us</h3>
                                <div class="contact__info--items__inner d-flex">
                                    <div class="contact__info--icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31.568" height="31.128"
                                            viewBox="0 0 31.568 31.128">
                                            <path id="ic_phone_forwarded_24px"
                                                d="M26.676,16.564l7.892-7.782L26.676,1V5.669H20.362v6.226h6.314Zm3.157,7a18.162,18.162,0,0,1-5.635-.887,1.627,1.627,0,0,0-1.61.374l-3.472,3.424a23.585,23.585,0,0,1-10.4-10.257l3.472-3.44a1.48,1.48,0,0,0,.395-1.556,17.457,17.457,0,0,1-.9-5.556A1.572,1.572,0,0,0,10.1,4.113H4.578A1.572,1.572,0,0,0,3,5.669,26.645,26.645,0,0,0,29.832,32.128a1.572,1.572,0,0,0,1.578-1.556V25.124A1.572,1.572,0,0,0,29.832,23.568Z"
                                                transform="translate(-3 -1)" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div class="contact__info--content">
                                        <p class="contact__info--content__desc text-white"> <a
                                                href="tel:+ <?php echo $mobile1; ?>">+ <?php echo $mobile1; ?></a> <a
                                                href="tel:+ <?php echo $mobile2; ?>">+ <?php echo $mobile2; ?></a> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="contact__info--items">
                                <h3 class="contact__info--content__title text-white mb-15">Email Address</h3>
                                <div class="contact__info--items__inner d-flex">
                                    <div class="contact__info--icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31.57" height="31.13"
                                            viewBox="0 0 31.57 31.13">
                                            <path id="ic_email_24px"
                                                d="M30.413,4H5.157C3.421,4,2.016,5.751,2.016,7.891L2,31.239c0,2.14,1.421,3.891,3.157,3.891H30.413c1.736,0,3.157-1.751,3.157-3.891V7.891C33.57,5.751,32.149,4,30.413,4Zm0,7.783L17.785,21.511,5.157,11.783V7.891l12.628,9.728L30.413,7.891Z"
                                                transform="translate(-2 -4)" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div class="contact__info--content">
                                        <p class="contact__info--content__desc text-white"> <a
                                                href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a> <br> <a
                                                href="mailto:<?php echo $cus_care; ?>"><?php echo $cus_care; ?></a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="contact__info--items">
                                <h3 class="contact__info--content__title text-white mb-15">Office Location</h3>
                                <div class="contact__info--items__inner d-flex">
                                    <div class="contact__info--icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31.57" height="31.13"
                                            viewBox="0 0 31.57 31.13">
                                            <path id="ic_account_balance_24px"
                                                d="M5.323,14.341V24.718h4.985V14.341Zm9.969,0V24.718h4.985V14.341ZM2,32.13H33.57V27.683H2ZM25.262,14.341V24.718h4.985V14.341ZM17.785,1,2,8.412v2.965H33.57V8.412Z"
                                                transform="translate(-2 -1)" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div class="contact__info--content">
                                        <p class="contact__info--content__desc text-white"><?php echo $address1; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="contact__info--items">
                                <h3 class="contact__info--content__title text-white mb-15">Follow Us</h3>
                                <ul class="contact__info--social d-flex">
                                    <li class="contact__info--social__list">
                                        <a class="contact__info--social__icon" target="_blank"
                                            href="<?php echo $facebook; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524"
                                                viewBox="0 0 7.667 16.524">
                                                <path data-name="Path 237"
                                                    d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z"
                                                    transform="translate(-960.13 -345.407)" fill="currentColor"></path>
                                            </svg>
                                            <span class="visually-hidden">Facebook</span>
                                        </a>
                                    </li>
                                    <li class="contact__info--social__list">
                                        <a class="contact__info--social__icon" target="_blank"
                                            href="<?php echo $twitter; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384"
                                                viewBox="0 0 16.489 13.384">
                                                <path data-name="Path 303"
                                                    d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z"
                                                    transform="translate(-951.23 -1140.849)" fill="currentColor"></path>
                                            </svg>
                                            <span class="visually-hidden">Twitter</span>
                                        </a>
                                    </li>
                                    <!-- <li class="contact__info--social__list">
                                            <a class="contact__info--social__icon" target="_blank" href="https://www.skype.com/">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.482" height="16.481" viewBox="0 0 16.482 16.481">
                                                    <path data-name="Path 284" d="M879,926.615a4.479,4.479,0,0,1,.622-2.317,4.666,4.666,0,0,1,1.676-1.677,4.482,4.482,0,0,1,2.317-.622,4.577,4.577,0,0,1,2.43.678,7.58,7.58,0,0,1,5.048.961,7.561,7.561,0,0,1,3.786,6.593,8,8,0,0,1-.094,1.206,4.676,4.676,0,0,1,.7,2.411,4.53,4.53,0,0,1-.622,2.326,4.62,4.62,0,0,1-1.686,1.686,4.626,4.626,0,0,1-4.756-.075,7.7,7.7,0,0,1-1.187.094,7.623,7.623,0,0,1-7.647-7.647,7.46,7.46,0,0,1,.094-1.187A4.424,4.424,0,0,1,879,926.615Zm4.107,1.714a2.473,2.473,0,0,0,.282,1.234,2.41,2.41,0,0,0,.782.829,5.091,5.091,0,0,0,1.215.565,15.981,15.981,0,0,0,1.582.424q.678.151.979.235a3.091,3.091,0,0,1,.593.235,1.388,1.388,0,0,1,.452.348.738.738,0,0,1,.16.481.91.91,0,0,1-.48.753,2.254,2.254,0,0,1-1.271.321,2.105,2.105,0,0,1-1.253-.292,2.262,2.262,0,0,1-.65-.838,2.42,2.42,0,0,0-.414-.546.853.853,0,0,0-.584-.17.893.893,0,0,0-.669.283.919.919,0,0,0-.273.659,1.654,1.654,0,0,0,.217.782,2.456,2.456,0,0,0,.678.763,3.64,3.64,0,0,0,1.158.574,5.931,5.931,0,0,0,1.639.235,5.767,5.767,0,0,0,2.072-.339,2.982,2.982,0,0,0,1.356-.961,2.306,2.306,0,0,0,.471-1.431,2.161,2.161,0,0,0-.443-1.375,3.009,3.009,0,0,0-1.2-.894,10.118,10.118,0,0,0-1.865-.575,11.2,11.2,0,0,1-1.309-.311,2.011,2.011,0,0,1-.8-.452.992.992,0,0,1-.3-.744,1.143,1.143,0,0,1,.565-.97,2.59,2.59,0,0,1,1.488-.386,2.538,2.538,0,0,1,1.074.188,1.634,1.634,0,0,1,.622.49,3.477,3.477,0,0,1,.414.753,1.568,1.568,0,0,0,.4.594.866.866,0,0,0,.574.2,1,1,0,0,0,.706-.254.828.828,0,0,0,.273-.631,2.234,2.234,0,0,0-.443-1.253,3.321,3.321,0,0,0-1.158-1.046,5.375,5.375,0,0,0-2.524-.527,5.764,5.764,0,0,0-2.213.386,3.161,3.161,0,0,0-1.422,1.083A2.738,2.738,0,0,0,883.106,928.329Z" transform="translate(-878.999 -922)" fill="currentColor"></path>
                                                    </svg>
                                                    <span class="visually-hidden">Skype</span>
                                            </a>
                                        </li> -->
                                    <li class="contact__info--social__list">
                                        <a class="contact__info--social__icon" target="_blank"
                                            href="<?php echo $youtube; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582"
                                                viewBox="0 0 16.49 11.582">
                                                <path data-name="Path 321"
                                                    d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z"
                                                    transform="translate(-951.269 -1359.8)" fill="currentColor"></path>
                                            </svg>
                                            <span class="visually-hidden">Youtube</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">

                        <?php if(isset($_SESSION['success'])){ ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php } ?>


                        <div class="contact__form">
                            <form class="contact__form--inner" method="post" action="action/contact.php">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="contact__form--list mb-20">
                                            <label class="contact__form--label" for="input1">First Name <span
                                                    class="contact__form--label__star">*</span></label>
                                            <input class="contact__form--input" name="fname" id="input1" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="contact__form--list mb-20">
                                            <label class="contact__form--label" for="input2">Last Name <span
                                                    class="contact__form--label__star">*</span></label>
                                            <input class="contact__form--input" name="lname" id="input2" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="contact__form--list mb-20">
                                            <label class="contact__form--label" for="input3">Phone Number <span
                                                    class="contact__form--label__star">*</span></label>
                                            <input class="contact__form--input" type="number" name="phone" id="input3"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="contact__form--list mb-20">
                                            <label class="contact__form--label" for="input4">Email <span
                                                    class="contact__form--label__star">*</span></label>
                                            <input class="contact__form--input" name="email" id="input4" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="contact__form--list mb-10">
                                            <label class="contact__form--label" for="input5">Write Your Message <span
                                                    class="contact__form--label__star">*</span></label>
                                            <textarea class="contact__form--textarea" name="message"
                                                id="input5"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <button class="contact__form--btn primary__btn" type="submit" name="submit">Submit
                                    Now</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End contact section -->

    <!-- Start contact map area -->
    <div class="contact__map--area section--padding pt-0">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3599.1986607324816!2d84.67257939999999!3d25.5650566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398d5ffb5a2e0bdf%3A0x31416fd3b386b328!2sBASANT%20LAL%20AND%20SONS%20JEWELLERS!5e0!3m2!1sen!2sin!4v1726933828580!5m2!1sen!2sin" style="width:100%;" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
    <!-- End contact map area -->

</main>

<?php include 'include/footer.php'; ?>