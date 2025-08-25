<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Nepal Pharmacy Council' }}</title>

    @include('emails.layouts.style')

</head>

<body>
    <table style="width: 100%">
        <tr>
            <td>
                @include('emails.layouts.header')

                @yield('content')

                @include('emails.layouts.footer')
            </td>
        </tr>
    </table>
</body>

</html>
