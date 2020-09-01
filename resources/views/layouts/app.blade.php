<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evans Fashion - Modern Way of Fashions</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    @yield('css')
</head>

<body>
    @include('../store/partials/preloader')

    @include('../store/partials/header')

    @yield('content')

    <!-- Partner Logo Section Begin -->
    @include('../store/partials/partner_logo_section')
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    @include('../store/partials/footer')
    <!-- Footer Section End -->

    @yield('scripts')
</body>
</html>
