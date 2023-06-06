# Laravel URL Shortener

This is a URL shortener application built with Laravel for the Global-Tickets interview assesment.

## Installation

Follow these steps to get the application up and running on your local environment.

### Prerequisites

- PHP >= 8.0
- Composer
- MySQL
- npm

1. **Download the files**: Download or clone the repository to your local environment.

2. **Set up the database**: Configure the MySQL database credentials in the `.env` file located in the root directory of the project. You can use MAMP on Mac or XAMPP on Windows to set up a local MySQL database.

    Example `.env` configuration:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=globaltickets
    DB_USERNAME=root
    DB_PASSWORD=root
    ```

3. **Install dependencies**: Open a terminal in the project's root directory and run the following command to install the PHP dependencies:

    ```
    composer install
    ```

4. **Generate application key**: Generate a new application key by running the following command (optional):

    ```
    php artisan key:generate
    ```

5. **Migrate the database**: Run the database migrations and seeders to create the necessary tables and records:

    ```
    php artisan migrate --seed
    ```

6. **Build frontend assets**: Install the Node.js dependencies by running the following command:

    ```
    npm install
    ```

7. **Compile the assets for the application**: Compile the assets for the application

    ```
    npm run dev
    ```

8. **Start the development server**: Start the Laravel development server by running the following command:

    ```
    php artisan serve
    ```

9. **Access the application**: Open your web browser and visit `http://127.0.0.1:8000` to access the URL shortener application, if the port is already used, you can access the application from your `http://127.0.0.1:8001`.

The seeder will automatically generate the user and password for the application, those are the default credentials:
E-mail address: admin@globaltickets.com
Password: 12345678


Thank you for considerind me for the assessment,
~ Marius

