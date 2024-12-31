<?php 
include 'control-panel/include/connection.php';

if(isset($_COOKIE['id'])){
    $id=$_COOKIE['id'];


$sql="SELECT `name`,`email`,`phone` from `customers` where `id`='$id'";
     $s=$conn->prepare($sql);
     $s->bind_result($name_fetch,$email_fetch,$mobile_fetch);
    if($s->execute()){
       $s->store_result();
       while($s->fetch()){

       }
   }
}
else{
   header('location:login.php');
}


include 'include/header.php'; 

?>

<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title mb-10" style="color:white;">My Account</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a href="index.php"
                                    style="color:white;">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text__secondary">My Account</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- my account section start -->
    <section class="my__account--section section--padding mb-5">
        <div class="container">

            <div class="my__account--section__inner border-radius-10 d-flex account-box">
                <div class="account__left--sidebar">
                    <!-- <h2 class="account__content--title h3 mb-20">My Profile</h2> -->
                </div>

                <div class="account__wrapper">
                    <div class="account__content" style="color:white;">
                        <h2 class="account__content--title h3 mb-20" >Personal Information</h2>
                        <hr>



                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    <input type="text" value="<?php echo $name_fetch; ?>" class="form-control" id="exampleFormControlInput1"
                                        style="font-size:17px;">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" value="<?php echo $email_fetch; ?>" class="form-control" id="exampleFormControlInput1"
                                        style="font-size:17px;">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Mobile</label>
                                    <input type="text" value="<?php echo $mobile_fetch; ?>" class="form-control" id="exampleFormControlInput1"
                                        style="font-size:17px;">
                                </div>
                            </div>



                        </div>

                        <!-- <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-danger btn-lg" style="color:white;">Save Changes</button>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account section end -->

</main>

<?php include 'include/footer.php'; ?>