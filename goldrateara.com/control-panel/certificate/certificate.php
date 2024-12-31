<?php
session_start();
include '../include/connection.php';
include '../include/function_db.php';
include '../common/getAdminName.php';
record_set($conn,'get_website',"SELECT `domain`,`image`,`school`,`facebook`,`twitter`,`youtube`,`linkdin`,`whatsapp`,`instagram`,`address_1`,`address_2`,`email`,`cus_care_num`,`mobile_1`,`mobile_2`,`president`,`secretary` FROM `website_data` WHERE 1");
        $row_web=mysqli_fetch_array($get_website);
record_set($conn,'get_member',"SELECT `name`,`father_name`,`block`,`cdate`,`purpose` FROM `manage_certificate` WHERE `id`='".$_GET['id']."'");
        $row_member=mysqli_fetch_array($get_member);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        .test {
            /* object-fit: cover; */
            z-index: 1;
            display: block;
            /* width: 100%;
            height: 100%; */
            /* border-radius: 100%; */
            border: 3px solid white;
            /* filter: grayscale(100%) contrast(400%); */
            opacity: .1;
        }
        
        .shadow {
            position: absolute;
            /* border-radius: 100%; */
            box-shadow: 0 0rem 1rem rgba(0, 0, 0, 0)!important;
            border: 3px solid white;
            z-index: 2;
            /* width: 100%;
            height: 100%; */
            top: 156px;
            left: 0;
            background-image: radial-gradient(rgba(white, 0), rgba(white, 1) 80%);
        }
    </style>
</head>

<body>
    <div class="container pm-certificate-container">
        <div class="outer-border"></div>
        <div class="inner-border"></div>

        <div class="pm-certificate-border col-xs-12">
            <div class="row pm-certificate-header">
                <div class="pm-certificate-title cursive col-xs-12 text-center">
                    <h2>Vikash Foundation</h2>
                    <p style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;margin-top: -15px;
    line-height: 18px;">Head Office: <?php echo $row_web['address_1'];?><Br>Mobile:<?php echo $row_web['mobile_1'];?><Br>Email:<?php echo $row_web['email'];?></p>
                    <h1 style="font-family:'auto';font-weight:900;">CERTIFICATE</h1>
                </div>
            </div>

            <div class="row pm-certificate-body">

                <div class="pm-certificate-block">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-2">
                                <!-- LEAVE EMPTY -->
                            </div>
                            <div class="pm-certificate-name underline margin-0 col-xs-8 text-center">
                                <span class="pm-name-text bold">नाम: श्रीमती/ श्री   <?php echo $row_member['name'];?>  पिता   <?php echo $row_member['father_name'];?>  प्रखंड  <?php echo $row_member['block'];?> पद  <?php echo $row_member['purpose'];?>  से सम्मानित किया जा रहा / रही हैं |</span>
                            </div>
                            <div class="col-xs-2">
                                <!-- LEAVE EMPTY -->
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-2">
                               
                            </div>
                            <div class="pm-earned col-xs-8 text-center">
                                <span class="pm-earned-text padding-0 block cursive">has earned</span>
                                <span class="pm-credits-text block bold sans">PD175: 1.0 Credit Hours</span>
                            </div>
                            <div class="col-xs-2">
                              
                            </div>
                            <div class="col-xs-12"></div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-2">
                             
                            </div>
                            <div class="pm-course-title col-xs-8 text-center">
                                <span class="pm-earned-text block cursive">while completing the training course entitled</span>
                            </div>
                            <div class="col-xs-2">
                              
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-2">
                               
                            </div>
                            <div class="pm-course-title underline col-xs-8 text-center">
                                <span class="pm-credits-text block bold sans">BPS PGS Initial PLO for Principals at Cluster Meetings</span>
                            </div>
                            <div class="col-xs-2">
                               
                            </div>
                        </div>
                    </div> -->

                </div>
                <div class="row">
                    <img src="logo.png" class="test shadow">
                </div>
                <div class="col-xs-12" style="margin-top:100px;">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="col-xs-4 pm-certified col-xs-4 text-center">
                                <span class="pm-credits-text block sans">President</span>

                                <span class="bold block"><?php echo $row_web['president'];?></span>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="col-xs-4 pm-certified col-xs-4 text-center">
                                <span class="pm-credits-text block sans">Secretary</span>

                                <span class="bold block"><?php echo $row_web['secretary'];?></span>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>

</html>