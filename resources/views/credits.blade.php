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
      
      <!-- this is the same as TopNav component -->
        <header>
          <div class="nav-wrapper">
            <h1><a href="/"><span id="title">Ganba!</span></a><span id="description">Flashcard Quizzes for Japanese Learners</span></h1>
            <nav>
              <a target="_blank" href="http://www.kwboyd.com" alt="Kate Boyd Portfolio">Creator</a>
              <a href="/styleguide" alt="Styleguide">Styleguide</a>
              <a target="_blank" href="https://kwboyd.gitbooks.io/ganba/content/" alt="Documentation">Documentation</a>
              <a href="/credits" alt="Credits">Credits</a>
              <a target="_blank" href="https://github.com/kwboyd/ganba-app" alt="GitHub">GitHub</a>
            </nav>
          </div>
        </header>


        <div id="credits-box">
          <div class="container">
            <h3>Credits:</h3>
            <ul>
              <li>Created by <a target="_blank" class="outside-link" alt="Kate Boyd Portfolio" href="http://kwboyd.com">Kate Boyd</a></li>
              <li>Created using <a target="_blank" class="outside-link" alt="Laravel" href="https://laravel.com/">Laravel</a> and <a target="_blank" class="outside-link" alt="Vue.js" href="https://vuejs.org/">Vue.js</a></li>
              <li>Icons from <a target="_blank" class="outside-link" alt="Font Awesome" href="http://fontawesome.io/">Font Awesome</a></li>
              <li>Loader icon from <a target="_blank" class="outside-link" alt="Loading.io" href="https://loading.io/">Loading.io</a></li>
              <li>Japanese text conversion from <a target="_blank" class="outside-link" alt="Wanakana.js" href="http://wanakana.com/">Wanakana.js</a></li>
              <li>Input and form stylings from <a target="_blank" class="outside-link" alt="Skeleton CSS" href="http://getskeleton.com/">Skeleton CSS</a></li>
            </ul>
          </div>
      </div>


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
