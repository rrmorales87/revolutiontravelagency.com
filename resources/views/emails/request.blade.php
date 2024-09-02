<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no, url=no">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings xmlns:o="urn:schemas-microsoft-com:office:office">
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <style>
        td,th,div,p,a,h1,h2,h3,h4,h5,h6 {font-family: "Segoe UI", sans-serif; mso-line-height-rule: exactly;}
    </style>
    <![endif]-->
    <style>
        .my-5 {
            margin-top: 20px !important;
            margin-bottom: 20px !important;
        }
        .flex {
            display: flex !important;
        }
        .h-2 {
            height: 8px !important;
        }
        .flex-col {
            flex-direction: column !important;
        }
        .items-center {
            align-items: center !important;
        }
        .justify-end {
            justify-content: flex-end !important;
        }
        .justify-center {
            justify-content: center !important;
        }
        .justify-between {
            justify-content: space-between !important;
        }
        @media screen {
            @font-face {
                font-family: "Musticapro";
                src: local("Musticapro"), url("../fonts/MusticaPro-SemiBold.otf") format('OTF');
            }
            @font-face {
                font-family: "Lato";
                src: local("Lato"), url("../fonts/Lato-Regular.ttf") format('TTF');
            }
        }
    </style>
</head>
<body>
<div style="margin: 48px; border-radius: 12px; background-color: #EDF2F8; padding: 12px 20px">
    <table style="width: 100%" cellpadding="0" cellspacing="0" role="none">
        <tbody>
        <tr>
            <td style="text-align: center;">
                <div style="gap: 20px">
                    <span><img src="{{asset('icons/logo.webp')}}" alt="logo" style="width: 16px"></span>
                    <span style="font-family: Musticapro; font-size: 24px; font-weight: 700">{{ config('app.name', 'Laravel') }}</span>
                </div>
                <div style="margin-top: 8px; font-family: Lato; font-size: 20px">
                    <p>
                        {{ __('Thanks for traveling with us') }}
                    </p>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div style="border-radius: 12px; background-color: #FFFFFF; padding: 20px">
                    <table style="margin-top: 20px; width: 100%" cellpadding="0" cellspacing="0" role="none">
                        <tbody>
                        <tr style="font-family: Musticapro;">
                            <td style="text-align: left;">
                                <span style="margin-right: 8px">{{ __('Hellos!') }}</span>
                                <span>{{ $reservation->client->name }}:</span>
                            </td>
                        </tr>
                        <tr style="margin-top: 8px; font-family: Musticapro;">
                            <td style="text-align: left;">
                                {{ __('Here you have your electronic ticket') }}
                            </td>
                            <td style="text-align: right; font-weight: 700; text-transform: uppercase">
                                {{ $reservation->slug }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div style="margin-top: 24px; margin-bottom: 24px; background-color: #EDF2F8; padding: 8px; text-align: center; font-family: Musticapro; font-weight: 700">
                        {{ __("Application information") }}
                    </div>
                    <table style="margin-top: 20px; width: 100%;" cellpadding="0" cellspacing="0" role="none">
                        <tbody>
                        <tr style="font-family: Musticapro;">
                            <td style="text-align: left; gap: 2px;">
                                <span>{{ __('Order ID') }}:</span>
                                <span> {{ $reservation->slug }}</span>
                            </td>
                            <td style="gap: 8px; text-align: right">
                                <span>{{ __('Billed to') }}:</span>
                                <span> {{ $reservation->client->contact }}</span>
                            </td>
                        </tr>
                        <tr style="margin-top: 8px; font-family: Musticapro;">
                            <td style="text-align: left; gap: 2px;">
                                <span>{{ __('Date') }}:</span>
                                <span>{{ \Carbon\Carbon::parse($reservation->date)->format('d/m/Y ') }}</span>
                            </td>
                            <td style="text-align: right; gap: 2px;">
                                <span> {{ __('Circuit') }}:</span>
                                <span> {{ $reservation->origin->name }}-{{ $reservation->destination->name  }}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <div style="font-family: Lato;">
                    <p>{{__('Do you need help?')}} <a style="color: #2563eb; text-decoration: underline">www.revolutiontravelagency.com</a></p>
                </div>
                <div style="font-family: Lato;">
                    <p><span style="margin-right: 4px">&copy;</span>{{__('Revolution Travel Agency. All rights reserved')}}</p>
                </div>
                <div style="margin-top: 20px; gap: 4px; font-family: Lato">
                    <a style="color: #2563eb; text-decoration: underline;">{{__('Terms of Service')}}</a>
                    <span>|<span>
                <a style="color: #2563eb; text-decoration: underline;">{{__('Privacy Policy')}}</a>
            </span> </span>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>