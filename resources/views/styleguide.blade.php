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


      <div id="styles-box" class="container">
        <h3 id="styles-title">Styleguide</h3>
        <div class="split-box">
          <div class="left">
            <h5>Colors</h5>
          </div>
          <div class="right">

            <div class="color-row">
              <div class="color-box">
                <div class="color-square" id="beige">
                </div>
                <div class="color-names">
                  <p>Beige: </p>
                  <p>#FFF6E6</p>
                </div>
              </div>
              <div class="color-box">
                <div class="color-square" id="light-gray">
                </div>
                <div class="color-names">
                  <p>Light Gray: </p>
                  <p>#FBFBFB</p>
                </div>
              </div>
            </div>

            <div class="color-row">
              <div class="color-box">
                <div class="color-square" id="pure-gray">
                </div>
                <div class="color-names">
                  <p>Pure Gray: </p>
                  <p>#BBBBBB</p>
                </div>
              </div>
              <div class="color-box">
                <div class="color-square" id="dark-gray">
                </div>
                <div class="color-names">
                  <p>Dark Gray: </p>
                  <p>#333333</p>
                </div>
              </div>
            </div>

            <div class="color-row">
              <div class="color-box">
                <div class="color-square" id="teal">
                </div>
                <div class="color-names">
                  <p>Teal: </p>
                  <p>#52A896</p>
                </div>
              </div>
              <div class="color-box">
                <div class="color-square" id="dark-teal">
                </div>
                <div class="color-names">
                  <p>Dark Teal: </p>
                  <p>#469081</p>
                </div>
              </div>
            </div>

            <div class="color-row">
              <div class="color-box">
                <div class="color-square" id="red">
                </div>
                <div class="color-names">
                  <p>Red: </p>
                  <p>#E37780</p>
                </div>
              </div>
              <div class="color-box">
                <div class="color-square" id="dark-red">
                </div>
                <div class="color-names">
                  <p>Dark Red: </p>
                  <p>#C3545E</p>
                </div>
              </div>
            </div>

            <div class="color-row">
              <div class="color-box">
                <div class="color-square" id="blue">
                </div>
                <div class="color-names">
                  <p>Blue: </p>
                  <p>#217EBC</p>
                </div>
              </div>
              <div class="color-box">
                <div class="color-square" id="dark-blue">
                </div>
                <div class="color-names">
                  <p>Dark Blue: </p>
                  <p>#1B6494</p>
                </div>
              </div>
            </div>

          </div>
      </div>

      <div class="split-box">
        <div class="left">
          <h5>Typography</h5>
        </div>
        <div class="right">
          <div class="style-wrapper">
            <h4 class="thin">This is the header font Roboto at 400 weight.</h4>
            <h4 class="regular">This is the header font Roboto at 500 weight.</h4>
            <h4 class="lead">This is the header font Roboto at 700 weight.</h4>
            <p class="thin">This is the body font Roboto Slab at 400 weight.</p>
            <p class="lead">This is the body font Roboto Slab at 700 weight. </p>
            <h1>This is a header 1 in Anaheim font.</h1>
            <h2>This is a header 2.</h2>
            <h3>This is a header 3.</h3>
            <h4>This is a header 4.</h4>
            <h5>This is a header 5.</h5>
            <h6>This is a header 6.</h6>
            <p>This is a standard paragraph. </p>
            <p class="lead">This is a .lead paragraph. </p>
            <p class="light">This is a .light paragraph. </p>
          </div>
        </div>
      </div>

      <div class="split-box">
        <div class="left">
          <h5>Buttons</h5>
        </div>
        <div class="right">
          <div class="style-wrapper">
            <h6 class="button-title">Primary buttons</h6>
            <div class="button-row">
              <button class="primary-button small">.small</button>
              <button class="primary-button medium">.medium</button>
              <button class="primary-button large">.large</button>
            </div>
            <h6 class="button-title">Danger buttons</h6>
            <div class="button-row">
              <button class="danger-button small">.small</button>
              <button class="danger-button medium">.medium</button>
              <button class="danger-button large">.large</button>
            </div>
            <h6 class="button-title">Info buttons</h6>
            <div class="button-row">
              <button class="info-button small">.small</button>
              <button class="info-button medium">.medium</button>
              <button class="info-button large">.large</button>
            </div>
          </div>
        </div>
      </div>

      <div class="split-box">
        <div class="left">
          <h5>Inputs</h5>
        </div>
        <div class="right">
          <div class="style-wrapper">
            <h6>Text Input</h6>
            <input type="text"></input>
            <h6>Textarea Input</h6>
            <textarea></textarea>
            <h6>Select Input</h6>
            <select>
              <option value="1">Option</option>
              <option value="2">Option</option>
            </select>
          </div>
        </div>
      </div>

      <div class="split-box">
        <div class="left">
          <h5>Lists</h5>
        </div>
        <div class="right">
          <div class="style-wrapper">
            <ol>
              <li>Ordered list</li>
              <li>Ordered list</li>
              <li>Ordered list</li>
            </ol>
            <ul>
              <li>Unordered list</li>
              <li>Unordered list</li>
              <li>Unordered list</li>
            </ul>
          </div>
        </div>
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
