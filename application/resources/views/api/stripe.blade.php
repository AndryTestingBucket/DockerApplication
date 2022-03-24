<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    <script src="https://js.stripe.com/v3/"></script>

    <script src="{{ asset('js/checkout.js') }}" defer></script>
</head>
<body class="font-sans antialiased">


<form id="payment-form" method="post" action="/api/stripe" enctype="multipart/form-data">
    @csrf

    <div id="payment-element">
        <!--Stripe.js injects the Payment Element-->
    </div>
    <label class="p-FieldLabel Label Label--empty" for="Field-expiryInput">Цена</label>
    <br>
    <input name="amount"
           type="text"
           class="Input p-Select-select"
    />
    <br>
    <label class="p-FieldLabel Label Label--empty" for="Field-expiryInput">Валюта</label>
    <br>
    <input name="currency"
           type="text"
           class="Input p-Select-select"
    />
    <div id="myProgress">
        <div id="myBar"></div>
    </div>
    <button id="submit" onclick="move()" style="padding:12px;border:none;cursor:pointer;">
        <div class="spinner hidden" id="spinner"></div>
        <span id="button-text">Pay now</span>
    </button>
    <div id="payment-message" class="hidden"></div>
</form>

@livewireScripts
</body>
</html>






