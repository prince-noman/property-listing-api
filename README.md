# Property Listing API

<p align="left">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" />
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
  <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
  <img src="https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white" alt="Composer" />
  <img src="https://img.shields.io/badge/Sanctum-3E4C59?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel Sanctum" />
</p>

A robust RESTful API built with **Laravel 10** and **PHP 8.1** for managing real estate properties and brokers. The API provides endpoints for authenticating users, managing property details alongside their specific characteristics, and handling broker profiles.

## Features

- **Authentication**: Secure user registration, login, and logout using [Laravel Sanctum](https://laravel.com/docs/sanctum).
- **Broker Management**: Full CRUD operations for brokers (Name, Address, City, Zip Code, Phone, Logo).
- **Property Management**: Complete property listings with relationships to brokers.
- **Property Characteristics**: Detailed property attributes including price, bedrooms, bathrooms, square footage, price per sqft, property type (Single, Townhouse, Multifamily, Bungalow), and status (Sale, Sold, Hold).
- **Role-Based Access**: 
  - Public read access for browsing properties and brokers.
  - Protected endpoints for creating, updating, and deleting listings (requires authentication).

## Tech Stack

- **Framework**: [Laravel 10](https://laravel.com)
- **Language**: PHP > 8.1
- **Database**: Configurable via `.env` (MySQL / PostgreSQL / SQLite)
- **Authentication**: Laravel Sanctum

## API Endpoints

### Authentication
- `POST /api/register` - Register a new user
- `POST /api/login` - Authenticate and receive a Sanctum token
- `POST /api/logout` - Invalidate the token (Requires Auth)

### Brokers
- `GET /api/brokers` - List all brokers (Public)
- `GET /api/brokers/{broker}` - Get a specific broker (Public)
- `POST /api/brokers` - Create a new broker (Requires Auth)
- `PUT/PATCH /api/brokers/{broker}` - Update a broker (Requires Auth)
- `DELETE /api/brokers/{broker}` - Delete a broker (Requires Auth)

### Properties
- `GET /api/properties` - List all properties (Public)
- `GET /api/properties/{property}` - Get a specific property (Public)
- `POST /api/properties` - Add a new property (Requires Auth)
- `PUT/PATCH /api/properties/{property}` - Update a property (Requires Auth)
- `DELETE /api/properties/{property}` - Delete a property (Requires Auth)

## Authentication Info
Protected endpoints require a Bearer token in the `Authorization` header:

```text
Authorization: Bearer {your_token_here}
```

## Requirements

- PHP >= 8.1
- Composer
- A supported database (MySQL, PostgreSQL, etc.)

## Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd property-listing-api
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Environment Configuration:**
   Copy the example environment file and configure your database credentials:
   ```bash
   cp .env.example .env
   ```
   *Make sure to update `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in your `.env` file.*

4. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

6. **Serve the application:**
   ```bash
   php artisan serve
   ```
   The API will be accessible at `http://localhost:8000/api`.


## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
