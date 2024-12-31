<?php include 'include/header.php'; ?>

    <main class="main__content_wrapper">
        
         <!-- Start breadcrumb section -->
         <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content">
                            <h1 class="breadcrumb__content--title mb-10" style="color:white;">Product</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a href="index.php" style="color:white;">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text__secondary">Product</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->


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
        <section class="team__section section--padding mb-5">
        <div class="container">

            <div class="team__container text-center">
                <div class="row row-cols-md-3 row-cols-sm-2 row-cols-2 mb--n30">
                    
                
                    <?php 
                        $sql="SELECT `heading`,`price`,`img`,`entry_time` from `products` where `status`='active'";
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

                                        <a class="last-update">Last Updated on <?php echo date("d-m-Y",strtotime($date)); ?></a>
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

                
            </div>
        </div>
    </section>
    <!-- End Product section -->








    </main>

 <?php include 'include/footer.php'; ?>