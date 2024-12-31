<?php include 'include/header.php';  ?>

<style>
.content-privacy p{
    color:white;
}
</style>

    <main class="main__content_wrapper">
        
         <!-- Start breadcrumb section -->
         <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content">
                            <h1 class="breadcrumb__content--title mb-10" style="color:white;">Privacy Policy</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a href="index.php" style="color:white;">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text__secondary">Privacy Policy</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->


                        <?php  
                           $sql="SELECT `page_menu`,`media`,`content` from `static_page` where `id`=6 and `status`=1";
                           $s=$conn->prepare($sql);
                           $s->bind_result($page_menu,$image,$content);
                           if($s->execute()){
                           $s->store_result();
                              while($s->fetch()){
                              } }          
                        ?>

        <div class="container pt-5 pb-5 content-privacy">
            <div class="row">
                <h2 ><?php echo $page_menu; ?></h2>
            </div>


            <?php echo html_entity_decode($content); ?>


            

        </div>




    
    </main>





<?php include 'include/footer.php';  ?>