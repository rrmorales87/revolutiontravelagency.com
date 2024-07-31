
@extends('emails.layout')
@section('body')
    @if(isset($reservation) && isset($reservation->client) )

        <div class="w-full flex-col items-center">
            <div class="min-w-96 m-12 py-3 px-5 rounded-xl bg-[#EDF2F8] flex flex-col items-center ">
                <div class="flex gap-1">
                    <img class="w-4"  src="{{ asset('storage/icon/logo.webp') }}" alt="logo">
                    <h1 class="text-2xl font-bold @apply font-Musticapro ">{{ config('app.name', 'Laravel') }}</h1>
                </div>
                <div class="flex @apply font-Lato mt-5 text-xl">
                    <p>
                        {{ __('Thanks for traveling with us') }}
                    </p>
                </div>
                <div class="my-5 rounded-xl p-5 bg-[#FFFFFF] w-full flex-col">
                    <div class="flex @apply font-Musticapro gap-1">
                        <span>{{ __('Hellos!') }}</span>
                        <span>{{ $reservation->client->name }}:</span>
                    </div>
                    <div class="flex justify-between @apply font-Musticapro">
                        <div>{{ __('Here you have your electronic ticket') }}</div>
                        <div class="uppercase">{{ $reservation->slug }}</div>
                    </div>
                    <div class="p-2 my-6 bg-[#EDF2F8] flex justify-center items-center @apply font-Musticapro font-bold">
                        {{ __("Application information") }}
                    </div>
                    <div class="flex justify-between @apply font-Musticapro">
                        <div class="flex-col">
                            <div>{{ __('Order ID') }}:</div>
                            <div class="uppercase">{{ $reservation->slug }}</div>
                        </div>
                        <div class="flex-col">
                            <div>{{ __('Billed to') }}:</div>
                            <div>{{ $reservation->client->contact }}</div>
                        </div>
                    </div>
                    <div class="my-5 flex justify-between @apply font-Musticapro">
                        <div class="flex-col">
                            <div>{{ __('Date') }}:</div>
                            <div>{{  \Carbon\Carbon::parse($reservation->date)->format('d/m/Y ') }}</div>
                        </div>
                        <div class="flex-col">
                            <div>{{ __('Circuit') }}:</div>
                            <div>{{ $reservation->origin->name }}-{{ $reservation->destination->name  }} </div>
                        </div>
                    </div>
                    <div class="p-2 my-6 bg-[#EDF2F8] flex justify-center items-center @apply font-Musticapro font-bold">
                        {{ __("Trip information") }}
                    </div>
                    <div class="my-5 flex justify-between @apply font-Musticapro">
                        <div class="flex-col">
                            <div>{{ __('Circuit') }}:</div>
                            <div>{{ $reservation->origin->name }}-{{ $reservation->destination->name  }} </div>
                        </div>
                        <div class="flex-col">
                            <div>{{ __('totalTravelers') }}:</div>
                            <div>{{ $reservation->travellers }}</div>
                        </div>

                    </div>
                    <div class="my-5 flex justify-between @apply font-Musticapro">
                        <div class="flex-col">
                            <div>{{ __('travelTime') }}:</div>
                            <div>{{  \Carbon\Carbon::parse($reservation->time)->format('h:i A') }}</div>

                        </div>
                        <div class="flex-col">
                            <div>{{ __('checkin') }}:</div>
                            <div>{{  \Carbon\Carbon::parse($reservation->time_end)->format('h:i A') }}</div>
                        </div>

                    </div>
                    <div class="my-5 flex justify-between @apply font-Musticapro">
                        <div class="flex-col">
                            <div>{{ __('Duration trip') }}:</div>
                            <div>{{  \Carbon\Carbon::parse($reservation->time)->diffForHumans(\Carbon\Carbon::parse($reservation->time_end)) }}</div>

                        </div>


                    </div>
                    <div class="p-2 my-6 bg-[#EDF2F8] flex justify-center items-center @apply font-Musticapro font-bold">
                        {{ __("Payment Breakdown") }}
                    </div>
                    <div class="my-5 flex justify-between @apply font-Musticapro">
                        <div class="flex-col">
                            <div>{{ __('feeTrip') }}:</div>
                            <div>{{ Currency::currency("USD")->format($reservation->price)   }}</div>

                        </div>
                        <div class="flex-col">
                            <div>{{ __('taxes') }}:</div>
                            <div>{{ Currency::currency("USD")->format($reservation->tax)   }}</div>
                        </div>

                    </div>
                    <div class=" my-6 h-2 bg-[#EDF2F8] flex justify-center items-center @apply font-Musticapro font-bold">
                    </div>
                    <div class="my-5 text-2xl flex justify-end @apply font-Musticapro">
                        <div class="flex-col">
                            <div class="">{{ __('totalAmount') }}:</div>
                            <div class="text-right">{{ Currency::currency("USD")->format($reservation->total_amount)   }}</div>

                        </div>


                    </div>


                </div>
                <div class="@apply font-Lato">
                    <p>{{__('Do you need help?')}} <a class="text-blue-600 underline" href="{{route('support')}}">www.revolutiontravelagency.com</a></p>
                </div>
                <div class="@apply font-Lato">
                    <p><span class="mr-1">&copy;</span>{{__('Revolution Travel Agency. All rights reserved')}}</p>
                </div>
                <div class="mt-5 @apply font-Lato flex gap-1">
                    <a class="text-blue-600 underline" href="{{route('term')}}">{{__('Terms of Service')}}</a>
                    <span>|<span>
                <a class="text-blue-600 underline" href="{{route('term')}}">{{__('Privacy Policy')}}</a>
            </span>



        </span>
                </div>
    @endif
@endsection




