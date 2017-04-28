## Ganba! Flashcards for Japanese Learners

Ganba! (trans: do your best!) is an app that can be used to memorize Japanese vocabulary through quizzes on pronunciations and meanings. This app targets intermediate to advanced Japanese learners who struggle to find convenient ways to study Japanese because of the facets of Japanese vocabulary (such as kanji/furigana) that traditional multi-language study programs do not account for. This app also provides an option to create example sentences for each word. Through [Wanakana's](http://wanakana.com/) library, this app auto-converts romaji text input for pronunciation to furigana without the need for an IME to allow for a faster quizzing experience.

Created by [Kate Boyd](http://kwboyd.com).

This app was built using Laravel 5, Eloquent ORM, and Vue.js.

Full documentation is available at: [https://kwboyd.gitbooks.io/ganba/content/]

勉強で頑張ろう！

### Setup

Clone this repository.

Run `composer install` to install PHP dependencies.

Run `npm install` to install the node dependencies.

Run `php artisan key:generate` to generate your application key.

Use MAMP or another similar application to launch a server, with the root directory set to the 'public' directory. Set the Apache port to 8888 and the MySql port to 8889.

The database this app uses is named 'app', so check that you have a database named app. Create one in PHPMyAdmin if you do not.

The .env file should have this configuration:

  DB_PORT=8889
  DB_DATABASE=app
  DB_USERNAME=root
  DB_PASSWORD=root

Run `php artisan migrate` to create the database table.

Run `npm run dev` to build and start the application.

Point your browser to http://localhost:8888.
