<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Project Management Tool

## Overview

The **Project Management Tool** is a simple web application built using **PHP** with the **Laravel** framework, designed to help users manage projects and tasks efficiently. Users can create, read, update, and delete projects and tasks, providing a straightforward interface for managing their work.

## Features

- **User Authentication**: Basic authentication using Laravel's built-in system.
- **Project Management**: Users can create, update, and delete projects.
- **Task Management**: Users can add, edit, and delete tasks associated with specific projects.
- **Dynamic Interactions**: AJAX is used to enhance user experience, allowing for dynamic updates without page reloads.
- **Responsive Design**: The application is built using Bootstrap for a mobile-friendly layout.

## Technologies Used

- **Backend**: PHP, Laravel
- **Database**: MariaDB/MySQL
- **Frontend**: HTML, CSS, JavaScript (jQuery)
- **Design Pattern**: Repository Pattern

## Design Pattern: Repository Pattern

The **Repository Pattern** is a design pattern that provides a way to manage the data access layer in a clean and organized manner. It separates the business logic from the data access logic, allowing for easier maintenance, testing, and flexibility. 

### Benefits of Using the Repository Pattern:

1. **Separation of Concerns**: Business logic is kept separate from data access logic, making it easier to manage and test.
2. **Centralized Data Access**: All data access logic is centralized in repositories, promoting reusability and reducing code duplication.
3. **Testability**: It becomes easier to mock repositories for unit testing, allowing for effective testing of business logic without relying on actual data sources.
4. **Flexibility**: Changes to data storage or access methods can be made within the repository without affecting the rest of the application.

In this project, repositories are used to handle CRUD operations for both projects and tasks, ensuring a clear separation between the data layer and the application logic.

## Getting Started

### Prerequisites

- PHP 8.x
- Composer
- Laravel 10.x
- MariaDB/MySQL

### Installation

1. **Clone the repository**:

   ```bash
   git clone https://github.com/yourusername/project-management-tool.git
   cd project-management-tool
   
2. **Install dependencies**:
    
    ```bash
    composer install
    
3. **Set up your environment:**:
    
    Copy the .env.example file to .env:
        
    ```bash
    cp .env.example .env
    

Update the .env file with your database credentials:
    
    
    
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_database_name
        DB_USERNAME=your_username
        DB_PASSWORD=your_password

4. **Run migrations**:
    
    ```bash
    php artisan migrate
    
5. **Start the local server**:
    
    ```bash
    php artisan serve
    
Access the application at http://localhost:8000.

**Usage**

**User Registration & Login:** Users can register and log in to the application.
Dashboard: After logging in, users can see all their projects.
Project Management: Users can create, update, and delete projects.
Task Management: Users can view tasks associated with each project and manage them (add, edit, delete) dynamically.
API Endpoints
Projects:

GET /api/projects: List all projects.
POST /api/projects: Create a new project.
GET /api/projects/{id}: Retrieve a specific project.
PUT /api/projects/{id}: Update a specific project.
DELETE /api/projects/{id}: Delete a specific project.
Tasks:

POST /api/projects/{project}/tasks: Add a task to a project.
GET /api/projects/{project}/tasks/{task}: Retrieve a specific task.
PUT /api/projects/{project}/tasks/{task}: Update a specific task.
DELETE /api/projects/{project}/tasks/{task}: Delete a specific task.