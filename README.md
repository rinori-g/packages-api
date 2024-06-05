git clone https://github.com/rinori-g/packages-api.git

Navigate to the project directory:
cd <project_directory>

Install dependencies:
composer install

Copy the .env.example file to .env and configure your environment variables:
cp .env.example .env

Generate application key:
php artisan key:generate

Migrate the database:
php artisan migrate

Seeders:
php artisan db:seed --class=PackagesTableSeeder


Run the application:
php artisan serve

Register a new user:

Send a POST request to api/register with the following parameters in the request body:
    name: Name of the user
    email: Email address
    password: Password
Example: 
{
    "name": "test test",
    "email": "test@test.com",
    "password": "12341234",
    "password_confirmation": "12341234"
}


Get the list of packages:

Send a GET request to api/packages to retrieve the list of packages.


Register for a package:

Send a POST request to /packages/register with the following parameters in the request body:
    customer_id: ID of the customer
    package_id: ID of the package
Example:
{
    "package_id": 1,
    "customer_id": 1
}
