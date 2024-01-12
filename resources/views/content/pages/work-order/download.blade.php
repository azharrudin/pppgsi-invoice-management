<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Surat Pesan</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous">
        <script
            src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

        <style>
                /* General Styles */
                body {
                    font-size: 10px;
                   
                }

                .main-table, .main-table th, .main-table td {
                    border: 0.5px solid;
                }

               
                .container {
                    max-width: 21cm;
                    margin: 0 auto;
                    background: #fff;
                    padding: 1cm;
                   
                }
        
               /* A4 Styles */
            @media print {
                body {
                    font-size: 10px;
                    margin: 0;
                    padding: 0;
                }

                .container {
                    width: 21cm;
                    min-height: 29.7cm;
                    margin: auto; /* Center content on the page */
                }

                .ttd img {
                    width: 130px;
                }

                .row img {
                    width: 180px;
                }
            }
            </style>
    </head>
    <body>

        <div class="container" id="printContent">
            <!-- <header>
                <img src="kop.jpg" alt="kop surat" width="100%">
            </header> -->
            <table class="mt-4 main-table" style="width: 100%;">
                <thead>
                    <tr class="text-center">
                        <th><h4>PPPGSI</h4></th>
                        <th rowspan="2" colspan="2"><h4>WORK ORDER
                                <br>(WO)</h4></th>
                        <th rowspan="2">No: <br> </th>
                    </tr>
                    <tr>
                        <th>Building Management</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4">
                            <div class="row mt-2">
                                <div class="col d-flex">
                                    DATE:
                                    <div class="kotak"
                                        style="border:0.5px solid black; width: 40px;"></div>
                                    <div class="kotak"
                                        style="border:0.5px solid black; width: 40px;"></div>
                                    <div class="kotak"
                                        style="border:0.5px solid black; width: 40px;"></div>
                                </div>
                                <div class="col d-flex">
                                    Action plane:
                                    <div class="kotak"
                                        style="border:0.5px solid black; width: 40px;"></div>
                                    <div class="kotak"
                                        style="border:0.5px solid black; width: 40px;"></div>
                                    <div class="kotak"
                                        style="border:0.5px solid black; width: 40px;"></div>
                                </div>
                                <div class="col d-flex">
                                    Finish plane:
                                    <div class="kotak"
                                        style="border:0.5px solid black; width: 20px;"></div>
                                    <div class="kotak"
                                        style="border:0.5px solid black; width: 60px;"></div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-2">
                                    <h6>1. SCOPE </h6>
                                </div>
                                <div class="col-10 d-flex">

                                    <table style="width: 100%;">
                                        <tr class="text-center">
                                            <th>TELEKOMUNASI</th>
                                            <th>ELECTRIC</th>
                                            <th>PUMBLING</th>
                                            <th>CIVIL</th>
                                            <th>BAS</th>
                                            <th>NDP</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>LIGHTING</th>
                                            <th>HVAC</th>
                                            <th>LIFT</th>
                                            <th>FIRE SYSTEM</th>
                                            <th>GANSET</th>
                                            <th>OTHER</th>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <h6>2. CLASIFICATION </h6>
                                </div>
                                <div class="col-9 d-flex">

                                    <table style="width: 100%;">
                                        <tr>
                                            <th>PREV.MAINT.ROUTINE</th>
                                            <th>PREV.MAINT.NON ROUTINE</th>
                                            <th>REPAIR</th>
                                            <th>REPLECEMENT</th>
                                            <th>VENDOR</th>
                                        </tr>

                                    </table>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <h6>3. JOB DESCRIPTION </h6>
                                </div>
                                <div class="col-9 d-flex">

                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-1">
                                    <h6>4.</h6>
                                </div>
                                <div class="col-11 d-flex">
                                    <table style="width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th>LOCATION</th>
                                                <th>5. MATERIAL REQUEST</th>
                                                <th>TYPE/ MADE IN</th>
                                                <th>QUANTITY</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <h6>6.</h6>
                                </div>
                                <div class="col-11 d-flex">
                                    <table style="width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th>KLASIFIKASI</th>
                                                <th>CLOSED</th>
                                                <th>CANCELED</th>
                                                <th>EXPLANATION</th>
                                                <th>OTHER</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <h6>7. TECHNICIAN : </h6>
                                </div>
                                <div class="col-9 d-flex">

                                    <table style="width: 100%;">
                                        <tr class="text-center">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                    </table>
                                </div>

                            </div>
                        </td>
                    </tr>

                    <tr class="text-center">
                        <th>TECHNICIAN</th>
                        <th>CHIEF ENGINEERING</th>
                        <th>WARE HOUSE</th>
                        <th>BUILDING MANAGER</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <!-- <script>
                function downloadPDF(elementId) {
                    var element = document.getElementById(elementId);
                   
                    var options = {
                        margin: 0, 
                        filename: 'surat.pdf',
                        image: { type: 'jpeg', quality: 2 }, 
                        html2canvas: { scale: 3 },
                        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                    };
            
                    html2pdf(element, options);
                }
            </script> -->
    </body>
</html>