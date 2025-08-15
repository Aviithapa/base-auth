<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
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
                            <span>Forgot Password</span>
                        </td>
                    </tr>
                </table>

                <table style="margin: 0 auto; background-color: #fff; border-radius: 8px;">
                    <tr>
                        <td style="padding: 30px;">
                            <h6>Hello {{ $user->name }},</h6>
                            <p>Welcome to Nepal Pharmacy Council. To reset your password, please use the OTP code
                                below:</p>
                            <p class="text-center" style="font-size: 22px; font-weight: bold; margin: 20px 0;">
                                {{ $user->phone_otp }}</p>
                            <p>This code is valid for 10 minutes. If you did not request this, please ignore this
                                message.</p>
                            <p style="margin-top: 20px;">Thank you,<br> Nepal Pharmacy Council</p>
                        </td>
                    </tr>
                </table>

                @include('emails.layouts.footer')
            </td>
        </tr>
    </table>
</body>

</html>
