<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Heebo:500" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
          
        <title>Movies</title>
    </head>
    <body style="background-image:url('{{asset('/img/logo/images.jpg')}}');">

        @include ('partials.header')
        <div class="container col-md-12" style="margin-top:70px;">
            @yield ('content')
        </div>  
    <div class="container col-md-12" style="margin-top:40px;">
         @include ('partials.footer')   
    </div>
       
    </body>

    <script src="{{ asset('js/app.js') }}">
    $('div.checkbox-group.required :checkbox:checked').length > 0
    </script>
</html>
