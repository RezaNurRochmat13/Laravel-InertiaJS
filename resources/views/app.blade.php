<!DOCTYPE html>
<html>
  <head>
    <title>Inertia App</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js'])
  </head>
  <body class="antialiased">
    @inertia
  </body>
</html>
