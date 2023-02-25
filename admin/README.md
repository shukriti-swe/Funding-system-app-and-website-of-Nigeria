# Welcome to Thrift 2 Win

A Prosperis Gold Product - CI Version 4.1.7

### About
ProsperisGold is a modern version of traditional thrifting with the added advantage of financial technology. We present to you a fully automated platform where a group of individuals or corporate entities can save money together over a period of time, and take turns in receiving the accumulated sums on a rotational basis. 

ProsperisGold blends accountability, discipline, and transparency in our services to help you develop healthy saving habits.

## For Project Setup

1. Clone the project from develop branch

2. You must have composer installed in system . 
Run following command: Composer install

If issue with composer install then try to run 
Run following command: Composer update

Folders in your project after set up:

app, public, tests, writable
vendor/codeigniter4/framework/system
vendor/codeigniter4/framework/app & public

You should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. 
A poor practice would be to point your web server to the project root 
and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

3. Give permission to writable folder
On a linux/mac based system run command
sudo chmod -R 777 writable

4. copy or rename env file to .env
cp env .env

5. Create a mysql database and use the initial database.
You can find database dump in db folder

6. Put your database credentials in .env file
### DATABASE

database.default.hostname = localhost
database.default.database = yourdbname
database.default.username = dbuser
database.default.password = pass
database.default.DBDriver = MySQLi
database.default.DBPrefix =

7. .env file must have entries for JWT and S3

JWT_SECRET_KEY=Ku68Nbsf4sxss4AeG5uHkNZAqT1Nyi1zaVfpzPs0 
JWT_TIME_TO_LIVE=360000


8. After that run migrations useing following command 
php spark migrate

## To test if installation is complete
Assuming your host is localhost and installed public folder as root

http://localhost/api

And you will receive "Api get call success" response