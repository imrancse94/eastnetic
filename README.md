# Technologies:
- Laravel
- Vue Js
- BootStrap

# Project Setup
- clone the project https://github.com/imrancse94/eastnetic.git

## For Backend:
1. composer install
2. copy .env.example to .env (cp .env.example .env)
3. setup .env with database config
4. php artisan config:cache
5. php artisan migrate or you can import mysql from project root (eastnetic.sql)

## For Frontend
1. set api base url in resources/js/Api/config.js (e.g, http://localhost:8000/api/)
2. npm install
3. npm run dev

## Run Project
After all configuartion done above.

go to the link <project-base-url>/public
