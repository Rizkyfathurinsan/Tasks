<!DOCTYPE html>
<html lang="en">
<head>
        <!-- CSRF Token-->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- scripts -->
    <script src="{{ asset('js/app.js') }}" defer> </script>

        <!-- fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
       
        <!-- styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>TO-DO app</title>

</head>
<body>
    @yield('content')
</body>
</html>