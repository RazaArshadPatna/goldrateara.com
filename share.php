<?php include 'include/header.php'; ?>


<style>
.wp-share {
	display: block;
	background:#00005c;
	max-width: 100%;
	padding: 8px 12px;
	color: #fff;
	font-weight: 700;
	font-size: 17px;
	text-align: center;
	letter-spacing: 0.5px;
	margin: auto;
	border-radius: 10px;
	transition: all .3s;
}
</style>

<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title mb-10" style="color:white;">Share App</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a href="index.php"
                                    style="color:white;">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text__secondary">Share App</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <?php 

     $sql="SELECT `media`,`page_menu`,`content` from static_page where id=13";
     $s=$conn->prepare($sql);
     $s->bind_result($img,$heading,$link);
     if($s->execute()){
        $s->store_result();
        while($s->fetch()){

        }
     }
   
    ?>


    <!-- Start login section  -->
    <div class="login__section section--padding mb-5">
        <div class="container">
            <form action="#">
                <div class="login__section--inner">
                    <div class="row row-cols-md-2 row-cols-1">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="account__login">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10"><?php echo $heading; ?></h2>
                                </div>
                                <div class="account__login--inner">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="upload/static/<?php echo $img; ?>" style="height:300px;">
                                        </div>

                                        <!-- <div class="col-md-6"
                                            style="display:flex;align-items:center;justify-content:center;">
                                            <a href="#">Your Domain Name</a>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">

                            <!-- For Web -->
                            <br><a class='wp-share' href='https://api.whatsapp.com/send?text=Click below link to know more detail: https://basantlal.com'
                                target="_blank">https://goldrateara.com</a>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End login section  -->

</main>

<?php include 'include/footer.php'; ?>