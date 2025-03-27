# Laravel 12 Unified API for Customer & Invoice Management

This is a Laravel 12 project that implements a modular API structure for managing multiple data types (currently: Customers and Invoices) using a single unified controller and endpoints.


##  Requirements

- PHP >= 8.2
- Composer
- MySQL or any other database supported by Laravel
- Laravel 12 (built using `laravel new project-name`)

---

##  Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/irfan-iqbal-m/EalSuite.git
   cd EalSuite

    Install dependencies:

2. **composer install:**

composer install

Copy .env file and set your database credentials:

cp .env.example .env


3. **Run migrations and optionally seed the database:**

php artisan migrate --seed

4. **Serve the app:**

php artisan serve

5. **Login credentials:**

User_name: admin@admin.com
Password: 123456
