<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Anaheim|Roboto:400,400i,500,700" rel="stylesheet">
        <title>Ganba - Japanese Flashcards</title>
    </head>
    <body>
        <div id="app"></div>

        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="js/wanakana.min.js"></script>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
