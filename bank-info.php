<?php include 'include/header.php'; ?>

<style>
hr:not([size]) {
    height: 1px;
    color: #dfdfdf;
}
.account__login--inner{
    color:white;
}
.account__login--inner > p{
    color:white;
}
.box-back{
    background:linear-gradient(to bottom, rgb(0 0 0 / 66%) 0%, rgb(126 29 29 / 95%) 59%, rgb(135 11 2 / 83%) 100%), url(assets/img/shiny.avif);
    background-size:cover;
    background-position:center;
}
</style>

<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title mb-10" style="color:white;">Bank Information</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a href="index.php"
                                    style="color:white;">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text__secondary">Bank
                                    Information</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start login section  -->
    <div class="login__section section--padding mb-5">
        <div class="container-fluid">
            <form action="#">
                <div class="login__section--inner">
                    <div class="row row-cols-md-2 row-cols-1">
                        <div class="col-md-12">
                            <div class="account__login box-back" style="">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10" style="color:white;">Your Bank Information</h2>
                                    <!-- <p class="account__login--header__desc">Login if you area a returning customer.</p> -->
                                </div>
                                <div class="account__login--inner">
                                

                                <?php 
                                     
                                    $sql="SELECT `bank_name`,`account_num`,`ifsc_code`,`micr_code` from `bank_info`";
                                    $s=$conn->prepare($sql);
                                    $s->bind_result($bank_name,$account_num,$ifsc,$micr);
                                    if($s->execute()){
                                        $s->store_result();
                                        while($s->fetch()){

                                        }  }  ?>



                                    <div class="row">
                                        <div class="col-lg-4 col-6">
                                               <p style="color:white;"><b>Bank Name:</b></p>
                                        </div>
                                        <div class="col-lg-8 col-6">
                                             <?php echo $bank_name; ?>
                                        </div>
                                    </div><hr>


                                    <div class="row">
                                        <div class="col-lg-4 col-6">
                                               <p style="color:white;"><b>Account Number:</b> </p>
                                        </div>
                                        <div class="col-lg-8 col-6">
                                        <?php echo $account_num; ?>
                                        </div>
                                    </div><hr>

                                    <div class="row">
                                        <div class="col-lg-4 col-6">
                                               <p style="color:white;"><b>IFSC Code:</b></p>
                                        </div>
                                        <div class="col-lg-8 col-6">
                                             <?php echo $ifsc; ?>
                                        </div>
                                    </div><hr>
                                            

                                    <div class="row">
                                        <div class="col-lg-4 col-6">
                                               <p style="color:white;"><b>MICR Code:</b></p>
                                        </div>
                                        <div class="col-lg-8 col-6">
                                        <?php echo $micr; ?>
                                        </div>
                                    </div><hr>



                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End login section  -->

</main>

<?php include 'include/footer.php'; ?>