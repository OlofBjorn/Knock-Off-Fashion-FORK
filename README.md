# Knock Off Fashion – Admin Panel

Knock Off Fashion is a Laravel-based admin tool for managing products in a fictional online fashion store.

Why buy Gucci when you can buy Guggi?

This project simulates a web shop admin system where an administrator can manage products using a Laravel application.

---

## Project Purpose

The purpose of this project is to demonstrate understanding of:

- The Laravel framework
- MVC architecture
- CRUD functionality
- Database migrations and seeders
- Basic filtering
- Accessibility (a11y)
- Professional project structure using GitHub and Gitflow

---

## Features (G Requirements)

### Product Management (CRUD)
The user can:

- Create a product
- View all products
- Update a product
- Delete a product

---

### Filtering

The user can filter products by:

- Category
- Color
- Price range

---

### Factory & Seeder

The project includes:

- A Product Factory
- A Database Seeder

This ensures the application looks the same on every machine with realistic mock data (e.g., clothing categories, colors, prices).

---

### Accessibility (a11y)

The following accessibility improvements have been implemented:

- Semantic HTML structure (`<main>`, `<nav>`, `<section>`, `<article>`)
- Properly labeled form inputs using `<label for="">`
- Clear and accessible error messages
- Sufficient color contrast between text and background
- Error states are not conveyed using color only
- Legible fonts and layout tested with browser zoom

---

## Tech Stack

- Laravel 12
- PHP
- SQLite
- Blade templating engine

---

## Installation

1. Clone the repository

2. Install dependencies:

   composer install

3. Copy the environment file:

   cp .env.example .env

4. Generate application key:

   php artisan key:generate

5. Run migrations:

   php artisan migrate

6. Seed the database:

   php artisan db:seed

7. Start the development server:

   php artisan serve

Visit:

http://127.0.0.1:8000

---

## Project Structure

The application follows MVC architecture:

- Models handle data logic
- Controllers handle requests
- Views handle presentation

---

## Collaboration & Workflow

This project uses:

- GitHub for version control
- Gitflow workflow
- Feature branches
- GitHub Issues for task management

Main branches:

- main (stable version)
- develop (integration branch)
- feature/* (individual tasks)

---

## Authors

Emma Backman  
Olof Björn

---

## Disclaimer

This is a fictional project created for educational purposes.
All brand references (e.g., "Guggi") are fictional.
