<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
        '(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark')
    }
  </script>
</head>

<body>
  <x-navbar></x-navbar>

  <div class="min-h-screen flex flex-col">
    {{ $slot }}
  </div>

  <x-footer></x-footer>
</body>

</html>
