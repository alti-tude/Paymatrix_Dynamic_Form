Paymatrix-RentalAgreements-API-Blockchain


Commands to run:

> composer install


* If any error once remove the php-parse(link) from vendor/bin and run the command once again
> php artisan storage:link


* If the above command shows and error then use command given below and run the above command again
> rm public/storage


* Then set the .env file with required database and username and password
* Then use the command
> php artisan migrate

* Then to run the serve use
> php artisan serve

* If you want the refresh your database
> php artisan migrate:refresh

* If you made any changes in the tables and want to migrate then
> php artisan migrate:fresh
