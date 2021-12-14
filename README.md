-- Please Ensure Php version greater or equal to 7.3
-- run below commands to run project

composer install
npm update

 php artisan cache:clear
 php artisan route:cache
 php artisan serve
 
