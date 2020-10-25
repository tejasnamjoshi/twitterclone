# TwitterClone

## About the project
This is a practice project I made after I learned Laravel. This project is similar to twitter (hence the name twitterclone) that I created for practicing different laravel concepts. Thanks to Jeffrey Way for an excellent tutorial on laravel.

Tutorial  - <a href="https://laracasts.com/series/laravel-6-from-scratch">Laravel from scratch</a>

## Steps to run the project
- Make sure you have php and composer installed (either locally or on docker).
- Create a .env file and copy contents of env.example file into it.
  - Change the APP_URL to whatever you want or keep it as is.
  - Add the correct mysql username and password details.
  - Create a database - twitter.
- Run composer install.
- Run npm install
- Run php artisan key:generate
- Run migrations using - <b>php artisan migrate</b>
- Open a browser and enter the <APP_URL> in the address bar. ( Make sure to add the <APP_URL> in your hosts file. )
- You will see the homepage with Login and Register links.


## Seed Data
- Run the following command to add seed data - <b>php artisan migrate:fresh --seed</b>.
  - This will create all the tables from scratch
  - To just add data without creating fresh tables, use <b>php artisan db:seed</b>
- Default data per user (Random number)
  - 2 - 6 messages
  - 2 - 6 tweets
  - 2 - 6 follows
  - 2 - 6 tweet likes
  - 2 - 6 tweet dislikes