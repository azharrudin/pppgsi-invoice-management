<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Work Order</title>
    <link href="{{ public_path('assets/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* General Styles */
        body {
            font-size: 12px;
            font-family: sans-serif;
        }

        .container {
            max-width: 21cm;
            margin: 0 auto;
            background: #fff;
        }


        /* A4 Styles */
    </style>
</head>

<body>

    <div class="container" id="printContent">
        <table style="width: 100%; background-color: #C9C9CB; border: 1px solid black;">
            <tr class="text-center">
                <td style="width:25%;  border-right: 0.5px solid black;"><span style="font-family: sans-serif; font-size : 24px;"><b>PPPGSI</b></span></th>
                <td rowspan="2" colspan="2" style="letter-spacing: 10px;  width:50%">
                    <h1>WORK ORDER
                        <br>(WO)
                    </h1>
                </td>
                <td rowspan="2" style="border: 0.5px solid black; width:25%"><b>No: </b></th>
            </tr>
            <tr class="text-center">
                <td style=" margin: auto;border-right: 0.5px solid black; border-top: 0.5px solid black;"><b>Building Management</b></th>
            </tr>
        </table>
        <table style="width: 100%;  border-left: 1px solid black; border-right: 1px solid black;">
            <tr>
                <td style="padding-left: 5px;" class="py-2">DATE :</td>
                <td>2 February 2024</td>
                <td></td>
                <td>ACTION DATE :</td>
                <td>2 February 2024</td>
                <td></td>
                <td>FINISH DATE :</td>
                <td>2 February 2024</td>

            </tr>
        </table>
        <table class="text-center" style="width: 100%;  border-left: 1px solid black; border-right: 1px solid black;">
            <tr>
                <td style="width: 18px; font-size: 14px;">1</td>
                <td style="font-size: 14px;">SCOPE</td>
                <td>
                    <table style="width: 100%;  border: 1px solid black;" class="text-center">
                        <tr>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked>
                                    <label for="vehicle1">TELEKOMUNIKASI</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1">ELECTRIC</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1">PLUMBING</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1">CIVIL</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1">BAS</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1">MDP</label><br>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked>
                                    <label for="vehicle1">LIGHTING</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1">HVAC</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1">LIFT</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1">FIRE SYSTEM</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1">GENSET</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1">OTHER</label><br>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 0px;"></td>
            </tr>
        </table>
        <table class="text-center" style="width: 100%;  border-left: 1px solid black; border-right: 1px solid black;">
            <tr>
                <td class="py-1" colspan="4"> </td>
            </tr>
            <tr>
                <td style="width: 20px; font-size: 14px;">2</td>
                <td style="font-size: 14px;">CLASIFICATION</td>
                <td>
                    <table style="width: 100%;  border: 1px solid black;" class="text-center">
                        <tr>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1" style="text-transform: uppercase;">Prev Maint. Routine</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1" style="text-transform: uppercase;">Prev Maint. Non Routine</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1" style="text-transform: uppercase;">Repair</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1" style="text-transform: uppercase;">Replacement</label><br>
                                </div>
                            </td>
                            <td style=" border: 1px solid black;" class="py-1">
                                <div class="">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1" style="text-transform: uppercase;">Vendor</label><br>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 0px;"></td>
            </tr>
        </table>
        <table style="width: 100%;  border-left: 1px solid black; border-right: 1px solid black;">
            <tr>
                <td class="py-1" colspan="4"> </td>
            </tr>
            <tr style="vertical-align: top;">
                <td style="width: 15px; font-size: 14px; padding-left:7px">3</td>
                <td class="text-left" style="font-size: 14px; width: 130px">JOB DESCRIPTION</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
                <td></td>
            </tr>
        </table>
        <table class="text-center" style="width: 100%;  border-left: 1px solid black; border-right: 1px solid black;">
            <tr>
                <td class="py-1" colspan="3"> </td>
            </tr>
            <tr style="vertical-align: top;">
                <td style="width: 20px; font-size: 14px;">4</td>
                <td style="padding-left: 10px;">
                    <table style="width: 100%;  border: 1px solid black;" class="text-center">
                        <thead>
                            <tr>
                                <td style=" border: 1px solid black;" class="py-1">LOCATION</td>
                                <td style=" border: 1px solid black;" class="py-1">5 MATERIAL REQUEST</td>
                                <td style=" border: 1px solid black;" class="py-1">TYPE/MADE IN</td>
                                <td style=" border: 1px solid black;" class="py-1">QUANTITY</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style=" border: 1px solid black;" class="py-1">&nbsp;</td>
                                <td style=" border: 1px solid black;" class="py-1">&nbsp;</td>
                                <td style=" border: 1px solid black;" class="py-1">&nbsp;</td>
                                <td style=" border: 1px solid black;" class="py-1">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="width: 0px;"></td>
            </tr>
        </table>
        <table class="text-center" style="width: 100%;  border-left: 1px solid black; border-right: 1px solid black;">
            <tr>
                <td style="width: 20px; font-size: 14px;">6</td>
                <td style="padding-left: 10px;">
                    <table style="width: 100%;  border: 1px solid black;" class="text-center">
                        <tbody>
                            <tr>
                                <td style=" border: 1px solid black;" class="py-1">
                                    <div class="">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1" style="text-transform: uppercase;">KLASIFIKASI</label><br>
                                    </div>
                                </td>
                                <td style=" border: 1px solid black;" class="py-1">
                                    <div class="">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1" style="text-transform: uppercase;">ClOSED</label><br>
                                    </div>
                                </td>
                                <td style=" border: 1px solid black;" class="py-1">
                                    <div class="">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1" style="text-transform: uppercase;">CANCELED</label><br>
                                    </div>
                                </td>
                                <td style=" border: 1px solid black;" class="py-1">
                                    <div class="">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1" style="text-transform: uppercase;">EXPLANATION</label><br>
                                    </div>
                                </td>
                                <td style=" border: 1px solid black;" class="py-1">
                                    <div class="">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1" style="text-transform: uppercase;">OTHERS</label><br>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="width: 0px;"></td>
            </tr>
        </table>

        <table class="text-center" style="width: 100%;  border-left: 1px solid black; border-right: 1px solid black;">
            <tr>
                <td class="py-1" colspan="4"> </td>
            </tr>
            <tr>
                <td style="width: 20px; font-size: 14px;">7</td>
                <td class="text-left" style="font-size: 14px; width:125px">TECHNICHIAN : </td>
                <td>
                    <table style="width: 100%;  border: 1px solid black;" class="text-center">
                        <tr>
                            <td style=" border: 1px solid black;" class="py-1">&nbsp;</td>
                            <td style=" border: 1px solid black;" class="py-1">&nbsp;</td>
                            <td style=" border: 1px solid black;" class="py-1">&nbsp;</td>
                            <td style=" border: 1px solid black;" class="py-1">&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 0px;"></td>
            </tr>
        </table>
        <table class="text-center" style="width: 100%; border-bottom: 1px solid black;  border-left: 1px solid black; border-right: 1px solid black;">
            <tr>
                <td class="py-1"> </td>
            </tr>
            <tr>
                <td>
                    <table style="width: 100%;  border: 1px solid black;" class="text-center">
                        <tr>
                            <td style=" border: 1px solid black;" class="py-1">TECHINICIAN</td>
                            <td style=" border: 1px solid black;" class="py-1">CHHIEF ENGINEERING</td>
                            <td style=" border: 1px solid black;" class="py-1">WARE HOUSE</td>
                            <td style=" border: 1px solid black;" class="py-1">BUILDING MANAGER</td>
                        </tr>
                        <tr>
                            <td style=" border: 1px solid black;" class="py-5">&nbsp;</td>
                            <td style=" border: 1px solid black;" class="py-5">&nbsp;</td>
                            <td style=" border: 1px solid black;" class="py-5">&nbsp;</td>
                            <td style=" border: 1px solid black;" class="py-5">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>