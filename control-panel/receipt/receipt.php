<?php
session_start();
include '../include/connection.php';
include '../include/function_db.php';
include './indian_rupee_to_word.php';
record_set($conn,'get_website',"SELECT `domain`,`image`,`school`,`facebook`,`twitter`,`youtube`,`linkdin`,`whatsapp`,`instagram`,`address_1`,`address_2`,`email`,`cus_care_num`,`mobile_1`,`mobile_2`,`president`,`secretary` FROM `website_data` WHERE 1");
        $row_web=mysqli_fetch_array($get_website);
record_set($conn,'get_user',"SELECT `receipt_id`,`name`,`mobile`,`email`,`amount`,`entry_time` FROM `donate_us` WHERE `id`='".$_GET['id']."'");
        $row_user=mysqli_fetch_array($get_user);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/favicon.png" rel="icon" />
    <title>Donation - Receipt</title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
======================= -->
    <link rel='stylesheet' href='./assets/font.css' type='text/css'>

    <!-- Stylesheet
======================= -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/fontawesome.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheet.css" />
    <style>
    .text {
        font-size: 19px;
        line-height: 40px;
        text-align: justify;
        color: #545454;
        font-family: "Lato", sans-serif;
    }

    @page {
        size: landscape;
    }
    </style>
</head>

<body>
    <!-- Container -->
    <div class="container-fluid invoice-container" style="margin-top:60px;">
        <!-- Header -->
        <header>
            <div class="row align-items-center gy-3">
                <div class="col-sm-7 text-center text-sm-start">
                    <img id="logo" src="assets/logo.png" title="bkassociate" alt="bkassociate" style="width:200px;" />
                </div>
                <div class="col-sm-5 text-center text-sm-end">
                    <h4 class="text-7 mb-0">Receipt</h4>
                </div>
            </div>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <div class="row">
                <div class="col-sm-6"><strong>Date:</strong><?php echo date('d/m/Y',strtotime($row_user['entry_time']));?></div>
                <div class="col-sm-6 text-sm-end"> <strong>Receipt No:</strong> <?php echo $row_user['receipt_id'];?></div>

            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 text-sm-end order-sm-1"> <strong>&nbsp;</strong>
                    <address>
                        <img src="assets/email.png"
                        style="width:15px;">  <?php echo $row_web['email'];?> <br />
                        <img src="assets/phone.png"
                        style="width:15px;">  <?php echo $row_web['mobile_1'];?><br />
                        <img src="assets/website.png"
                        style="width:15px;">  <?php echo $row_web['domain'];?><br />
                    </address>
                </div>
                <div class="col-sm-6 order-sm-0"> <strong>From :</strong>
                    <address>
                        Vikash Foundation<br />
                        <?php echo $row_web['address_1'];?></br>
                        <?php echo $row_web['email'];?>
                    </address>
                </div>
            </div>
            <div class="row" style="margin-top:25px;">
                <h5 class="text">Received with thanks from <strong><?php echo $row_user['name'];?></strong>
                    the sum of rupees <?php echo $row_user['amount']?>-/(<?php echo indain_rupee_in_words($row_user['amount']);?>) for the donation in <strong>Vikash Foundation
                    </strong> By Online  Dated on <?php echo date('d/m/Y',strtotime($row_user['entry_time']));?></h5>
            </div>

        </main>
        <!-- Footer -->
        <footer class="text-center mt-4">
            <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical
                signature.</p>
                
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()"
                    class="btn btn-light border text-black-50 shadow-none"><img src="assets/printer.png"
                        style="width:15px;"> Print &
                    Download</a> </div>
        </footer>
    </div>
</body>

</html>