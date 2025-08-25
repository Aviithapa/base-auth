@php
    $title = 'Registration OTP';
@endphp

@extends('emails.layouts.app')
@section('content')
    <table style="margin: 0 auto; background-color: #fff; border-radius: 8px;">
        <tr>
            <td style="padding: 30px;">
                <h6>Hello {{ $user->name }},</h6>
                <p>Welcome to Nepal Pharmacy Council. To verify your registration, please use the OTP code
                    below:</p>
                <p class="text-center" style="font-size: 22px; font-weight: bold; margin: 20px 0;">
                    {{ $user->email_verification_token }}</p>
                <p>This code is valid for 10 minutes. If you did not request this, please ignore this
                    message.</p>
                <p style="margin-top: 20px;">Thank you,<br> Nepal Pharmacy Council</p>
            </td>
        </tr>
    </table>
@endsection
