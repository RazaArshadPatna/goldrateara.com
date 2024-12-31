<?php include 'include/header.php';  ?>

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
        
         <!-- Start breadcrumb section -->
         <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content">
                            <h1 class="breadcrumb__content--title mb-10" style="color:white;">About Us</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a href="index.php" style="color:white;">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text__secondary">About Us</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->




        <!-- Start about section -->


        <?php  
         $sql="SELECT `page_menu`,`media`,`content` from `static_page` where `id`=4 and `status`=1";
         $s=$conn->prepare($sql);
         $s->bind_result($page_menu,$image,$content);
         if($s->execute()){
            $s->store_result();
            while($s->fetch()){

        ?>

<?php } } ?>

    <section class="about__section border-bottom pt-5" style="padding-bottom:80px;">
        <div class="container">
            <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1 align-items-center">



                <div class="col-lg-6">
                    <div class="about__content">
                        <h2 class="about__content--title mb-18" style=" color:#000000;"><?php echo $page_menu; ?></h2>
                        <div class="about__content--step mb-25 abt">

                            <?php echo html_entity_decode($content); ?>

                        </div>

                       <!--<a class="about__content--btn primary__btn" href="#">More Detail</a>-->
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

<?php include 'include/footer.php';  ?>