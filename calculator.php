<?php 
session_start();

include 'include/header.php'; 
$charge=0;
?>

<style>
.modal {
    top: 105px;
}

.bmi-calculator {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100%;

}

.calculator-box {
    background: linear-gradient(to bottom, rgb(0 0 0 / 66%) 0%, rgb(126 29 29 / 95%) 59%, rgb(135 11 2 / 83%) 100%), url(assets/img/shiny.avif);
    background-size: cover;
    background-position: center;
}

.app-container {
    text-align: center;
    padding: 3.8rem;
    border-radius: 16px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    background: linear-gradient(to bottom, rgb(0 0 0 / 66%) 0%, rgb(126 29 29 / 95%) 59%, rgb(135 11 2 / 83%) 100%), url(assets/img/shiny.avif);
    background-size: cover;
    background-position: center;
}

.title {
    font-size: 23px;
    font-weight: 900;
    color: white;
}

.form {
    text-align: left;
    color: white;
}

.inputs {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.5rem;
    margin-block: 1.5rem;
}

label {
    display: block;
    font-weight: var(--fw-medium);
}

input {
    font-size: var(--fs-smaller);
    font-weight: var(--fw-medium);
    padding: 0.2rem;
    background: aliceblue;
    width: 100%;
}

.status {
    font-size: var(--fs-x-small);
    color: rgba(var(--col-dark), 0.8);
}

.status b {
    color: var(--col-dark);
}

.btn-submit {
    display: block;
    color: var(--col-white);
    margin: 1rem auto;
    padding: 0.5rem 4rem;
    background: var(--col-primary);
    border-radius: 2rem;
    box-shadow: rgb(163 163 163 / 67%) 0px 1px 3px, rgb(139 133 133) 0px 1px 2px;
    border: none;
    background: #bf0000;
    cursor: pointer;
}

canvas {
    width: 100%;
    height: 100%;
}
</style>



<?php 
 
     $sql="SELECT `rate`,`making`,`gst` from `calculator`";
     $s=$conn->prepare($sql);
     $s->bind_result($rate,$making,$gst);
     if($s->execute()){
        $s->store_result();
        while($s->fetch()){
            
        }
     }

?>




<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title mb-10" style="color:white;">Calculator</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a href="index.php"
                                    style="color:white;">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text__secondary">Calculator</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->







    <div class="login__section section--padding mb-5">
        <div class="container">



            <section class="calculator-box text-white text-center  p-5" style="border-radius:7px;">

                <h1 class="title text-center">Calculate Your Jewellery Rate</h1>

                <div class="row pb-5">
                    <div>
                        <a class="btn btn-primary btn-lg" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" style="font-size:14px;">Select Your Items</a>
                    <?php if(isset($_SESSION['name'])){ ?>
                        <a href="remove.php" class="btn btn-danger btn-lg mt-2" style="float:right;" >Refresh/Remove</a>
                    <?php }  ?>
                    </div>
                    <div>
                        
                    </div>
                </div>
                <?php  if(isset($_SESSION['name'])){?>
                <div class="row">

                    <div class="col-lg-6 col-6">
                        <div class="inputs--weight">
                            <label for="ornaments" style="font-weight:800;">Items</label>

                            <?php 
                           
                                foreach($_SESSION['name'] as $key=>$value){
                                    echo $value['name']."<br>";
                                }
                            
                            ?>

                        </div>
                        <hr>
                        <div id="result">
                            <b style="font-size:22px;color:white;"></b><span id="bmi-value"
                                style="display: block;color:white;">Total Gross Weight</span>
                        </div><br>
                    </div>

                    <div class="col-lg-6 col-6">
                        <div class="inputs--weight">
                            <label for="weight" style="font-weight:800;">Weight</label>

                            <?php 
                            $sum=0;
                            foreach($_SESSION['weight'] as $key=>$value){
                                   echo $value['weight'].' gms'."<br>";
                                   $sum=$sum+$value['weight'];
                            }
                            ?>

                        </div>
                        <hr>
                        <div id="result">
                            <b style="font-size:22px;color:white;"></b><span id="bmi-value"
                                style="display: block;color:white;"><?php echo $sum.' gms'; ?></span>
                        </div><br>



                    </div>

                </div>


                <div class="row">
                    <div class="col-lg-6 col-6">

                        <div id="result">
                            <span style="font-size:14px;color:white;">Total</span>
                        </div>



                    </div>

                    <div class="col-lg-6 col-6">
                        <div id="result">
                            <span style="font-size:16px;color:white;">&#8377; <?php $am=$sum*$rate; echo round($am,2);?></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-6">

                        <div id="result">
                            <span style="font-size:16px;color:white;">Making Charge</span>
                        </div>



                    </div>

                    <div class="col-lg-6 col-6">
                        <div id="result">
                            <span style="font-size:16px;color:white;">&#8377; <?php  $mk = (($am*$making)/100); echo round($mk,2);?></span>
                        </div>
                    </div>


                    <div class="col-lg-6 col-6">

                        <div id="result">
                            <span style="font-size:14px;color:white;">GST</span>
                        </div>



                    </div>

                    <div class="col-lg-6 col-6">
                        <div id="result">
                            <span style="font-size:14px;color:white;">&#8377; <?php  $gt = ((($am+$mk)*$gst)/100); echo round($gt,2);?></span>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-6 col-6">

                        <div id="result">
                            <span style="font-size:14px;color:white;">Grand Total</span>
                        </div>



                    </div>

                    <div class="col-lg-6 col-6">
                        <div id="result">
                            <span style="font-size:14px;color:white;">&#8377; <?php $total_amt= $am+$mk+$gt; echo round($total_amt,2);?></span>
                        </div>
                    </div>
                </div>
                <?php }?>

                <!-- <button type="submit" class="btn-submit">Calculate Price</button> -->



            </section>


            <p id="demo"></p>
        </div>
    </div>

</main>




<?php include 'include/footer.php'; ?>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4"
            style="background:linear-gradient(to bottom, rgb(0 0 0 / 66%) 0%, rgb(126 29 29 / 95%) 59%, rgb(135 11 2 / 83%) 100%), url(assets/img/shiny.avif);background-size:cover;background-position:center;color:white;">
            <div class="modal-header" style="border-bottom:0px">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="action/calculator.php" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="ornaments">Choose Jwellery</label>
                                <select id="ornaments" name="name" class="form-control"
                                    style="font-size:16px;background-color:aliceblue;">
                                     <option value="">Select</option>
                                     <?php  
                                       $sql="SELECT `name` from `additems` where `status`=1";
                                       $s=$conn->prepare($sql);
                                       $s->bind_result($name);
                                       if($s->execute()){
                                        $s->store_result();
                                        while($s->fetch()){

                                    ?>        
                                      <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                                     <?php   } } ?>
                                    
                                   
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="weight">Weight(In Gram)</label>
                                <input type="text" name="weight" value="" style="font-size:18px;" required>
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer" style="border-top:0px;">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    style="font-size:13px;">Close</button> -->
                <button type="submit" class="btn btn-primary" style="font-size:13px;" name="submit">Ok</button>
            </div>
            </form>
        </div>
    </div>
</div>

