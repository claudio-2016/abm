<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABM</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/estilos.css')}}">
</head>
<body>
    @yield('body')

   <script src="{{asset('/js/jquery-3.7.1.min.js')}}"></script>
   <script src="{{asset('/js/bootstrap.bundle.js')}}"></script>
   <script src="{{asset('/js/funciones.js')}}"></script>
   @yield('js')
</body>
</html>
