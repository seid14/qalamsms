# Student & Course Management System

A Laravel mini-app for managing Somali high school students and courses with CRUD operations, many-to-many relationships, authentication, and a REST API.

## Features

- User authentication with Laravel Breeze
- Student management (CRUD operations)
  - List students with their enrolled courses
  - Add new students
  - Edit existing students
  - Delete students
  - Assign/unassign courses to students
- Course management (CRUD operations)
  - List courses with enrolled students
  - Add new courses
  - Edit existing courses
  - Delete courses
- Modern UI with Bootstrap 5 and custom styling
- REST API endpoints with Postman collection
- Pre-populated with Somali student names and high school subjects

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL
- Node.js and npm

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd student-course-system
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install and compile frontend dependencies:
```bash
npm install
npm run dev
```

4. Copy the environment file and configure your database:
```bash
cp .env.example .env
```

Update the following variables in `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_course_db
DB_USERNAME=root
DB_PASSWORD=
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Run migrations and seeders:
```bash
php artisan migrate --seed
```

7. Start the development server:
```bash
php artisan serve
```

## API Documentation

The API endpoints are documented in the included Postman collection (`student-course-system.postman_collection.json`).

### Available Endpoints:

- GET `/api/students` - Get all students with their enrolled courses
- POST `/api/students` - Create a new student
- GET `/api/courses` - Get all courses with enrolled students
- POST `/api/courses` - Create a new course

## Testing

You can import the Postman collection to test the API endpoints. The collection includes example requests for all available endpoints.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
"# qalamsms" 
