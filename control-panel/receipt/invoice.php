<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/favicon.png" rel="icon" />
    <title>Bk Associate - Invoice</title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
======================= -->
    <link rel='stylesheet' href='./assets/font.css' type='text/css'>

    <!-- Stylesheet
======================= -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.css" />
    <link rel="stylesheet" href="assets/fontawesome.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheet.css" />
    <style>
    .height {
        line-height: 5px;
        font-family: "Lato", sans-serif;
    }
    </style>
</head>

<body>
    <!-- Container -->
    <div class="container-fluid invoice-container">
        <!-- Header -->
        <header>
            <div class="row align-items-center gy-3">
                <div class="col-sm-7 text-center text-sm-start">
                    <img id="logo" src="assets/logo.png" title="bkassociate" alt="bkassociate" style="width:200px;" />
                </div>
                <div class="col-sm-5 text-center text-sm-end">
                    <h4 class="text-7 mb-0">Invoice</h4>
                </div>
            </div>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <div class="row">
                <div class="col-sm-6"><strong>Date:</strong> 05/02/2024</div>
                <div class="col-sm-6 text-sm-end"> <strong>Invoice No:</strong> 16835</div>

            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 text-sm-end order-sm-1"> <strong>From:</strong>
                    <address>
                        BK Associates Pvt. Ltd<br />
                        New By pass Patna Road<br />
                        Digha Road, Pin - 800004<br />
                        contact@bkassociates.com
                    </address>
                </div>
                <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
                    <address>

                        Chirag Corporation Pvt. Ltd.<br />
                        New Asiyana Road<br />
                        Churi Market Nala Road<br />
                        Patna, 800026
                    </address>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table border mb-0">
                    <thead>
                        <tr class="bg-light">
                            <td class="col-3"><strong>Services</strong></td>

                            <td class="col-2 text-center"><strong>Rate</strong></td>
                            <td class="col-1 text-center"><strong>Discount</strong></td>
                            <td class="col-2 text-end"><strong>Amount</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-3">Design</td>

                            <td class="col-2 text-center">&#8377;50.00</td>
                            <td class="col-1 text-center">&#8377;50</td>
                            <td class="col-2 text-end">&#8377;500.00</td>
                        </tr>
                        <tr>
                            <td>Development</td>

                            <td class="text-center">&#8377;120.00</td>
                            <td class="text-center">&#8377;10</td>
                            <td class="text-end">&#8377;1200.00</td>
                        </tr>
                        <tr>
                            <td>SEO</td>

                            <td class="text-center">&#8377;450.00</td>
                            <td class="text-center">&#8377;55</td>
                            <td class="text-end">&#8377;450.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                <table class="table border border-top-0 mb-0">
                    <tr class="bg-light">
                        <td class="text-end"><strong>Sub Total:</strong></td>
                        <td class="col-sm-2 text-end">&#8377;2150.00</td>
                    </tr>
                    <tr class="bg-light">
                        <td class="text-end"><strong>CGST(18%):</strong></td>
                        <td class="col-sm-2 text-end">&#8377;25.00</td>
                    </tr>
                    <tr class="bg-light">
                        <td class="text-end"><strong>SGST(18%):</strong></td>
                        <td class="col-sm-2 text-end">&#8377;15.00</td>
                    </tr>
                    <tr class="bg-light">
                        <td class="text-end"><strong>IGST(18%):</strong></td>
                        <td class="col-sm-2 text-end">&#8377;45.00</td>
                    </tr>
                    <tr class="bg-light">
                        <td class="text-end"><strong>Total:</strong></td>
                        <td class="col-sm-2 text-end">&#8377;2365.00</td>
                    </tr>
                </table>
            </div>
            <div class="row" style="margin-top:50px;">
                <h6>Account Details</h6>
                <p class="height">Bank: State Bank Of India</p>
                <p class="height">Branch: Dak Bungla Chouraha Patna</p>
                <p class="height">A/C Name: Bk Associates Corporation</p>
                <p class="height">A/C No.: 20054702939124</p>
                <p class="height">IFSC: SBIN0000054784</p>
                
                

            </div>
        </main>
        <!-- Footer -->
        <footer class="text-center mt-4">
            <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical
                signature.</p>
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()"
                    class="btn btn-light border text-black-50 shadow-none"><img src="assets/printer.png"
                        style="width:15px;"> Print & Download</a> </div>
        </footer>
    </div>
</body>

</html>