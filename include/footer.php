    <!-- Start footer section -->
    <footer class="footer__section footer__bg">
        <div class="container">
            <div class="main__footer section--padding">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer__widget">
                        
                        <?php  
                           $sql="SELECT `page_menu`,`media`,`content` from `static_page` where `id`=4 and `status`=1";
                           $s=$conn->prepare($sql);
                           $s->bind_result($page_menu,$image,$content);
                           if($s->execute()){
                           $s->store_result();
                              while($s->fetch()){
                              } }          
                        ?>


                            <div class="footer__widget--inner footer-about">
                                <a class="footer__logo" href="index.php"><img class="footer__logo--img display-block" src="./upload/logo/<?php echo $logo; ?>" alt="footer-logo" style="width:200px;"></a>
                                 <?php echo html_entity_decode(substr(strip_tags($content),0,100)); ?>
                                <ul class="footer__contact--info">
                                    <li class="footer__contact--info__list">
                                    <i class="fa-solid fa-phone"></i>
                                        <a href="tel:+ <?php echo $mobile1; ?>">+ <?php echo $mobile1; ?></a>
                                    </li>
                                    <li class="footer__contact--info__list">
                                    <i class="fa-solid fa-envelope"></i>
                                        <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                    </li>
                                    <!-- <li class="footer__contact--info__list">
                                    <i class="fa-solid fa-location-dot"></i>
                                        <a>BASANT LAL AND SONS JEWELLERS, ARRAH</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Recent Post <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="about.php">About Us</a></li>
                                
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="contact.php">Contact Us</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="privacy.php">Privacy Policy</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="terms.php">Terms & Conditions</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Account Info <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="my-account.php">My Account</a></li>
                                
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="login.php">Login</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="register.php">Register</a></li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Social share <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <div class="footer__widget--inner">
                                <ul class="footer__social--style4">
                                    <li class="footer__social--list">
                                        <a class="footer__social--list__icon" target="_blank" href="<?php echo $facebook; ?>">
                                            <span class="footer__social--icon__svg">
                                            <i class="fa-brands fa-facebook-f"></i>
                                            </span>
                                            <span class="footer__social--title">Facebook</span>
                                        </a>
                                    </li>
                                    <li class="footer__social--list">
                                        <a class="footer__social--list__icon" target="_blank" href="<?php echo $twitter; ?>">
                                            <span class="footer__social--icon__svg">
                                            <i class="fa-brands fa-square-x-twitter"></i>
                                            </span>
                                            <span class="footer__social--title">Twitter</span>
                                        </a>
                                    </li>
                                    <li class="footer__social--list">
                                        <a class="footer__social--list__icon" target="_blank" href="<?php echo $instagram; ?>">
                                            <span class="footer__social--icon__svg">
                                            <i class="fa-brands fa-square-instagram"></i>
                                            </span>
                                            <span class="footer__social--title">Instagram</span>
                                        </a>
                                    </li>
                                    <li class="footer__social--list">
                                        <a class="footer__social--list__icon" target="_blank" href="<?php echo $linkdin; ?>">
                                            <span class="footer__social--icon__svg">
                                            <i class="fa-brands fa-linkedin"></i>
                                            </span>
                                            <span class="footer__social--title">Linkedin</span>
                                        </a>
                                    </li>
                                    <li class="footer__social--list">
                                        <a class="footer__social--list__icon" target="_blank" href="<?php echo $youtube; ?>">
                                            <span class="footer__social--icon__svg">
                                            <i class="fa-brands fa-youtube"></i>
                                            </span>
                                            <span class="footer__social--title">Youtube</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom d-flex justify-content-between align-items-center">
                <p class="copyright__content  m-0">Copyright © 2022 <a class="copyright__content--link" href="index.php">Basant Jewellery</a> . All Rights Reserved.</p>
                <p class="footer__bottom--desc"><a href="terms.php">Term & condition</a> , <a href="privacy.php">Privacy Policy</a></p>
            </div>
        </div>
    </footer>
    <!-- End footer section -->

    <!-- Scroll top bar -->
    <button aria-label="scroll top btn" id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>
    
  <!-- All Script JS Plugins here  -->
  <!-- <script src="assets/js/vendor/popper.js" defer="defer"></script> -->
  <!-- <script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script> -->


  <!--JQuery-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!--Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  
  <script src="assets/js/plugins/swiper-bundle.min.js" defer="defer"></script>
  <script src="assets/js/plugins/glightbox.min.js" defer="defer"></script>

  <!-- Customscript js -->
  <script src="assets/js/script.js" defer="defer"></script>


  <!--Owl Carousel-->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  


  <script>

$(document).ready(function() {
        $(".offer-slider").owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                },
                1200: {
                    items: 2
                }
            },
            smartSpeed: 1500
        })
    });

  </script>


</body>
</html>