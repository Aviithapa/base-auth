<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Certificate</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
            font-family: "Times New Roman", serif;
            margin: 50px;
            padding: 0;
        }

        .certificate {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            position: relative;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 50px;
        }

        .header-table td {
            vertical-align: middle;
        }

        .title-container {
            text-align: center;
        }

        .logo,
        .qrcode {
            width: 150px;
            height: 120px;
        }

        .title {
            font-size: 36px;
            font-weight: bold;
            margin: 0;
        }

        .subtitle {
            font-size: 24px;
            font-style: italic;
            margin: 0;
        }

        .content {
            font-size: 22px;
            line-height: 1.6;
            text-align: center;
            margin: 0 auto;
            width: 80%;
        }

        .participant-name {
            font-weight: bold;
            font-size: 38px;
            color: #000280;
            text-decoration: underline;
        }

        .footer-table {
            width: 100%;
            border-collapse: collapse;
            position: absolute;
            bottom: 80px;
        }

        .footer-table td {
            width: 33%;
            text-align: center;
            padding-top: 8px;
            font-weight: bold;
        }

        .footer-table td span {
            width: 100%%;
            border-top: 2px solid black;
            text-align: center;
            padding-top: 8px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="certificate">
        <!-- HEADER: Logo | Title | QR -->
        <table class="header-table">
            <tr>
                <td style="width: 150px;"><img src="{{ public_path('assets/images/logo-certificate.png') }}"
                        class="logo"></td>
                <td class="title-container">
                    <p class="title">Nepal Pharmacy Council</p>
                    <p class="subtitle">Certificate of Participation</p>
                </td>
                <td style="width: 150px; text-align: right;"><img
                        src="{{ public_path('storage/' . $formApplication->getFirstMedia('profile_photo')->id . '/' . $formApplication->getFirstMedia('profile_photo')->file_name) }}"
                        class="qrcode"></td>
            </tr>
        </table>
        <div
            style="
              padding: 0 3rem;
              margin-bottom: 5rem;
              background-image: url('{{ public_path('assets/images/bg.png') }}');
              background-position: center center;
              background-repeat: no-repeat;
              z-index: -100;
              background-size: contain;
              background-blend-mode: multiply;
            ">

            <!-- CONTENT -->
            <div class="content">
                This is to certify that<br>
                <span class="participant-name">{{ $formApplication->getFullName() }}</span><br>
                Council Registration No.: {{ $formApplication->registration_number }}<br>
                <p>
                    Residing at {{ $formApplication->issued_district }}, currently working at
                    {{ $formApplication->workplace_name }},<br>
                    has successfully participated in the <strong>{{ $trainingForm->name }}</strong> training<br>
                    organized by Nepal Pharmacy Council on {{ $trainingForm->training_start_date }}.
                </p>
                <p>
                    <img src="{{ $qrCodeBase64 }}" alt="QR Code">
                </p>

            </div>
        </div>

        <!-- FOOTER / Signatures -->
        <table class="footer-table">
            <tr>
                <td>
                    <span>
                        Registrar
                    </span>
                </td>
                <td>
                    <span>
                        Chairman
                    </span>
                </td>
                <td>
                    <span>
                        Chief Trainer
                    </span>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
