{{-- resources/views/test-header-full.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Test Header – Vintage Catalog</title>

  {{-- Aquí cargamos tus assets compilados por Vite --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900">

  {{-- Incluimos tu partial de header --}}
  @include('partials.header')

</body>
</html>
