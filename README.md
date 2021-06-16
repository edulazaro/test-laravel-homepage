## LIVE VERSION

You can find a [working version of the app here](https://edulazaro.com/):

## HOW TO INSTALL

To install the app follow these steps:

1. Clone the Git repo, or download the [latest release from here](https://github.com/edulazaro/test-laravel-homepage):

  ```
  git@github.com:edulazaro/test-laravel-homepage.git
  ```

2. Install **composer** packages:

  ```
  composer install
  ```

3. Install **npm** packages:

  ```
  npm install
  ```

4. Create da database in MySQL and then import the file `horsetest.sql` located in the root folder of the app. Or you can also to run database migrations with the next command:

  ```
  php artisan migrate
  ```

5. Copy the `.env.example` file located in the root folder and name it as `.env`. Replace the email and database configuration for the access details you are using. Also configure SMTP settings so the email is sent correctly after subscribing. 


6. Generate the App key by using the next command:

  ```
  php artisan key:generate
  ```

## HOW TO START

For development or for easily test the application, use the command `php artisan serve` to start the dev server and the command `npm run watch` to watch for change.

For production you need to use apache or nginx, configuring the directory `/public` base folder of the app in the server configuration. Use the command `npm run prod` to compile and minimize the scss and the JS files.