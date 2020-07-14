<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{mix('css/app.css')}}" rel="stylesheet">
    <!--Añadimos el css generado con webpack-->
</head>

<body>
    <div id="app">
        <Tabs></Tabs>
        <router-view></router-view>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
</body>

</html>