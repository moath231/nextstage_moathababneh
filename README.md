## Prerequisites

- PHP 7.4 or higher
- Composer
- MySQL


## Installing

- Clone the repository to your local machine: <br>
  `git clone https://github.com/moath231/nextstage_moathababneh`

- Install dependencies: <br>
 `cd nextstage_moathababneh`<br>
  `composer install`

- compy a .env.example :
  `sudo cp .env.example .env`

- `composer install`

- `php artisan migrate`

- `php artisan db:seed`

- `php artisan serve`


1.  Basic Laravel Auth: The application should have an authentication system that allows the administrator to log in. The first user will be created using database seeds with email `admin@admin.com` and password `password`.
2. CRUD functionality: The application should have CRUD functionality for two menu items: Companies and Employees. The admin should be able to create, read, update, and delete companies and their employees.
3. Companies Table: The Companies table should have the following fields:
    -   Name (required)
    -   Email
    -   Logo (minimum 100×100)
    -   Website
 4.  Employees Table: The Employees table should have the following fields:
    -   First name (required)<br>
    -   Last name (required)<br>
    -   Company (foreign key to Companies)<br>
    -   Email<br>
    -   Phone<br>
5.  Database Migrations
6.  Company Logos: stored in the `storage/app/public` folder and made accessible from the public. This means that the application should create a symbolic link 
    between `public/storage` and `storage/app/public`.
7.  Resource Controllers: The application should use Laravel’s resource controllers with default methods (index, create, store, etc.) to manage the Companies 
    and Employees resources.
8.  Request Validation: Request classes to validate input from the administrator.
9.  Pagination: show the list of Companies/Employees with 10 entries per page.
10. Authentication : The code inside the route group will be executed only if the user is authenticated and has the 'admin' ability , with can:admin only
    user have admin@admin.com will be the admin , i use gate .





