## Office local environment setup

Project is built on Laravel 7

- Run command `composer install` to load php packages
- Copy .env.example to .env and edit variables according to your setup
- Create empty DB with the name from .env (`office_local_db` as example)
- Run command `php artisan key:generate`
- Default node v10.19.0, npm v6.14.4
- Run command `npm install` to load js packages
- Run command `npm run dev` or `npm run prod` to compile js/css assets
- If you didn't add app url to the host file, please run `php artisan serve`. Otherwise, you could skip this step.
- Finally, run `php artisan migrate` to run migrations
