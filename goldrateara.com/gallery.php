<?php include 'include/header.php'; ?>

<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title mb-10" style="color:white;">Gallery</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a href="index.php"
                                    style="color:white;">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text__secondary">Gallery</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start portfolio section -->
    <section class="portfolio__section section--padding mb-5">
        <div class="container">

            <div class="portfolio__section--inner">
                <div class="row row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-2 mb--n30">

                    <?php 
 
                         $sql="SELECT `image` from `image_gallery` where `status`='Publish'";
                         $s=$conn->prepare($sql);
                         $s->bind_result($image);
                         if($s->execute()){
                            $s->store_result();
                            while($s->fetch()){

                    ?>
                    
                  
                    <div class="col mb-30">
                        <div class="portfolio__items">
                            <div class="portfolio__items--thumbnail position__relative">
                                <a class="portfolio__items--thumbnail__link glightbox"
                                    href="upload/gallery/<?php echo $image; ?>" data-gallery="portfolio"><img
                                        class="portfolio__items--thumbnail__img rounded-gallery"
                                        src="upload/gallery/<?php echo $image; ?>" alt="portfolio-img">
                                    <span class="portfolio__view--icon"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="39.697" height="27.066" viewBox="0 0 39.697 27.066">
                                            <path
                                                d="M20.849,4.5A21.341,21.341,0,0,0,1,18.033a21.322,21.322,0,0,0,39.7,0A21.341,21.341,0,0,0,20.849,4.5Zm0,22.555a9.022,9.022,0,1,1,9.022-9.022A9.025,9.025,0,0,1,20.849,27.055Zm0-14.435a5.413,5.413,0,1,0,5.413,5.413A5.406,5.406,0,0,0,20.849,12.62Z"
                                                transform="translate(-1 -4.5)" fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>


                    <?php   } }  ?>

                </div>
            </div>
        </div>
    </section>
    <!-- End portfolio section -->

</main>

<?php include 'include/footer.php'; ?>