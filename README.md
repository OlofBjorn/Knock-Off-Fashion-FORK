# Knock Off Fashion – Admin Panel

Knock Off Fashion is a Laravel-based admin interface for managing products in a fictional fashion web shop.

Why buy Gucci when you can buy Guggi?

The application simulates a simple administration system where a user can manage products in a clothing store database.

This project was created as part of a course assignment to demonstrate understanding of Laravel development, MVC architecture, CRUD operations, filtering, pagination, and accessibility (WCAG).

# Project Features
## Product Management (CRUD)

The administrator can:

- Create products

- View all products

- Update product information

- Delete products

Products contain information such as:

- Brand name

- Description

- Price

- Category

- Color

- Stock quantity

## Filtering

Products can be filtered by:

- Brand name

- Category

- Price range

Filtering is handled through query parameters and controller logic.

## Pagination

Product listings use Laravel pagination to limit the number of products shown per page and improve usability.

## Database Factory & Seeder

The project includes:

- A Product Factory

- A Database Seeder

This ensures the database can be populated with realistic mock fashion products, making the application look the same on different machines.

Example data includes clothing brands, colors, categories, and price ranges.

# Accessibility (WCAG)

Several accessibility practices have been implemented:

Semantic HTML

The interface uses semantic elements such as:

- nav

- main

- section

- table

- form

This improves navigation for assistive technologies.

## Form Accessibility

Forms include:

- Proper <label for=""> associations

- Accessible error messages

- Clear input instructions

- Error Handling

Validation errors display text explanations, not just visual indicators such as color.

## Example:

"The price field must be a number."

## Color Usage

Color is not used as the only indicator for errors or status messages.

## Text Resizing

The layout has been tested with browser zoom to ensure content remains readable and usable.
Horizontal scrolling is allowed for large tables as long as content remains accessible.

# Tech Stack

## Backend

- Laravel 12

- PHP

- SQLite

## Frontend

- Blade templating engine

- Tailwind CSS

- DaisyUI

## Authentication

- Laravel Breeze

## Development Tools

- Composer

- Node.js

- Vite

- GitHub

## Authentication

Authentication is implemented using Laravel Breeze.

For this project, registration is not used.
A predefined admin account is used instead.

## Example login:

Email: test@example.com

Password: password

# Installation

Follow these steps to run the project locally.

## 1: Clone the repository
git clone https://github.com/YOUR-REPOSITORY-URL

Navigate into the project folder:

cd Knock-Off-Fashion-/knockofffashion/
## 2: Install PHP dependencies
composer install
## 3: Install frontend dependencies
npm install
npm run build
## 4: Create environment file
cp .env.example .env
## 5: Generate application key
php artisan key:generate
## 6: Run database migrations
php artisan migrate
- If prompted with the option to create a database, select "Yes"
## 7: Seed the database
php artisan db:seed

- This will generate sample product data.

## 8: Start the development server

- Run Laravel:

php artisan serve

## 9: Open the application

Visit:

http://127.0.0.1:8000

# Project Structure

The application follows Laravel's MVC architecture.

app/

 ├── Http/
 
 │   ├── Controllers
 
 │   │   ├── ProductController.php
 
 │   │   └── ProfileController.php
 
 │   └── Requests
 
 │
 
 ├── Models
 
 │   └── Product.php
 
 │
 
resources/

 ├── views/
 
 │   ├── layouts
 
 │   ├── products
 
 │   ├── profile
 
 │   └── dashboard.blade.php
 
 │
 
database/

 ├── factories
 
 └── seeders
 
## Models

Handle database interaction and business logic.

## Controllers

Handle incoming requests and application logic.

## Views

Blade templates responsible for the user interface.

## Authors

Emma Backman

Olof Björn

# Disclaimer

This project was created for educational purposes.

All brand references (such as Guggi) are fictional.
