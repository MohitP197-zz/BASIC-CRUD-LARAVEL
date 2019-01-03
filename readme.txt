First of all, run composer install for the dependencies to be installed.

Then, run composer update to update the dependencies.

Make a new file names .env and copy the content of .env.example to the newly created .env file which is located very outside...

Change the database name from .env file to your database and create a database in localhost/phpmyadmin..

Run php artisan key generate which generates unique key

Run php artisan serve to run the system on your local xampp server

Happy coding!!