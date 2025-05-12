<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Test Footer</title>
  @vite(['resources/css/app.css'])
</head>
<body class="flex flex-col min-h-screen font-sans">

  <main class="flex-grow flex items-center justify-center">
    <p>Body</p>
  </main>

  @include('partials.footer')

</body>
</html>
