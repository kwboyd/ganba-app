<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Anaheim|Roboto:400,500,700|Roboto+Slab:400,700" rel="stylesheet">
        <title>Ganba - Japanese Flashcards</title>
        <script src="https://use.fontawesome.com/69c32bad78.js"></script>
    </head>
    <body>
      <div id="credits"></div>
      <!-- loads vue credits -->
        <script>
        // csrf token encoding
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
