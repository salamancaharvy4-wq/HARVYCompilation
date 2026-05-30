# Laundry Service Package CRUD

Individual Laravel CRUD activity project using MySQL.

## System Concept

This project manages laundry service packages. It is separate from the original Smart Laundry project.

## Requirements Covered

- MySQL database configuration in `.env`
- Migration for `laundry_services`
- Full CRUD using `LaundryServiceController`
- Blade pages for list, add, view, edit, and delete
- Validation, search, and pagination bonus features

## Database

Configured database: `laundry_crud_activity`

## Main CRUD Fields

- `id`
- `name`
- `category`
- `price`
- `duration_minutes`
- `detergent_type`
- `description`
- `is_available`
- `created_at`
- `updated_at`

## Run

```bash
cd C:\Users\there\Documents\Codex\Laundry-CRUD-Activity
php artisan migrate --seed
php artisan serve --port=8000
```

Open `http://127.0.0.1:8000/laundry-services`.
