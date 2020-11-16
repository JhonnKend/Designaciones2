<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Juan">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Designaciones - Home</title>
  <link rel="stylesheet" href="{{ mix('css/app.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }} ">
  
</head>

<body id="page-top">
    @yield('content')

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <script src="{{ mix('js/vendor.js') }}"></script>
  <script src="{{ asset('js/select.js') }}" ></script>
  <script src="{{ asset('js/xlsx.js') }}" ></script>
</body>

</html>