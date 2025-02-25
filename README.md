# Bug Tracker in Laravel
A simple bug and project tracking system built with Laravel 11 and Vue.js (Inertia.js) using the Repository Pattern, RESTful API, Sanctum Authentication, and TailwindCSS UI.

---
## Features
- Project Management: Create, update, delete, and list projects
- Bug Tracking: Assign bugs to projects, update statuses
- User Authentication: Secure API with Laravel Sanctum
- Repository Pattern: Clean and maintainable code
- Inertia.js & Vue 3: Modern frontend with TailwindCSS
- API-Ready: Can be used as a RESTful API

---
## Installation 
- Clone the repository
```bash
git clone https://github.com/MattYeend/Bug-Tracker.git
cd laravel-bug-tracker
```

- Install dependancies
```bash
composer install
npm install
```

- Set up the environment
Create a `.env` file
```bash
cp .env.example .env
```

Generate application key
```bash
php artisan key:generate
```

Set up database credentials
```makefile
DB_DATABASE=bug_tracker
DB_USERNAME=root
DB_PASSWORD=
```

- Run migrations
```bash
php artisan migration --seed
```

- Install Laravel Sanctum
```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

- Run the application 
```bash
php artisan serve
npm run dev
```

---
## API Routes
Authentication
|--|--|--|
| Method | Endpoint | Description |
| POST | `/login` | User Login |
| POST | `/logout` | User Logout |
| POST | `/register`| Register User |

Projects
| Method | Endpoint	| Description |
| GET | `/projects` | List all projects |
| POST | `/projects` | Create a new project |
| GET | `/projects/{id}` | Get project details |
| PUT | `/projects/{id}` | Update a project |
| DELETE | `/projects/{id}`	| Delete a project |

Bugs
| Method | Endpoint |Description |
| GET | `/bugs`	| List all bugs |
| POST | `/bugs` | Create a bug |
| GET | `/bugs/{id}` | Get bug details |
| PUT | `/bugs/{id}` | Update bug status |
| DELETE | `/bugs/{id}` | Delete a bug |

---
## Frontend
The frontend is built using Vue 3, TailwindCSS, and Inertia.js inside `resources/js/Pages`.
To start the frontend:
```bash
npm run dev
```

---
## Authentication
The app uses Laravel Sanctum for authentication.

### Register a User
```bash
POST /register
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password",
    "password_confirmation": "password"
}
```

### Login
```bash
POST /login
{
    "email": "john@example.com",
    "password": "password"
}
```

### Logout
```bash
POST /logout
```

---
## How to contribute
- Log an issue
- Add as much information as possible
- Assign it to yourself
- Checkout branch, add issue number to start of branch (from develop branch, `git checkout -b number-short-description-branch`)
- Commit message should start with a hash (#) and the issue number then message of issue
- Push branch
- Create a pull request to fully describe the fix
- Any new text on screen, add to relevant file(s) within the lang/ folder

---
## Language files
- When creating a new view page, nor new module, ensure there is a relevant language file(s) for said module (or add to existing language file if adding to existing viewable page)
- Ensure the language files makes sense to what it does, e.g. `users.php` for Users

---
## Misc
- Clear Application Cache: `php artisan cache:clear`
- Clear View Cache: `php artisan view:clear`
- Clear Route Cache: `php artisan route:clear`
- Clear Configuration Cache: `php artisan config:clear`

---
## Tech
- Laravel: v11.44.0
- PHP: v8.4.4
- Vue: 3.5.13