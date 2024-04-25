# Apartment Rental Application

The apartment rental application is a web-based platform built using the Laravel framework. It facilitates the process of renting apartments to users and managing rental agreements, payments, and utility bills.

## Features
#### 1. User Management:
- Users can register, log in, and manage their accounts.
- User authentication ensures secure access to the application.
#### 2. Apartment Listings:
- Users can browse through available apartments listed on the platform.
- Each apartment listing includes details such as title, description, number of bedrooms, bathrooms, amenities, and price.
#### 3. Rental Agreements:
- Users can create rental agreements to rent apartments.
- Rental agreements specify the start date, end date (if applicable), rent amount, and whether the apartment has a gas connection.
#### 4. Payments:
- Users can make payments for rental fees and utility bills.
- Payments are recorded and associated with specific rental agreements.
#### 5. Utility Bill Management:
- Gas and electricity bills are managed separately.
- Gas bill records include the amount and type of gas usage (e.g., double stove).
- Electricity bill records include the per-unit cost of electricity.
#### 6. Admin Panel:
- Administrators have access to an admin panel to manage apartments, users, rental agreements, payments, and utility bills.
- Admins can view, create, update, and delete records as needed.

## How to Use:
#### 1. Installation

- Clone the repository
```bash
git clone https://github.com/phi-rakib/laravel-apartment-rent-app.git
```

- Change directory to laravel-apartment-rent-app
```bash
cd laravel-apartment-rent-app
```

- Install the dependencies
```bash
composer install
```
- Create database
- Copy the environment file
```bash
cp .env.example .env
```
- Change database configuration values in the environment file
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=your-db-user-name
DB_PASSWORD=your-db-password
```
- Run migration
```bash
php artisan migrate
```
- Seed database
```bash
php artisan db:seed
```
- Start local development server
```bash
php artisan serve
```

#### 2. Usage:
- Register as a user or log in if you already have an account.
- Browse available apartments and select one to rent.
- Create a rental agreement specifying the start date, rent amount, and other details.
- Make payments for rental fees and utility bills.
- View your rental agreements and payment history in your user dashboard.

#### 3. Admin Panel:
- Access the admin panel by logging in as an administrator.
- Manage apartments, users, rental agreements, payments, and utility bills from the admin dashboard.
- Perform CRUD operations on records as needed.

## Technologies Used:
- Laravel Framework: Backend development
- PHP: Server-side scripting language
- MySQL: Relational database management system
- HTML, CSS, JavaScript: Frontend development