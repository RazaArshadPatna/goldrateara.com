<?php include 'include/header.php'; ?>
<style>
    .abt p{
        color:#fff;
    }
    .abt ul  li {
    list-style: revert-layer;
    line-height: 1;
    color: white;
}
</style>
<main class="main__content_wrapper">



    <!--slider-->
    <div id="carouselExampleControls" class="carousel slide pt-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            
             <?php 
             $i=0;
                 $sql="SELECT `image` from `banner`";
                 $s=$conn->prepare($sql);
                 $s->bind_result($image);
                 if($s->execute()){
                    $s->store_result();
                    while($s->fetch()){
            ?>


            <div class="carousel-item <?php if($i==0){ echo 'active' ; } ?> slider-padding">
                <img src="upload/slider/<?php echo $image; ?>" class="d-block w-100 slider-height" alt="..." style="border-radius:10px;">
            </div>
     
            
            
            <?php $i++;  }  } ?>

            <!-- <div class="carousel-item slider-padding">
                <img src="assets/img/slider/pic1.avif" class="d-block w-100 slider-height" alt="..."
                    style="border-radius:10px;">
            </div> -->
            
            

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--Slider-->




    <?php  

        $sql="SELECT `page_menu` from static_page where id=7";
        $s=$conn->prepare($sql);
        $s->bind_result($wathsapp);
        if($s->execute()){
            $s->store_result();
            while($s->fetch()){

            }
        }

    ?>





    <!-- Start Product section -->
    <section class="team__section section--padding">
        <div class="container">
            <div class="section__heading text-center mb-50">
                <h2 class="section__heading--maintitle text__secondary mb-10 browse-font" style="color:#000000;">Browse
                    Rate List</h2>
                <!-- <p class="section__heading--desc" style="color:white;">Our offerings include a stunning array of gold jewellery, exquisite diamond pieces, as well as silver and precious stones</p> -->
            </div>
            <div class="team__container text-center">
                <div class="row row-cols-md-3 row-cols-sm-2 row-cols-2 mb--n30">
                    
                
                    <?php 
                        $sql="SELECT `heading`,`price`,`img`,`entry_time` from `products` where `status`='active' limit 4";
                        $s=$conn->prepare($sql);
                        $s->bind_result($name,$price,$img,$date);


                        if($s->execute()){
                            $s->store_result();
                            while($s->fetch()){
                    ?>

                    

                    <div class="col-lg-6  mb-30 col-md-6 col-sm-6">
                        <article class="team__card">
                            <div class="team__card--thumbnail">
                                <img class="team__card--thumbnail__img display-block"
                                    src="upload/product/<?php echo $img; ?>" alt="team-thumb">
                            </div>
                            <div class="team__card--content ">
                                <h3 class="team__card--content__title"><?php echo $name; ?></h3>
                                <span class="team__card--content__subtitle text__secondary"><?php echo $price; ?>/ g</span>
                                <ul class="team__card--content__info">

                                    <li class="team__card--content__info--list">
                                   
                                        <a class="last-update">Last Updated on <?php echo  date("d-m-Y",strtotime($date)); ?></a>
                                    </li>
                                    <li class="team__card--content__info--list icon-product" style="">

                                     <a href="tel:+<?php echo $mobile1; ?>"><i class="fa-solid fa-phone-volume"></i></a>
                                    <a href="https://api.whatsapp.com/send?text=<?php echo $wathsapp; ?>: https://basantlal.com"><i class="fa-brands fa-square-whatsapp" style='color:green;font-size: 27px;'></i></a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>

                    <?php } } ?>

                </div>

                
                    <br><a class="about__content--btn primary__btn" href="product.php">View More</a>
                  


            </div>
        </div>
    </section>
    <!-- End Product section -->




    <!-- Banner2 section -->


    <section class="newsletter__section newsletter__bg2">
        <div class="container-fluid">
            <div class="row offer-slider owl-carousel owl-theme">

            <?php
                $sql="SELECT `image` from offer where `status`='Publish'";
                $s=$conn->prepare($sql);
                $s->bind_result($image);
                if($s->execute()){
                    $s->store_result();
                    while($s->fetch()){
            ?>
            

                <div class="slide slide1" style="margin:9px;">
                    <img src="upload/banner/<?php echo $image; ?>" style="border-radius:20px;">
                </div>

            <?php  } } ?>
               

            </div>
        </div>
    </section>


    <!-- Banner2 section -->




    <!-- Start about section -->



    <?php  
         $sql="SELECT `page_menu`,`media`,`content` from `static_page` where `id`=4 and `status`=1";
         $s=$conn->prepare($sql);
         $s->bind_result($page_menu,$image,$content);
         if($s->execute()){
            $s->store_result();
            while($s->fetch()){

    ?>
  <?php  } } ?>
    <section class="about__section border-bottom pt-5" style="padding-bottom:80px;">
        <div class="container">
            <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1 align-items-center">



                <div class="col-lg-6">
                    <div class="about__content">
                        <h2 class="about__content--title mb-18" style=" color:#000000;"><?php echo $page_menu; ?></h2>
                        <div class="about__content--step mb-25 abt">


                           <?php echo html_entity_decode($content); ?>

                        </div>

                        <a class="about__content--btn primary__btn" href="about.php">More Detail</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about__thumbnail">
                        <img class="display-block" src="upload/static/<?php echo $image; ?>" alt="about-thumb"
                            style="border-radius:10px;">
                    </div>
                </div>



            </div>
        </div>
    </section>

    <!-- End about section -->


</main>

<?php include 'include/footer.php'; ?>