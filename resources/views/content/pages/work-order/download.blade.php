<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surat Pesan</title>
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
        <table class="table" style="width: 100%;" style="border: 0.5px solid black;">
            <thead style="background-color: #C9C9CB; border: 1px solid black; border-collapse: collapse;" >
                <tr class="text-center">
                    <th style="border: 0.5px solid black;"><span style="font-family: sans-serif; font-size : 24px;"><b>PPPGSI</b></span></th>
                    <th rowspan="2" colspan="2" style="letter-spacing: 10px; border: 0.5px solid black;">
                        <h1>WORK ORDER
                            <br>(WO)
                        </h1>
                    </th>
                    <th rowspan="2" style="border: 0.5px solid black;">No: <br> </th>
                </tr>
                <tr class="text-center">
                    <th style="border: 0.5px solid black; margin: auto;"><span>Building Management</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Date :</td>
                    <td></td>
                    <td>Date :</td>
                    <td></td>
                   
                   
                </tr>

                <tr class="text-center">
                    <th>TECHNICIAN</th>
                    <th>CHIEF ENGINEERING</th>
                    <th>WARE HOUSE</th>
                    <th>BUILDING MANAGER</th>
                </tr>
            </tbody>
        </table>

    </div>
</body>

</html>