### Yaware 

To start the project Make :
- If you have the Make app in your linux you can get commands from Makefile
- use command `mv env.example env`
- docker compose up - start the project
- use `composer install`
- use `npm install and npm run build or yarn && yarn build or yarn dev`
- Use command `php artisan key:generate` 
- Then when docker containers started and key generate make `php artisan migrate --seed` to make migration and create basic roles and permissions
- This Seed make 1 owner with login `admin@ukr.net` and password `password` and 50 users with the same password `password`
