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
    @font-face {
      font-family: "Musticapro";
      src: local("Musticapro"),
      url("{{asset('fonts/MusticaPro-SemiBold.otf')}}") format('OTF');
    }
    @font-face {
      font-family: "Lato";
      src: local("Lato"),
      url("{{asset('fonts/Lato-Regular.ttf')}}") format('TTF');
    }
  </style>
</head>
<body>
  <div style="width: 50rem; border-radius: 12px; background-color: #EDF2F8; padding: 12px 20px; text-align: center">
    <table style="width:100%;" cellpadding="0" cellspacing="0" role="none">
      <tbody>
        <tr>
          <td style="text-align: center;">
            <img src="{{asset('icons/RtravelLogo.png')}}" alt="logo" style="width: 192px">
            <div style="margin-top: 8px; font-family: Lato; font-size: 20px">
              <p>
                {{ __('Thanks for traveling with us') }}
              </p>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div style="border-radius: 12px; background-color: #FFFFFF; padding: 32px">
              <table style="margin-top: 20px; width: 100%" cellpadding="0" cellspacing="0" role="none">
                <tbody>
                  <tr style="font-family: Musticapro">
                    <td style="text-align: left;">
                      <span style="margin-right: 8px">{{ __('Hellos!') }}</span>
                      <span>{{ $reservation->client->name }}:</span>
                    </td>
                    <td style="text-align: right; font-family: Musticapro; font-weight: 700; text-transform: uppercase">
                     {{ $reservation->slug }}
                    </td>
                  </tr>
                  <tr style="margin-top: 8px; font-family: Musticapro;">
                    <td style="text-align: left;">
                      {{ __('Here you have your electronic ticket') }}
                    </td>
                    <td style="text-align: right; font-weight: 700; text-transform: uppercase;">
                      {{__("$status")}}
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
                      <div>{{ __('Order ID') }}:</div>
                      <div style="text-transform:uppercase;"> {{ $reservation->slug }}</div>
                    </td>
                    <td style="gap: 8px; text-align: right">
                      <div>{{ __('Billed to') }}:</div>
                      <div> {{ $reservation->client->contact }}</div>
                    </td>
                  </tr>
                  <tr style="margin-top: 8px; font-family: Musticapro;">
                    <td style="text-align: left; gap: 2px;">
                      <div>{{ __('totalTravelers') }}:</div>
                      <div>{{ $reservation->travellers }}</div>
                    </td>
                    <td style="text-align: right; gap: 2px;">
                      <div> {{ __('Circuit') }}:</div>
                      <div> {{ $reservation->origin->name }}-{{ $reservation->destination->name  }}</div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div style="margin-top: 24px; margin-bottom: 24px; background-color: #EDF2F8; padding: 8px; text-align: center; font-family: Musticapro; font-weight: 700;">
                {{ __("Trip information") }}
              </div>
              <table style="margin-top: 20px; width: 100%;" cellpadding="0" cellspacing="0" role="none">
                <tbody>
                  <tr style="font-family: Musticapro;">
                    <td style="text-align: left; gap: 2px;">
                      <div>{{ __('Date') }}:</div>
                      <div>{{ \Carbon\Carbon::parse($reservation->date)->format('d/m/Y ') }}</div>
                    </td>
                    <td style="gap: 8px; text-align: right;">
                      <div>{{ __('travelTime') }}:</div>
                      <div>{{ \Carbon\Carbon::parse($reservation->time)->format('h:i A') }}</div>
                    </td>
                  </tr>
                  <tr style="margin-top: 8px; font-family: Musticapro;">
                    <td style="text-align: left; gap: 2px;">
                      <div>{{ __('checkin') }}:</div>
                      <div>{{ \Carbon\Carbon::parse($reservation->time_end)->format('h:i A') }}</div>
                    </td>
                    <td style="text-align: right; gap: 2px;">
                      <div>{{ __('Duration trip') }}:</div>
                      <div>{{ \Carbon\Carbon::parse($reservation->time)->diffForHumans(\Carbon\Carbon::parse($reservation->time_end)) }}</div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div style="margin-top: 24px; margin-bottom: 24px; background-color: #EDF2F8; padding: 8px; text-align: center; font-family: Musticapro; font-weight: 700;">
                {{ __("Payment Breakdown") }}
              </div>
              <table style="margin-top: 20px; width: 100%;" cellpadding="0" cellspacing="0" role="none">
                <tbody>
                  <tr style="font-family: Musticapro;">
                    <td style="text-align: left; gap: 2px;">
                      <div>{{ __('feeTrip') }}:</div>
                      <div>{{ Currency::currency("USD")->format($reservation->price)   }}</div>
                    </td>
                    <td style="gap: 8px; text-align: right;">
                      <div>{{ __('taxes') }}:</div>
                      <div>{{ Currency::currency("USD")->format($reservation->tax)   }}</div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div style="margin-top: 8px; margin-bottom: 8px; background-color: #EDF2F8; padding: 8px; text-align: center; font-family: Musticapro; font-weight: 700">
              </div>
              <table style="margin-top: 20px; width: 100%;" cellpadding="0" cellspacing="0" role="none">
                <tbody>
                  <tr style="font-family: Musticapro;">
                    <td style="gap: 8px; text-align: right; font-size: 24px; font-weight: 700">
                      <div>{{ __('totalAmount') }}:</div>
                      <div style="text-align: right;">{{ Currency::currency("USD")->format($reservation->total_amount)   }}</div>
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
              <p>{{__('Do you need help?')}} <a href="{{route('support')}}" style="color: #2563eb; text-decoration: underline">www.revolutiontravelagency.com</a></p>
            </div>
            <div style="font-family: Lato;">
              <p><span style="margin-right: 4px">&copy;</span>{{__('Revolution Travel Agency. All rights reserved')}}</p>
            </div>
            <div style="margin-top: 20px; gap: 4px; font-family: Lato">
              <a href="{{route('term')}}" style="color: #2563eb; text-decoration: underline;">{{__('Terms of Service')}}</a>
              <span>|<span>
                <a href="{{route('term')}}" style="color: #2563eb; text-decoration: underline;">{{__('Privacy Policy')}}</a>
            </span> </span>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>