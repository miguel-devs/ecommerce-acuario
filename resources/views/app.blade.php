<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:url"                content="https://www.aquaticdepot.net" />
        <meta property="og:type"               content="website" />
        <meta property="og:title"              content="Aquatic Depot" />
        <meta property="og:description"        content= "En Aquatic Depot tenemos los productos, accesorios y más para tu acuario." />
        <!--<meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
        <meta property="og:image"              content="https://www.aquaticdepot.net/imagenes/web/" />
-->

        <link rel="icon" href="/imagenes/logos/icono-pez-50-50.png">

        <title inertia>Aquatic Depot</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        @inertiaHead
       
    </head>
    <body class="antialiased overflow-x-hidden">

        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
   
    </body>
</html>
