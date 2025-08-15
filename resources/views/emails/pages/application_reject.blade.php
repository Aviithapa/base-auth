<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Confirmation</title>
    <style>
        body {
            width: 650px;
            font-family: 'Work Sans', sans-serif;
            background-color: #f6f7fb;
            margin: 30px auto;
        }

        .text-center {
            text-align: center;
        }

        .btn {
            padding: 10px 20px;
            background-color: #7366ff;
            color: #fff;
            display: inline-block;
            border-radius: 4px;
            text-decoration: none;
        }

        p {
            font-size: 14px;
            line-height: 1.6;
            color: #333;
        }

        h6 {
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <table style="width: 100%">
        <tr>
            <td>
                <table style="margin: 0 auto 30px">
                    <tr>
                        <td>
                            <img class="max-w-full h-auto" src="{{ public_path('assets/images/logo-certificate.png') }}"
                                alt="" />
                        </td>
                        <td style="text-align: right; color: #999;">
                            <span>Application Rejected</span>
                        </td>
                    </tr>
                </table>

                <table
                    style="margin: 0 auto; background-color: #fff; border-radius: 8px; width: 100%; max-width: 600px;">
                    <tr>
                        <td style="padding: 30px; font-family: Arial, sans-serif; color: #333;">
                            <h4>Hello {{ $user->name }},</h4>
                            <p>We regret to inform you that your training application has been <strong
                                    style="color: red;">rejected</strong>.</p>

                            <p><strong>Reason for rejection:</strong></p>
                            <blockquote style="border-left: 4px solid #ccc; padding-left: 10px; color: #555;">
                                {{ $remarks }}
                            </blockquote>

                            <p style="margin-top: 20px;">Thank you,<br>
                                Nepal Pharmacy Council</p>
                        </td>
                    </tr>
                </table>
                @include('emails.layouts.footer')
            </td>
        </tr>
    </table>
</body>

</html>
